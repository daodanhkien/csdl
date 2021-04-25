<?php
    if ( !isset($_COOKIE['user']) ) {
        header("Location: /index.php", true);
        die();
    }
?>

<div id="logined">
    <p href="./order.html" class="button" onclick="nav()">
        <?php 
            echo $_COOKIE["userName"];
        ?>
    </p>
    <ul id="user" hidden="hidden">
    <li><a href="cart.php">Card</a></li>
    <li><a href="ordered.php">Da Mua</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>
</div>

<link rel="stylesheet" href="./assets/css/user.css" />
<script src="./assets/script/user.js"></script>
