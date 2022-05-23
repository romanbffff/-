<?php
    // Вказуємо кодування
    header('Content-Type: text/html; charset=utf-8');
 
    $server = "sql205.unaux.com"; 
    $username = "unaux_31701774"; 
    $password = "wlx6jy7pigzms"; 
    $database = "unaux_31701774_register";
     
    // Підключення до бази даних через MySQLi
    $mysqli = new mysqli($server, $username, $password, $database);
 
    // Перевіряємо, чи успішність з'єднання.
    if ($mysqli->connect_errno) { 
        die("<p><strong>Помилка підключення до БД</strong></p><p><strong>Код помилки: </strong> ". $mysqli->connect_errno ." </p><p><strong>Опис помилки:</strong> ".$mysqli->connect_error."</p>"); 
    }
 
    // Встановлюємо кодування підключення
    $mysqli->set_charset('utf8');
 
    //Змінна, яка містить адресу (URL) нашого сайту
    $address_site = "http://jetiky.unaux.com";
?>