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
 * Represents a room
 *
 */
class MVideo
{
    private $vid;
    private $title;
    private $video;
    private $tumbnail;
    private $duration;

    public function __construct ( int $vid, string $title, $video, $tumbnail, $duration)
    {
        $this->vid = $vid;
        $this->title = $title;
        $this->video = $video;
        $this->tumbnail = $tumbnail;
        $this->duration = $duration;
    }

    public function geVid ()
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
        return $this->tumbnail;
    }
    
    public function getDuration ()
    {
        return $this->duration;
    }
}

