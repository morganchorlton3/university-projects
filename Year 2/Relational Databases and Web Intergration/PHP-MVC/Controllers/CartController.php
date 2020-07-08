<?php
/**
 * Created by PhpStorm.
 * User: Morgan
 * Date: 16/04/2019
 */

include_once 'Controller.php';

class CartController extends Controller{
    public static function addToCart($filmID){
        if (!isset($_SESSION["CART"])){
            $cart = array($filmID);
            echo "<script type='text/javascript'>alert('Created cart');</script>";
        }else {
            $cart = $_SESSION["CART"];
            array_push($cart, $filmID);
            echo "<script type='text/javascript'>alert('Added Item to Cart');</script>";
        }
        Session::set('CART', $cart);
        echo "<meta http-equiv='refresh' content='0'>";
    }
    public static function RemoveFromCart($filmID){
        $cart = Session::get('CART');
        echo $filmID;
        foreach (array_keys($cart, $filmID) as $key) {
            unset($cart[$key]);
        }
        Session::set('CART', $cart);
        echo "<meta http-equiv='refresh' content='0'>";
    }
    public static function emptyCart(){
        $cart = array();
        Session::set('CART', $cart);
        echo "<meta http-equiv='refresh' content='0'>";
    }
    public static function createCart(){
        $cart = array();
        Session::set('CART', $cart);
    }
    public static function printCart(){
        $cart = Session::get('CART');
        echo'<h1>Cart: </h1>
<br/>';
        foreach($cart as $value){
            echo $value.',';
        }
    }
    public static function getTotalPrice(){
        $cart = Session::get('CART');
        $total  = 0;
        foreach ($cart as $value) {
            $filmPrice = self::get_var("SELECT price FROM fss_FilmPurchase WHERE filmid = '$value'", "price");
            $total += (float)$filmPrice;
        }
        return $total;
    }
    public static function getItemPrice($itemID){
        $filmPrice = self::get_var("SELECT price FROM fss_FilmPurchase WHERE filmid = '$itemID'", "price");
        return (float)$filmPrice;
    }
    public static function getItems(){
        $cart = Session::get('CART');
        foreach ($cart as $value) {
            $filmTitle = self::get_var("SELECT filmtitle FROM fss_Film WHERE filmid = '$value'", "filmtitle");
            $filmPrice = self::get_var("SELECT price FROM fss_FilmPurchase WHERE filmid = '$value'", "price");
            echo "<p>Film: $filmTitle</p>";
            echo "<p>Price: $filmPrice</p>";
            echo "</br>";
        }
    }
    public static function getTotalNumberOfItems(){
        $cart = Session::get('CART');
        return count($cart);
    }
    public static function displayCart()
    {
        $cart = Session::get('CART');
        if (count($cart) == 0) {
            echo "<h1 style='text-align: center'>Your Cart is empty</h1>";
        } else {

            echo "<table>";
            echo "<tr>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Remove From Cart</th>
             </tr>";
            $total = 0;
            foreach ($cart as $value) {
                $filmtitle = self::get_var("SELECT filmtitle FROM fss_Film WHERE filmid = '$value'", "filmtitle");
                $filmDescription = self::get_var("SELECT filmdescription FROM fss_Film WHERE filmid = '$value'", "filmdescription");
                $filmPrice = self::get_var("SELECT price FROM fss_FilmPurchase WHERE filmid = '$value'", "price");
                $total += (float)$filmPrice;
                echo "<tr>
                <td>$filmtitle</td>
                <td>$filmDescription</td>
                <td>£$filmPrice</td>
                <td width='30px;'><form method='post'>
                        <button class='table-btn' style='width: 100%;' type='submit' name='removeItem' id='removeItem' value='$value'>X</button><br/>
                    </form>
                </td>
            </tr>";
            }
            echo "<tr>
                <td height='100px;'>Total:</td>
                <td> </td>
                <td>£$total</td>
                <td> </td>
            </tr>";
            echo "</table>";
            echo" <br/>";
            echo "
            <form action=\"/u1753026/buyFilm\" method='post'>
                <button class='table-btn' style='width: 100%; font-size: 20px; padding: 10px;' type='submit' name='checkout' id='checkout'>Checkout</button><br/>
             </form>
                
            </tr>";



        }
    }

}