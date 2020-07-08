<?php include('Includes/Head.php'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop Site</title>
</head>
<body>
    <FORM METHOD="post" ACTION="">
        <p>
            <label>Full Name</label>
            <input id="name" value="" name="name" type="text" required="required"/>
            <br>
        </p>
        <p>
            <label>Phone Number</label>
            <input id="phoneNumber" value="" name="phoneNumber" type="text" required="required"/>
            <br>
        </p>
        <p>
            <label>Email</label>
            <input id="username" value="" name="username" type="email" required="required"/>
            <br>
        </p>
        <p>
            <label>Password</label>
            <input id="password" value="" name="password" type="password" required="required"/>
            </br>
        </p>
        <p>
            <label>Street</label>
            <input id="street" value="" name="street" type="text" required="required"/>
            </br>
        </p>
        <p>
            <label>City</label>
            <input id="city" value="" name="city" type="text" required="required"/>
            </br>
        </p>
        <p>
            <label>Post code</label>
            <input id="postcode" value="" name="postcode" type="text" required="required"/>
            </br>
        </p>
        <button type="submit" value="click" name="submit"><span>Register</span></button>
    </FORM>
<?php include('Includes/Foot.php'); ?>