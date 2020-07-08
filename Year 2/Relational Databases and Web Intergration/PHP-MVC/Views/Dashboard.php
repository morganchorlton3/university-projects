<?php include('Includes/Head.php'); ?>
    <h1>Hi, <?php AuthController::getName(); ?>, Welcome to your dashboard:</h1>
    <br />
    <h1>Change Account Details</h1>
    <FORM METHOD="post" ACTION="">
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
        <p>
            <label>Password</label>
            <input id="password" value="<?php AuthController::getPassword(); ?>" name="password" type="password" required="required"/>
            </br>
        </p>
        <button class="button" type="submit" value="click" name="submitAccount"><span>Change Account Details</span></button>
    </FORM>
    <br />
    <h1>Change Address Details</h1>
    <FORM METHOD="post" ACTION="">
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
        <button class="button" type="submit" value="click" name="submitAddress"><span>Change Address Details</span></button>
    </FORM>
    <br/>
    <br/>
    <div id="wrapper">
        <a class="button" href="logout">Logout</a>
        <a class="button" href="purchaseHistory">Purchase History</a>
    </div>
    <br/>
<?php include('Includes/Foot.php'); ?>
