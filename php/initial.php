<?php

/***************************************************************************************************************
 *
 *  This file contains all inital classes
 *  
 *  These classes are the core classes used in this project, they implement the main logic.
 *
 ***************************************************************************************************************/

/**
 *
 * @author nol
 *
 * Responsible for the template rendering.
 * The Renderer is also responsible for including stylesheets and scripts.
 *
 */
class Renderer
{
    private static $default_template = "default.htm.php";
    private static $root = Config::BASEPATH . "/";

    /**
     * Renders the default template with corresponding template from given params.
     *
     * @param string $title
     * the title thats displayed in the tab
     * 
     * @param string $template
     * the template that need to be rendered
     * 
     * @param array $params
     * extra parameters that are used in the template
     * e.g. [ "userid" => $userid ]
     * 
     * @param string|array $stylesheets
     * extra stylesheets that need to be included
     * 
     * @param string|array $scripts
     * extra scripts that need to be included
     * 
     * @param bool $nav
     * true if the navigation should be displayed in the template
     * 
     * @param bool $user
     * true if a user is required to access the template
     */
    public static function default ( $title, $template, $params = [], $stylesheets = [], $scripts = [], $nav = true, $user = true )
    {
        extract( (array) $params ); // Create variables from params
        $webroot = self::$root;
        $template = Config::PATH_TEMPLATE . $template;
        include ( Config::PATH_TEMPLATE . self::$default_template );
    }

    public static function stylesheets ( $stylesheets )
    {
        foreach ( (array) $stylesheets as $stylesheet )
        {
            echo "<link rel='stylesheet' href='" . self::$root . Config::PATH_CSS . "$stylesheet'>";
        }
    }

    public static function scripts ( $scripts )
    {
        foreach ( (array) $scripts as $script )
        {
            echo "<script src='" . self::$root . Config::PATH_JS . "$script'></script>";
        }
    }
}


/**
 *
 * @author nol
 *
 * This class is responsible for the entire routing mechanism.
 *
 */
class RouteService
{
    private static $routes = Array();
    private static $pathNotFound = null;
    private static $methodNotAllowed = null;

    /**
     * Function used to add a new route
     *
     * @param string $expression
     * Route string or expression
     * 
     * @param callable $function
     * Function to call when route with allowed method is found
     * 
     * @param string|array $method
     * Either a string of allowed method or an array with string values
     * 
     */
    public static function add ( $expression, $function, $method = 'get' )
    {
        array_push( self::$routes, Array(
            'expression' => $expression,
            'function' => $function,
            'method' => $method
        ) );
    }

    public static function pathNotFound ( $function )
    {
        self::$pathNotFound = $function;
    }

    public static function methodNotAllowed ( $function )
    {
        self::$methodNotAllowed = $function;
    }

    public static function redirect ( $uri, $basepath = Config::BASEPATH )
    {
        header( 'Location: ' . $basepath . $uri );
    }

    /**
     * Rewrite an URL, so everytime that URL gets called, it get auto redirected.
     *
     * @param string $path
     * @param string $dest
     * @param string $basepath
     */
    public static function rewrite ( $path, $dest, $basepath = Config::BASEPATH )
    {
        self::add( $path, function () use ( $basepath, $dest )
        {
            header( 'Location: ' . $basepath . $dest );
        } );
    }

    /**
     * The holy logic for the whole routing mechanism.
     *
     * @param boolean $case_matters
     * @param boolean $trailing_slash_matters
     * @param string $basepath
     */
    public static function run ( $case_matters = false, $trailing_slash_matters = false, $basepath = Config::BASEPATH )
    {
        // Parse current url
        $parsed_url = parse_url( $_SERVER[ 'REQUEST_URI' ] ); // Parse Uri
        if ( isset( $parsed_url[ 'path' ] ) && $parsed_url[ 'path' ] != '/' )
        {
            if ( $trailing_slash_matters )
            {
                $path = $parsed_url[ 'path' ];
            }
            else
            {
                $path = rtrim( $parsed_url[ 'path' ], '/' );
            }
        }
        else
        {
            $path = '/';
        }
        // Get current request method
        $method = $_SERVER[ 'REQUEST_METHOD' ];
        $path_match_found = false;
        $route_match_found = false;
        foreach ( self::$routes as $route )
        {
            // If the method matches check the path
            // Add basepath to matching string
            if ( $basepath != '' && $basepath != '/' && $basepath != $path )
            {
                $route[ 'expression' ] = '(' . $basepath . ')' . $route[ 'expression' ];
            }
            // Add 'find string start' automatically
            $route[ 'expression' ] = '^' . $route[ 'expression' ];
            // Add 'find string end' automatically
            $route[ 'expression' ] = $route[ 'expression' ] . '$';
            // echo $route['expression'].'<br/>';
            // Check path match
            if ( preg_match( '#' . $route[ 'expression' ] . '#' . ( $case_matters ? '' : 'i' ), $path, $matches ) )
            {
                $path_match_found = true;
                // Cast allowed method to array if it's not one already, then run through all
                // methods
                foreach ( (array) $route[ 'method' ] as $allowedMethod )
                {
                    // Check method match
                    if ( strtolower( $method ) == strtolower( $allowedMethod ) )
                    {
                        array_shift( $matches ); // Always remove first element. This contains the
                                                 // whole string
                        if ( $basepath != '' && $basepath != '/' )
                        {
                            array_shift( $matches ); // Remove basepath
                        }
                        call_user_func_array( $route[ 'function' ], $matches );
                        $route_match_found = true;
                        // Do not check other routes
                        break;
                    }
                }
            }
        }
        // No matching route was found
        if ( !$route_match_found )
        {
            // But a matching path exists
            if ( $path_match_found )
            {
                header( "HTTP/1.0 405 Method Not Allowed" );
                if ( self::$methodNotAllowed )
                {
                    call_user_func_array( self::$methodNotAllowed, Array(
                        $path,
                        $method
                    ) );
                }
            }
            else
            {
                if ( $path == Config::BASEPATH . "/error/404.html" )
                {
                    $path = null;
                }
                
                header( "HTTP/1.0 404 Not Found" );
                if ( self::$pathNotFound )
                {
                    call_user_func_array( self::$pathNotFound, Array(
                        $path
                    ) );
                }
            }
        }
    }
}