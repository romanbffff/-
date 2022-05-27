<?php
    session_start();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="/css/style for account/styles.css">
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <link rel="icon" href="/pictures/logo.png" type="image/x-icon">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                "use strict";
                //================ Перевірка email ==================
         
                //регулярний вираз для перевірки email
                var pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i;
                var mail = $('input[name=email]');
                 
                mail.blur(function(){
                    if(mail.val() != ''){
         
                        // Перевіряємо, якщо введений email відповідає регулярному виразу
                        if(mail.val().search(pattern) == 0){
                            //Забираємо повідомлення про помилку
                            $('#valid_email_message').text('');
         
                            //Активуємо кнопку надсилання
                            $('input[type=submit]').attr('disabled', false);
                        }else{
                            //Виводимо повідомлення про помилку
                            $('#valid_email_message').text('Not the correct Email');
         
                            // Деактивуємо кнопку відправлення
                            $('input[type=submit]').attr('disabled', true);
                        }
                    }else{
                        $('#valid_email_message').text('Enter your email');
                    }
                });
         
                //================ Перевірка довжини пароля ==================
                var password = $('input[name=password]');
                 
                password.blur(function(){
                    if(password.val() != ''){
         
                        //Якщо довжина введеного пароля менше шести символів, виводимо повідомлення про помилку
                        if(password.val().length < 6){
                            //Виводимо повідомлення про помилку
                            $('#valid_password_message').text('The minimum password length is 6 characters');
         
                            // Деактивуємо кнопку відправлення
                            $('input[type=submit]').attr('disabled', true);
                             
                        }else{
                            // Забираємо повідомлення про помилку
                            $('#valid_password_message').text('');
         
                            //Активуємо кнопку надсилання
                            $('input[type=submit]').attr('disabled', false);
                        }
                    }else{
                        $('#valid_password_message').text('Enter password');
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
                    <li><a href="/php/Authorization/contact.php" class="lang" key="contact">Контакти</a></li>
            <?php
                //Перевіряємо чи авторизований користувач
                if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
                    // якщо ні, то виводимо блок із посиланнями на сторінку реєстрації та авторизації
            ?>
            <?php
                }else{
                    //Якщо користувач авторизований, то виводимо посилання Вихід
            ?> 
                    <li><a href="/php/Authorization/cab.php" class="lang" key="cab">Кабінет</a></li>
                    <li class="login"><a href="/php/Authorization/logout.php" class="login lang" key="logout">Вихід</a></li>
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
<script src="/js/lang/translator-app.js"></script>