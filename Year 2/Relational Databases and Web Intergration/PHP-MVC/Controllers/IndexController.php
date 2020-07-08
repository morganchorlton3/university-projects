<?php
/**
 * Created by PhpStorm.
 * User: Morgan
 * Date: 16/04/2019
 */

include_once 'Controller.php';

class IndexController extends Controller{
    public static function printFilms(){
        FilmController::displayFilms();
    }
}