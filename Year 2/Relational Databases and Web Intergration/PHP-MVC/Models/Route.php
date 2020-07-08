<?php
/**
 * Created by PhpStorm.
 * User: Morgan
 * Date: 13/03/2019
 */
class Route{

    public static $validRoutes = array();

    public static function set($route,$function){

        self::$validRoutes[] = $route;

        if($_GET['url'] == $route){
            $function->__invoke();
        }

    }

}