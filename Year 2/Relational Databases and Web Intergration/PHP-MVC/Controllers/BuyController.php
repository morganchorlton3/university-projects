<?php
/**
 * Created by PhpStorm.
 * User: Morgan
 * Date: 16/04/2019
 */

include_once 'Controller.php';

class BuyController extends Controller{

    public static function Checkout(){
        $checkoutPrice = CartController::getTotalPrice();
        $payDate = date("Y/m/d");
        $user = Session::get('AUTH');
        $userID = $postcode = $user->getUserID();
        $postcode = $user->getPostCode();
        $payid = self::get_var("SELECT MAX(payid) FROM fss_Payment", "MAX(payid)")+1;
        $addID = self::get_var("SELECT addid FROM fss_Address WHERE  addpostcode = '$postcode'", "addid");
        self::insert("INSERT INTO fss_Payment (payid, amount, paydate,shopid, ptid) VALUES ('$payid', '$checkoutPrice','$payDate', '1', '2')");
        self::insert("INSERT INTO fss_OnlinePayment (payid, custid) VALUES ('$payid', '$userID')");
        $cart = Session::get('CART');
        foreach ($cart as $value) {
            $price = CartController::getItemPrice($value);
            self::insert("INSERT INTO fss_FilmPurchase (payid, filmid, shopid, price) VALUES ('$payid', '$value','1','$price')");
        }
        CartController::emptyCart();
        echo "<script type='text/javascript'>alert('Purchase Complete');</script>";
    }
}