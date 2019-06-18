<?php

/***************************************************************************************************************
 *
 *  This file contains all modeling classes
 *  
 *  These classes represent the data from the database as PHP objects and have no major logic.
 *
 ***************************************************************************************************************/


/**
 *
 * @author nol
 *
 */
class MVideo
{
    private $vid;
    private $title;
    private $video;
    private $thumbnail;
    private $duration;

    public function __construct ( int $vid, string $title, $video, $thumbnail, $duration)
    {
        $this->vid = $vid;
        $this->title = $title;
        $this->video = $video;
        $this->thumbnail = $thumbnail;
        $this->duration = $duration;
    }

    public function getVid ()
    {
        return $this->vid;
    }

    public function getTitle ()
    {
        return $this->title;
    }

    public function getVideo ()
    {
        return $this->video;
    }
    
    public function getThumbnail ()
    {
        return $this->thumbnail;
    }
    
    public function getDuration ()
    {
        return $this->duration;
    }
}

class MPlaylist
{
    private $pid;
    private $name;
    private $thumbnail;
    
    public function __construct ( int $pid, string $name, $thumbnail)
    {
        $this->pid = $pid;
        $this->name = $name;
        $this->thumbnail = $thumbnail;
    }
    
    public function getPid ()
    {
        return $this->pid;
    }
    
    public function getName ()
    {
        return $this->name;
    }

    public function getThumbnail ()
    {
        return $this->thumbnail;
    }
}

class MPlaylistVideoAssign
{
    private $pid;
    private $vid;
    
    public function __construct ( $pid, $vid)
    {
        $this->pid = $pid;
        $this->vid = $vid;
    }
    
    public function getPid ()
    {
        return $this->pid;
    }
    
    public function getVid ()
    {
        return $this->vid;
    }
}

