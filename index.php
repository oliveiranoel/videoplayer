<?php

session_start();

//overriding default php value, else memory limit gets exceeded
ini_set('memory_limit', '-1');

include_once 'config/config.php';

foreach ( glob( Config::PATH_PHP . '*.php' ) as $file )
{
    include_once $file;
}

include_once 'config/routing.php';

shell_exec( "mysql --user=". Config::SQL_USER ." --password=". Config::SQL_PASSWORD ." < D:/xampp/htdocs/videoplayer/sql/model.sql" );

DBUtil::connect( Config::SQL_DATABASE, Config::SQL_USER, Config::SQL_PASSWORD );
RouteService::run();

