<?php
    //Запускаем сессию
    session_start();
 
    unset($_SESSION["email"]);
    unset($_SESSION["password"]);
     
    // Возвращаем пользователя на ту страницу, на которой он нажал на кнопку выход.
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ".$address_site."/index.php");
?>