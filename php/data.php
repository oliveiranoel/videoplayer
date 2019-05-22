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
 * Provides data for templates.
 */
class Provider
{

    public static function getVideos ()
    {
        $record = QueryUtil::select( " SELECT * FROM video WHERE vid = 1" );
        return $record;
    }

//     public static function getRoom ( $roomid )
//     {
//         return self::handle( Mapper::mapRoom( $roomid ) );
//     }
}

/**
 *
 * @author nol
 *
 * Maps query outputs to PHP model objects.
 *
 */
class Mapper
{

    public static function mapVideos ()
    {
        $data = [];
        
        foreach ( QueryUtil::select( "SELECT * FROM video" ) as $record )
        {
            $data[] = new MVideo( $record->vid, $record->title, $record->video, $record->thumbnail, $record->duration );
        }
        
        return $data;
    }

//     public static function mapVideo ( $vid )
//     {
//         $record = QueryUtil::select( "SELECT * FROM room WHERE roomid = $roomid" )[ 0 ];
//         if ( !empty( $record ) )
//         {
//             $data = new MRoom( $record->roomid, $record->number, $record->description );
//             return $data;
//         }
//         return false;
//     }
}
