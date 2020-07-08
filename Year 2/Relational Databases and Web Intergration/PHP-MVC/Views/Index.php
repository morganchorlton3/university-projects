<?php include('Includes/Head.php'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "stylesheet" type = "text/css" href = "../Public/CSS/Default.css" />
    <title>Shop Site</title>
</head>
<body>
    <div style="padding: 4%;">
        <h1 style="text-align: center">Welcome to the shop</h1>
        <br/>
        <br/>
        <?php
            if(count($_SESSION['CART']) == 0){
                echo'<h3 style="text-align: center">Your cart is empty</h3>';
            }else if(count($_SESSION['CART']) == 1){
                echo'<h3 style="text-align: center">You have '. count($_SESSION['CART']). ' item in your cart</h3>';
            }else{
                echo'<h3 style="text-align: center">You have '. count($_SESSION['CART']). ' items in your cart</h3>';
            }

        ?>
        <br />
        <br />
        <FORM METHOD="post" ACTION="">
            <button class="button" style="margin-left: 46%;" type="submit" value="emptyCart" name="EmptyCart"><span>Empty Cart</span></button>
        </FORM>
        <?php FilmController::displayFilms(); ?>
    </div>
<?php include('Includes/Foot.php'); ?>