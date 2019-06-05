-- MySQL Script generated by MySQL Workbench
-- 05/22/19 10:50:11
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema videoplayer
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema videoplayer
-- -----------------------------------------------------
CREATE DATABASE IF NOT EXISTS `videoplayer` DEFAULT CHARACTER SET utf8 ;
USE `videoplayer` ;

-- -----------------------------------------------------
-- Table `videoplayer`.`playlist`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `videoplayer`.`playlist` (
  `pid` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `thumbnail` LONGBLOB NOT NULL,
  PRIMARY KEY (`pid`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `videoplayer`.`video`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `videoplayer`.`video` (
  `vid` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `video` LONGBLOB NOT NULL,
  `thumbnail` LONGBLOB,
  `duration` INT(11),
  PRIMARY KEY (`vid`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `videoplayer`.`playlist_has_video`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `videoplayer`.`playlist_has_video` (
  `pid` INT(11) NOT NULL,
  `vid` INT(11) NOT NULL,
  INDEX `fk_playlist_has_video_playlist_idx` (`pid` ASC),
  INDEX `fk_playlist_has_video_video1_idx` (`vid` ASC),
  CONSTRAINT `fk_playlist_has_video_playlist`
    FOREIGN KEY (`pid`)
    REFERENCES `videoplayer`.`playlist` (`pid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_playlist_has_video_video1`
    FOREIGN KEY (`vid`)
    REFERENCES `videoplayer`.`video` (`vid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `videoplayer`.`rating`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `videoplayer`.`rating` (
  `rid` INT(11) NOT NULL AUTO_INCREMENT,
  `text` VARCHAR(255) NOT NULL,
  `vid` INT(11) NOT NULL,
  INDEX `fk_rating_video1_idx` (`vid` ASC),
  PRIMARY KEY (`rid`),
  CONSTRAINT `fk_rating_video1`
    FOREIGN KEY (`vid`)
    REFERENCES `videoplayer`.`video` (`vid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

INSERT INTO `video` (title, video, thumbnail, duration) VALUES("Random", LOAD_FILE("C:\\xampp\\htdocs\\videoplayer\\assets\\Video1.mp4"), LOAD_FILE("C:\\xampp\\htdocs\\videoplayer\\assets\\Thumbnail1.png"), 105);  
INSERT INTO `video` (title, video, thumbnail, duration) VALUES("Nature 2", LOAD_FILE("C:\\xampp\\htdocs\\videoplayer\\assets\\Video2.mp4"), LOAD_FILE("C:\\xampp\\htdocs\\videoplayer\\assets\\Thumbnail2.png"), 23);  
INSERT INTO `video` (title, video, thumbnail, duration) VALUES("Nature 3", LOAD_FILE("C:\\xampp\\htdocs\\videoplayer\\assets\\Video3.mp4"), LOAD_FILE("C:\\xampp\\htdocs\\videoplayer\\assets\\Thumbnail3.png"), 6);  
INSERT INTO `video` (title, video, thumbnail, duration) VALUES("Car 1", LOAD_FILE("C:\\xampp\\htdocs\\videoplayer\\assets\\Video4.mp4"), LOAD_FILE("C:\\xampp\\htdocs\\videoplayer\\assets\\Thumbnail4.png"), 74);  
INSERT INTO `video` (title, video, thumbnail, duration) VALUES("Car 2", LOAD_FILE("C:\\xampp\\htdocs\\videoplayer\\assets\\Video5.mp4"), LOAD_FILE("C:\\xampp\\htdocs\\videoplayer\\assets\\Thumbnail5.png"), 71);  

INSERT INTO `playlist` (name, thumbnail) VALUES("Random", LOAD_FILE("C:\\xampp\\htdocs\\videoplayer\\assets\\random.png"));  
INSERT INTO `playlist` (name, thumbnail) VALUES("Nature", LOAD_FILE("C:\\xampp\\htdocs\\videoplayer\\assets\\nature.png"));
INSERT INTO `playlist` (name, thumbnail) VALUES("Car", LOAD_FILE("C:\\xampp\\htdocs\\videoplayer\\assets\\cars.png"));

INSERT INTO `playlist_has_video` (pid, vid) VALUES(1, 1);
INSERT INTO `playlist_has_video` (pid, vid) VALUES(2, 2);
INSERT INTO `playlist_has_video` (pid, vid) VALUES(2, 3);
INSERT INTO `playlist_has_video` (pid, vid) VALUES(3, 4);
INSERT INTO `playlist_has_video` (pid, vid) VALUES(3, 5);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
