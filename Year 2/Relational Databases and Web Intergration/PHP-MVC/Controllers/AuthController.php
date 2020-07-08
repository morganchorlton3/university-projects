<?php
/**
 * Created by PhpStorm.
 * User: morga
 * Date: 24/04/2019
 * Time: 23:25
 */

include_once 'Controller.php';

include './Models/User.php';

class AuthController extends Controller
{
    public static function login($username, $password){
        $result  = self::query("SELECT * FROM fss_Customer WHERE custid = (SELECT personid FROM fss_Person WHERE personemail = '$username') AND custpassword = '$password'");
        if ($result != null){
            $userid = self::get_var("SELECT personid FROM fss_Person WHERE personemail = '$username'", "personid");
            $name = self::get_var("SELECT personname FROM fss_Person WHERE personemail = '$username'", "personname");
            $phoneNumber = self::get_var("SELECT personphone FROM fss_Person WHERE personemail = '$username'", "personphone");
            $addID = self::get_var("SELECT addid FROM fss_CustomerAddress WHERE custid = '$userid'", "addid");
            $street = self::get_var("SELECT addstreet FROM fss_Address WHERE addid = '$addID'", "addstreet");
            $city = self::get_var("SELECT addcity FROM fss_Address WHERE addid = '$addID'", "addcity");
            $postcode = self::get_var("SELECT addpostcode FROM fss_Address WHERE addid = '$addID'", "addpostcode");
            $user = new User($userid, $username, $password, $name, $phoneNumber, $street, $city, $postcode);
            Session::set("AUTH", $user);
            CartController::emptyCart();
            header('location: /u1753026/dashboard');
        }else{
            echo "<script type='text/javascript'>alert('User Doesnt exist');</script>";
            Session::kill();
        }
    }
    public static function register($name, $phoneNumber, $username, $password, $street, $city, $postcode){
        $result  = self::query("SELECT * FROM fss_Customer WHERE custid = (SELECT personid FROM fss_Person WHERE personemail = '$username') AND custpassword = '$password'");
        if ($result == null) {
            $currentdate = date("Y/m/d");
            self::insert("INSERT INTO fss_Person (personname, personphone, personemail) VALUE ('$name', '$phoneNumber','$username')");
            $custid = self::get_var("SELECT personid FROM fss_Person WHERE personemail = '$username'", "personid");
            self::insert("INSERT INTO fss_Customer (custpassword, custregdate, custendreg, custid) VALUES ('$password', '$currentdate', null, '$custid')");
            $userid = self::get_var("SELECT personid FROM fss_Person WHERE personemail = '$username'", "personid");
            self::insert("INSERT INTO fss_Address ( addstreet,addcity,addpostcode) VALUES ('$street', '$city', '$postcode')");
            $addid = self::get_var("SELECT addid FROM fss_Address WHERE addstreet = '$street' AND addcity = '$city' AND addpostcode = '$postcode'", "addid");
            print_r($addid);
            self::insert("INSERT INTO fss_CustomerAddress ( addid,custid) VALUES ('$addid', '$userid')");
            $user = new User($userid, $username, $password, $name, $phoneNumber,$street, $city, $postcode);
            CartController::emptyCart();
            Session::set('AUTH',$user);
            header('location: /u1753026/dashboard');
        }else{
            echo "<script type='text/javascript'>alert('User already Exits, Please Login');</script>";
        }
    }
    public static function changeAccountDetails($name, $phoneNumber, $username, $password){
        $user = Session::get('AUTH');
        $custID = $user->getUserID();
        self::insert("UPDATE fss_Person SET personname = '$name' , personphone = '$phoneNumber', personemail = '$username' where personid = '$custID'");
        self::insert("UPDATE fss_Customer SET custpassword = '$password'where custid = '$custID'");
        $user->setName($name);
        $user->setPhoneNumber($phoneNumber);
        $user->setUsername($username);
        $user->setPassword($password);
        Session::set('AUTH', $user);
        echo "<script type='text/javascript'>alert('Updated your account details');</script>";
        echo "<meta http-equiv='refresh' content='0'>";

    }
    public static function changeAddressDetails($street, $city, $postcode){
        $user = Session::get('AUTH');
        $custID = $user->getUserID();
        $addid = self::get_var("SELECT addid FROM fss_CustomerAddress WHERE custid = '$custID'", "addid");
        self::insert("UPDATE fss_Address SET addstreet = '$street' , addcity = '$city', addpostcode = '$postcode' where addid = '$addid'");
        $user->setStreet($street);
        $user->setCity($city);
        $user->setPostcode($postcode);
        Session::set('AUTH', $user);
        echo "<script type='text/javascript'>alert('Updated your address details');</script>";
        echo "<meta http-equiv='refresh' content='0'>";

    }
    public static function logout(){
        session_start();
        session_unset();
        session_destroy();
        header('location: /');
    }
    public static function checkAuth(){
        if (!isset($_SESSION)) {
            session_start();
        }
        if(!isset($_SESSION['AUTH'])){
            return false;
        }else{
            return true;
        }
    }
    public static function getUserID(){
        $user = Session::get('AUTH');
        $id = $user->getUserID();
        echo $id;
    }
    public static function getUsername(){
        $user =Session::get('AUTH');
        $username = $user->getUsername();
        echo $username;
    }
    public static function getPhoneNumber(){
        $user = Session::get('AUTH');
        $phoneNumber = $user->getPhoneNumber();
        echo $phoneNumber;
    }
    public static function getName(){
        $user = Session::get('AUTH');
        $name = $user->getName();
        echo $name;
    }
    public static function getPassword(){
        $user = Session::get('AUTH');
        $password = $user->getPassword();
        echo $password;
    }
    public static function getStreet(){
        $user = Session::get('AUTH');
        $street = $user->getStreet();
        echo $street;
    }
    public static function getCity(){
        $user = Session::get('AUTH');
        $city = $user->getCity();
        echo $city;
    }
    public static function getPostCode(){
        $user = Session::get('AUTH');
        $postcode = $user->getPostCode();
        echo $postcode;
    }

}