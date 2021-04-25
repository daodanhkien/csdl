<?php
    setcookie('user', "", time()-3600);
    setcookie('userName', "", time()-3600);

    header("Location: /index.php", true, 303);
    die();
?>
