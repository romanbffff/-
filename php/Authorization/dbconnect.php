<?php
    // Вказуємо кодування
    header('Content-Type: text/html; charset=utf-8');
 
    $server = "localhost"; 
    $username = "root"; 
    $password = "root"; 
    $database = "users";
     
    // Підключення до бази даних через MySQLi
    $mysqli = new mysqli($server, $username, $password, $database);
 
    // Перевіряємо, чи успішність з'єднання.
    if ($mysqli->connect_errno) { 
        die("<p><strong>Помилка підключення до БД</strong></p><p><strong>Код помилки: </strong> ". $mysqli->connect_errno ." </p><p><strong>Опис помилки:</strong> ".$mysqli->connect_error."</p>"); 
    }
 
    // Встановлюємо кодування підключення
    $mysqli->set_charset('utf8');
 
    //Змінна, яка містить адресу (URL) нашого сайту
    $address_site = "http://localhost";
?>