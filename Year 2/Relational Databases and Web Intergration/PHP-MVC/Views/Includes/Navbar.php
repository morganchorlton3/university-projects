<?php
if (AuthController::checkAuth() == false) {
    echo '<ul>
    <li><a href="/u1753026/">Home</a></li>
    <li><a href="login">Login</a></li>
    <li><a href="register">Register</a></li>
</ul>';
}
    else if (AuthController::checkAuth() == true){
        echo'<ul>
    <li><a href="/u1753026/">Home</a></li>
    <li><a href="dashboard">Dashboard</a></li>
    <li><a href="purchaseHistory">Purchase History</a></li>
    <li><a href="cart">Cart</a></li>
    <li><a href="logout">Logout</a></li>
</ul>
        ';

} ?>
