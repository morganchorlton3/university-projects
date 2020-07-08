<?php
/**
 * Created by PhpStorm.
 * User: mMrgan
 * Date: 10/03/2019
 */

include_once('Models/Route.php');
include_once('Controllers/IndexController.php');
include_once('Controllers/AuthController.php');
include_once('Controllers/DashboardController.php');
include_once('Controllers/FilmController.php');
include_once('Controllers/RegisterController.php');
include_once('Controllers/PurchaseHistoryController.php');
include_once('Controllers/BuyController.php');
include_once('Controllers/CartController.php');

Route::set('index.php',function (){
    IndexController::CreateView('Index');
    if (!AuthController::checkAuth()) {
        CartController::createCart();
    }
    if (isset($_POST['AddToCart'])) {
        if (AuthController::checkAuth()) {
            CartController::addToCart($_POST['AddToCart']);
        }else {
            CartController::createCart();
            echo "<script type='text/javascript'>alert('Please Login to add films to your cart');</script>";
        }
    }
    if (isset($_POST['EmptyCart'])) {
        CartController::emptyCart();
    }
});
Route::set('login',function (){
    if(! AuthController::checkAuth()) {
        AuthController::CreateView("Login");
        if(isset($_POST['submit']))
        {
            AuthController::login($_POST['username'], $_POST['password']);
        }
    }else{
        header('location: /');
    }
});
Route::set('dashboard',function (){
    if(AuthController::checkAuth()){
        DashboardController::CreateView('Dashboard');
        if(isset($_POST['submitAccount']))
        {
            AuthController::changeAccountDetails($_POST['name'], $_POST['phoneNumber'], $_POST['username'], $_POST['password']);
            header("Refresh:0");
        }
        if(isset($_POST['submitAddress']))
        {
            AuthController::changeAddressDetails($_POST['street'], $_POST['city'], $_POST['postcode']);
            header("Refresh:0");
        }
    }else{
        header('location: /login');
    }
});
Route::set('logout',function (){
    AuthController::logout();
});
Route::set('register',function (){
    if(! AuthController::checkAuth()) {
        RegisterController::CreateView('Register');
        if (isset($_POST['submit'])) {
            AuthController::register($_POST['name'], $_POST['phoneNumber'], $_POST['username'], $_POST['password'], $_POST['street'], $_POST['city'], $_POST['postcode']);
        }
    }else{
        header('location: /');
    }
});
Route::set('purchaseHistory',function (){
    if(AuthController::checkAuth()){
        PurchaseHistoryController::CreateView('PurchaseHistory');
        if (isset($_POST['AddToCart'])) {
            CartController::addToCart($_POST['AddToCart']);
        }
    }else{
        header('location: /login');
    }
});
Route::set('buyFilm',function (){
    if(AuthController::checkAuth()){
        BuyController::CreateView('BuyFilm');
        if(isset($_POST['buyFilm'])) {
            BuyController::Checkout();
        }
    }else{
        header('location: /login');
    }
});
Route::set('cart',function (){
    if(AuthController::checkAuth()){
        CartController::CreateView('Cart');
        if(isset($_POST['removeItem']))
        {
            CartController::RemoveFromCart($_POST['removeItem']);
        }
        if (isset($_POST['checkout'])) {

        }
    }else{
        header('location: /login');
    }
});
Route::set('info',function (){
    phpinfo();
});