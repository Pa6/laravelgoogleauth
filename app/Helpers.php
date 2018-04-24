<?php
/**
 * Created by PhpStorm.
 * User: pa6
 * Date: 09/03/2017
 * Time: 12:54
 */


/*
|--------------------------------------------------------------------------
| Detect Active Route
|--------------------------------------------------------------------------
|
| Compare given route with current route and return output if they match.
| Very useful for navigation, marking if the link is active.
|
*/


use Illuminate\Routing\Route;

function isActiveRoute($route,$output = "active")
{

    if (Request::path() == $route) return $output ;
}

/*
|--------------------------------------------------------------------------
| Detect Active Routes
|--------------------------------------------------------------------------
|
| Compare given routes with current route and return output if they match.
| Very useful for navigation, marking if the link is active.
|
*/
function areActiveRoutes(Array $routes, $output = "active")
{
    foreach ($routes as $route)
    {
        if (Route::currentRouteName() == $route) return $output;
    }

}

/**
 * Detects if the given string is found in the current URL.
 *
 * @param  string  $string
 * @param  string  $output
 * @return boolean
 */
function isActiveMatch($string, $output = "active")
{
    if (strpos(Request::path(), $string) !== false) {
        return $output;
    }
    return null;
}