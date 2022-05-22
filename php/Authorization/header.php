<?php
    //Запускаем сессию
    session_start();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>JetIKy</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <link rel="icon" href="/pictures/logo.png" type="image/x-icon">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                "use strict";
                //================ Перевірка email ==================
         
                //регулярное выражение для проверки email
                var pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i;
                var mail = $('input[name=email]');
                 
                mail.blur(function(){
                    if(mail.val() != ''){
         
                        // Проверяем, если введенный email соответствует регулярному выражению
                        if(mail.val().search(pattern) == 0){
                            // Убираем сообщение об ошибке
                            $('#valid_email_message').text('');
         
                            //Активируем кнопку отправки
                            $('input[type=submit]').attr('disabled', false);
                        }else{
                            //Выводим сообщение об ошибке
                            $('#valid_email_message').text('Не правильный Email');
         
                            // Дезактивируем кнопку отправки
                            $('input[type=submit]').attr('disabled', true);
                        }
                    }else{
                        $('#valid_email_message').text('Введите Ваш email');
                    }
                });
         
                //================ Проверка длины пароля ==================
                var password = $('input[name=password]');
                 
                password.blur(function(){
                    if(password.val() != ''){
         
                        //Если длина введенного пароля меньше шести символов, то выводим сообщение об ошибке
                        if(password.val().length < 6){
                            //Выводим сообщение об ошибке
                            $('#valid_password_message').text('Минимальная длина пароля 6 символов');
         
                            // Дезактивируем кнопку отправки
                            $('input[type=submit]').attr('disabled', true);
                             
                        }else{
                            // Убираем сообщение об ошибке
                            $('#valid_password_message').text('');
         
                            //Активируем кнопку отправки
                            $('input[type=submit]').attr('disabled', false);
                        }
                    }else{
                        $('#valid_password_message').text('Введите пароль');
                    }
                });
            });
        </script>
    </head>
    <body>
 
        <div id="header">
        <header>
        <nav>
        <div class="header-menu">
            <div class="logo">
               <img src="/pictures/logo.png" alt="logo" title="JetIKy">
            </div>
            <div class="menu">
                <ul>
                    <li><a href="/index.php" class="lang" key="home">Головна</a></li>
                    <li><a href="#" class="lang" key="contact">Контакти</a></li>
                    <li><a href="#" class="lang" key="shedule">Розклад</a></li>
            <?php
                //Проверяем авторизован ли пользователь
                if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
                    // если нет, то выводим блок с ссылками на страницу регистрации и авторизации
            ?>
            <?php
                }else{
                    //Если пользователь авторизован, то выводим ссылку Выход
            ?> 
                    <li class="login"><a href="/php/Authorization/logout.php" class="login lang" target="_blank" key="logout">Вихід</a></li>
            <?php
                }
            ?>
            <li><a id="ua" class="translate">UA</a></li>
            <li><a id="en" class="translate">EN</a></li>
            </ul>
            </div>
            </div> 
        </div>
       </nav>
    </header>