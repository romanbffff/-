<?php
    session_start();
    // Генеруємо випадкове число.
    $rand = mt_rand(1000, 9999);

    // Зберігаємо значення змінної $rand (капчі) у сесію
    $_SESSION["rand"] = $rand;
 
    //створюємо нове чорно-біле зображення
    $im = imageCreateTrueColor(90,50);
 
    // Вказуємо білий колір для тексту
    $c = imageColorAllocate($im, 255, 255, 255);
 
    // Записуємо отримане випадкове число на зображення
    imageTtfText($im, 20, -10, 10, 30, $c, __DIR__."/fonts/verdana.ttf", $rand);
 
    header("Content-type: image/png");
 
    // Виводимо зображення
    imagePng($im);
 
    //Звільняємо ресурси
    imageDestroy($im);
?>