<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title class="lang" key="persn-sign-up">JetIKy - Реєстрація</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>window.onload = function () {document.body.classList.add('loaded');}</script>
    <link rel="icon" href="pictures/logo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/css/style for account/styles.css">
</head>
<body>
    <div class="preloader">
  <div class="preloader__row">
    <div class="preloader__item"></div>
    <div class="preloader__item"></div>
  </div>
</div>
    <?php
        require_once("header.php");
    ?>
<!-- Блок для виведення повідомлень -->
<div class="block_for_messages">
    <?php
        //Якщо у сесії існують повідомлення про помилки, то виводимо їх
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];
 
            //Знищуємо, щоб не виводилися заново при оновленні сторінки
            unset($_SESSION["error_messages"]);
        }
 
        //Якщо в сесії існують радісні повідомлення, то виводимо їх
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];
             
            //Знищуємо, щоб не виводилися заново при оновленні сторінки
            unset($_SESSION["success_messages"]);
        }
    ?>
</div>
 
<?php
    //Перевіряємо, якщо користувач не авторизований, то виводимо форму реєстрації, 
    //інакше виводимо повідомлення про те, що він уже зареєстрований
    if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])){
?>
        <div id="form_register">
        <section class="overlay1">
            <h2 class="lang" key="sign-up">Реєстрація</h2>
 
            <form action="/php/Authorization/register.php" method="post" name="form_register">
                <table>
                    <tbody><tr>
                        <td class="lang" key="name"> Ім'я: </td>
                        <td>
                            <input type="text" name="first_name" required="required">
                        </td>
                    </tr>
 
                    <tr>
                        <td class="lang" key="surname"> Прізвище: </td>
                        <td>
                            <input type="text" name="last_name" required="required">
                        </td>
                    </tr>
              
                    <tr>
                        <td> Email: </td>
                        <td>
                            <input type="email" name="email" required="required"><br>
                            <span id="valid_email_message" class="mesage_error"></span>
                        </td>
                    </tr>
              
                    <tr>
                        <td class="lang" key="password"> Пароль: </td>
                        <td>
                            <input type="password" name="password" placeholder="minimum 6 characters" required="required"><br>
                            <span id="valid_password_message" class="mesage_error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="lang reg" key="enter-captcha"> Введіть капчу: </td>
                        <td>
                            <p>
                                <img src="captcha.php" class="captcha" alt="captcha" /> <br><br>
                                <input type="text" class="i_reg" name="captcha" placeholder="captcha" required="required">
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <button type="submit" class="submit-reg lang" key="sign-up1" name="btn_submit_register">Зареєструватись</button>
                        </td>
                    </tr>
                </tbody></table>
            </form>
        </section>
        </div>
<?php
    }else{
?>
        <div id="authorized">
            <h2 class="lang" key="you-sign-up">Ви вже зареєстровані</h2>
        </div>
<?php
    }
?>
<footer class="f-reg"><p>JetIKy &copy; 2022</p></footer>
</body>
    </html>