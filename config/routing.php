<?php

RouteService::add( '/playlists', function ()
{
    Renderer::default( "Playlists", "playlists/overview.htm.php" );
} );

RouteService::add( '/htmlPlayer/playlist/([0-9]*)/video', function ( $pid )
{
    $videos = Provider::getVideosForPlaylist($pid);
    $firstVideoInPlaylist = $videos[0]->getVid();
    RouteService::redirect('/htmlPlayer/playlist/' . $pid . '/video/' . $firstVideoInPlaylist);
} );

RouteService::add( '/jwPlayer/playlist/([0-9]*)/video', function ( $pid )
{
    $videos = Provider::getVideosForPlaylist($pid);
    $firstVideoInPlaylist = $videos[0]->getVid();
    RouteService::redirect('/jwPlayer/playlist/' . $pid . '/video/' . $firstVideoInPlaylist);
} );

RouteService::add( '/htmlPlayer/playlist/([0-9]*)/video/([0-9]*)', function ( $pid, $vid )
{ 
    $views = QueryUtil::select("SELECT views FROM video WHERE vid = $vid");
    $views[0]->views++;
    
    $rating = QueryUtil::select("SELECT ROUND(AVG(rating) ,0) AS rating FROM rating WHERE vid = $vid");
    
    try
    {
        $sql = "UPDATE video SET views =  ? WHERE vid = $vid";
        QueryUtil::execute( $sql, [ $views[0]->views ] );
    }
    catch ( PDOException $e )
    {
        Logger::error($e);
    }
    
    
    Renderer::default( "HTML Player", "htmlPlayer/player.htm.php",[
            "pid" => $pid, 
            "vid" => $vid,
            "views" => $views[0]->views, 
            "rating" => $rating[0]->rating
    ]);
} );

RouteService::add( '/jwPlayer/playlist/([0-9]*)/video/([0-9]*)', function ( $pid, $vid )
{
    $views = QueryUtil::select("SELECT views FROM video WHERE vid = $vid");
    $views[0]->views++;
    
    $rating = QueryUtil::select("SELECT ROUND(AVG(rating) ,0) AS rating FROM rating WHERE vid = $vid");
    
    try
    {
        $sql = "UPDATE video SET views =  ? WHERE vid = $vid";
        QueryUtil::execute( $sql, [ $views[0]->views ] );
    }
    catch ( PDOException $e )
    {
        Logger::error($e);
    }
    
    Renderer::default( "JW Player", "jwPlayer/player.htm.php", [
            "pid" => $pid,
            "vid" => $vid,
            "views" => $views[0]->views,
            "rating" => $rating[0]->rating
    ], null, "jwplayer/jwplayer-7.11.2/jwplayer.js" );
} );

RouteService::add( '/video/([0-9]*)/rate/([0-9]*)', function ( $vid, $rating )
{
    try
    {
        $sql = "INSERT INTO rating (rating, vid) VALUES (?, ?)";
        QueryUtil::execute( $sql, [
                $rating,
                $vid
        ] );
    }
    catch ( PDOException $e )
    {
        Logger::error($e);
    }
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} );

/**
 * ***********************************************************************************************************
 * REWRITE
 */
RouteService::rewrite( "/index.php", "/home" );
RouteService::rewrite( Config::BASEPATH, "/playlists" );

/**
 * ***********************************************************************************************************
 * ERROR
 */
// 404
RouteService::pathNotFound( function ( $path )
{
    Renderer::default( "404", 'error/404.htm.php', [
        "path" => $path
    ] );
} );

// 405
RouteService::methodNotAllowed( function ( $path, $method )
{
    Renderer::default( "405", 'error/405.htm.php', [
        "path" => $path,
        "method" => $method
    ] );
} );

