<?php
/**
 * Created by PhpStorm.
 * User: morga
 * Date: 23/04/2019
 * Time: 15:42
 */


class Database{

    #UNI
    #Host
    public static $DB_host = "selene.hud.ac.uk";
    #Usernmae
    public static $DB_username = "u1753026";
    #Password
    public static $DB_password = "19jun99";
    #Database
    public static $DB_name = "u1753026";
    /*
    #HOME
    #Host
    public static $DB_host = "127.0.0.1";
    #Usernmae
    public static $DB_username = "root";
    #Password
    public static $DB_password = "root";
    #Database
    public static $DB_name = "scotchbox";
    */


    private static function connect() {
        $pdo = new PDO("mysql:host=".self::$DB_host.";dbname=".self::$DB_name.";charset=utf8", self::$DB_username, self::$DB_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    public static function query($query, $params = array()) {
        $statement = self::connect()->prepare($query);
        $statement->execute($params);
        if (explode(' ', $query)[0] == 'SELECT') {
            $data = $statement->fetchAll();
            return $data;
        }
    }
    public static function insert($query) {
        $statement = self::connect()->prepare($query);
        $statement->execute();
    }
    public static function lastInsert(){
        $statment = self::connect()->query("SELECT LAST_INSERT_ID()");
        return $statment->fetchColumn();
    }
    public static function update($query) {
        $statement = self::connect()->prepare($query);
        $statement->execute();
    }
    public static function statementQuery($query, $params = array()){
        $statement = self::connect()->prepare($query);
        $statement->execute($params);
        return $statement;
    }
    public static function get_var($query, $varName, $params = array()){
        $statement = self::connect()->prepare($query);
        $statement->execute($params);
        foreach($statement as $row) {
            return $row[$varName];
        }
    }
}