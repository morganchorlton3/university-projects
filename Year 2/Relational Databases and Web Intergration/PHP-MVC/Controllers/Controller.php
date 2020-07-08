<?php
/**
 * Created by PhpStorm.
 * User: Morgan
 * Date: 16/03/2019
 */

include_once './Models/Database.php';
include_once './Models/Session.php';

class Controller extends Database {

    public static function CreateView($viewName){
        require_once("./Views/$viewName.php");
    }
    public static function StartSession(){
        Session::Start();
    }
    public static function getStyle(){
        require_once("./Style.css");
    }
}