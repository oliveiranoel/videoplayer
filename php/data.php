<?php

/***************************************************************************************************************
 *
 *  This file contains all classes that have something to do with 
 *  the data that is being displayed on the application.
 *
 ***************************************************************************************************************/

/**
 *
 * @author nol
 *        
 *         Provides data for templates.
 */
class Provider
{

    public static function getVideo($vid)
    {
        return Mapper::mapVideo($vid);
    }
    
    public static function getVideos()
    {
        return Mapper::mapVideos();
    }

    public static function getPlaylists()
    {
        return Mapper::mapPlaylists();
    }
    
    public static function getPlaylistVideoAssign() 
    {
        return Mapper::mapPlaylistVideoAssign();
    }
    
    public static function getVideosForPlaylist($pid)
    {
        return Mapper::mapVideosForPlaylist($pid);
    }
}

/**
 *
 * @author nol
 *        
 *         Maps query outputs to PHP model objects.
 *        
 */
class Mapper
{

    public static function mapVideos()
    {
        $data = [];
        
        foreach (QueryUtil::select("SELECT * FROM video") as $record) {
            $data[] = new MVideo($record->vid, $record->title, $record->video, $record->thumbnail, $record->duration);
        }
        
        return $data;
    }

    public static function mapPlaylists()
    {
        $data = [];
        
        foreach (QueryUtil::select("SELECT * FROM playlist") as $record) {
            $data[] = new MPlaylist($record->pid, $record->name, $record->thumbnail);
        }

        return $data;
    }
    
    public static function mapVideo ( $vid )
    {
        $record = QueryUtil::select( "SELECT * FROM video WHERE vid = ' $vid '" )[ 0 ];
        if ( !empty( $record ) )
        {
            $data = new MVideo( $record->vid, $record->title, $record->video, $record->thumbnail, $record->duration  );
            return $data;
        }
        return false;
    }
    
    public static function mapPlaylistVideoAssign () 
    {
        $data = [];
        
        foreach (QueryUtil::select("SELECT * FROM playlist_has_video") as $record) {
            $data[] = new MPlaylistVideoAssign($record->pid, $record->vid);
        }
        
        return $data;
    }
    
    public static function mapVideosForPlaylist($pid)
    {        
        $videosInPlaylist = [];
        $videos = [];
        
        foreach (QueryUtil::select("SELECT * FROM playlist_has_video WHERE pid = ' $pid '") as $record) {
            $videosInPlaylist[] = new MPlaylistVideoAssign($record->pid, $record->vid);
        }
        
        foreach ($videosInPlaylist as $videoInPlaylist) {
            $videos[] = self::mapVideo($videoInPlaylist->getVid());
        }
        
        return $videos;
    }
}
