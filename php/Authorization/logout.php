<?php
    session_start();
 
    unset($_SESSION["email"]);
    unset($_SESSION["password"]);
     
    // Повертаємо користувача на ту сторінку, на якій він натиснув кнопку вихід.
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ".$address_site."/index.php");
?>