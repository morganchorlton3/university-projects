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
        <h1 style="text-align: center">Payment</h1>
        <br/>
        <br/>
        <br/>
        <FORM METHOD="post" ACTION="">
            <h2>Contact Information</h2>
            <p>
                <label>Full Name</label>
                <input id="name" value="<?php AuthController::getName(); ?>" name="name" type="text" required="required"/>
                <br>
            </p>
            <p>
                <label>Phone Number</label>
                <input id="phoneNumber" value="<?php AuthController::getPhoneNumber(); ?>" name="phoneNumber" type="text" required="required"/>
                <br>
            </p>
            <p>
                <label>Email</label>
                <input id="username" value="<?php AuthController::getUsername(); ?>" name="username" type="email" required="required"/>
                <br>
            </p>
            <br />
            <h2>Postage Address Details</h2>
            <p>
                <label>Street</label>
                <input id="street" value="<?php AuthController::getStreet(); ?>" name="street" type="text" required="required"/>
                <br>
            </p>
            <p>
                <label>City</label>
                <input id="city" value="<?php AuthController::getCity(); ?>" name="city" type="text" required="required"/>
                <br>
            </p>
            <p>
                <label>PostCode</label>
                <input id="postcode" value="<?php AuthController::getPostCode(); ?>" name="postcode" type="text" required="required"/>
                <br>
            </p>
            <br />
            <h2>Payment Details</h2>
            <p>
                <label>Card Number</label>
                <input id="cardNo" value="" name="cardNo" type="text" required="required"/>
                <br>
            </p>
            <p>
                <label>Expiration Date</label>
                <input id="expiry" value="" name="expiry" type="text" required="required"/>
                <br>
            </p>
            <p>
                <label>Sort Code</label>
                <input id="sortCode" value="" name="sortCode" type="text" required="required"/>
                <br>
            </p>
            <br/>
            <h2>Items</h2>
            <br/>
            <?php CartController::getItems(); ?>
            <p>Number of Items: <?php echo CartController::getTotalNumberOfItems();?></p>
            <p>Total Price: <?php echo CartController::getTotalPrice();?></p>
            <br/>
            <br/>

            <button class="button" type="submit" value="buyFilm" name="buyFilm"><span>Purchase Films</span></button>
        </FORM>
    </div>
<?php include('Includes/Foot.php'); ?>