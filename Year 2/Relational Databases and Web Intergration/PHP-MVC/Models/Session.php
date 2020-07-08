<?php
/**
 * Created by PhpStorm.
 * User: morga
 * Date: 25/04/2019
 * Time: 22:35
 */

class Session{

    public static function Start(){
        session_start();
    }

    public static function kill(){
        session_unset();
        session_destroy();
    }

    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }
    public static function get($key){
        return  $_SESSION[$key];
    }
}