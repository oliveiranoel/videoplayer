<?php

/**
 * ***********************************************************************************************************
 * HOME
 */
RouteService::add( '/home', function ()
{
    Renderer::default( "Home", "home/overview.htm.php" );
} );

RouteService::add( '/player1', function ()
{
    Renderer::default( "Player 1", "player1/player.htm.php" );
} );

RouteService::add( '/player2', function ()
{
    Renderer::default( "Player 2", "player2/player.htm.php" );
} );

/**
 * ***********************************************************************************************************
 * REWRITE
 */
RouteService::rewrite( "/index.php", "/home" );
RouteService::rewrite( Config::BASEPATH, "/home" );

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

