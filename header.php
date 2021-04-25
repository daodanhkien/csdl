<a href="/" id="homePage">Cookstar</a>

<?php
    if ( !isset($_COOKIE['user']) ) {
        echo file_get_contents("./loginForm.html");
    } else {
        include "user.php";
    }
?>
