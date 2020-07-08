<?php
/**
 * Created by PhpStorm.
 * User: Morgan
 * Date: 10/03/2019
 */

require_once ('Routes.php');

//auto loads the models and controllers
function autoloadFunction($class)
{
    if (preg_match('/Controller$/', $class))
        require("Controllers/" . $class . ".php");
    else
        require("Models/" . $class . ".php");
}
spl_autoload_register("autoloadFunction");

