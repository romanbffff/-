<?php
    session_start();

    //Дододаємо файл подключення до БД
    require_once("dbconnect.php");

    //Оголошуємо осередок для додавання помилок, які можуть виникнути під час обробки форми.
    $_SESSION["error_messages"] = '';
     
    //Оголошуємо осередок для додавання успішних повідомлень
    $_SESSION["success_messages"] = '';
    /*
    Перевіряємо, чи була відправлена ​​форма, тобто чи була натиснута кнопка Увійти. Якщо так, то йдемо далі, якщо ні, то виведемо користувачеві повідомлення про помилку, що він зайшов на цю сторінку не авторизувавшись.
    */
    if(isset($_POST["email"]) && !empty($_POST["password"])){

        //Перевіряємо отриману капчу
        if(isset($_POST["captcha"])){
         
            //Обрізаємо пробіли з початку та з кінця рядка
            $captcha = trim($_POST["captcha"]);
         
            if(!empty($captcha)){
         
                //Порівнюємо отримане значення із значенням із сесії. 
                if(($_SESSION["rand"] != $captcha) && ($_SESSION["rand"] != "")){
                     
                    // Якщо капча не вірна, то повертаємо користувача на сторінку авторизації, і там виведемо повідомлення про помилку що він ввів неправильну капчу.
         
                    $error_message = "<p class='mesage_error'><strong>Помилка!</strong> Ви робот? - Спробуйте ще разОК </p>";
         
                    // Зберігаємо у сесію повідомлення про помилку. 
                    $_SESSION["error_messages"] = $error_message;
         
                    //Повертаємо користувача на сторінку авторизації
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/php/Authorization/form_auth.php");
                    //Зупиняємо скрипт
                    exit();
                }
            }else{
         
                $error_message = "<p class='mesage_error'><strong>Помилка!</strong> Поле для вводу капчі не повинно бути порожнім. </p>";
         
                // Зберігаємо у сесію повідомлення про помилку. 
                $_SESSION["error_messages"] = $error_message;
         
                //Повертаємо користувача на сторінку авторизації
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/php/Authorization/form_auth.php");
         
                //Зупиняємо скрипт
                exit();
         
            }

            //Обрізаємо пробіли з початку та з кінця рядка
            $email = trim($_POST["email"]);
            if(isset($_POST["email"])){
             
                if(!empty($email)){
                    $email = htmlspecialchars($email, ENT_QUOTES);
             
                    //Перевіряємо формат отриманої поштової адреси за допомогою регулярного виразу
                    $reg_email = "/^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i";
             
                    //Якщо формат отриманої поштової адреси не відповідає регулярному виразу
                    if( !preg_match($reg_email, $email)){
                        // Зберігаємо у сесію повідомлення про помилку. 
                        $_SESSION["error_messages"] .= "<p class='mesage_error'>Ви ввели хибний email</p>";
                         
                        //Повертаємо користувача на сторінку авторизації
                        header("HTTP/1.1 301 Moved Permanently");
                        header("Location: ".$address_site."/php/Authorization/form_auth.php");
             
                        //Зупиняємо скрипт
                        exit();
                    }
                }else{
                    // Зберігаємо у сесію повідомлення про помилку. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Поле для вводу почтової адреси(email) не має бути порожнім.</p>";
                     
                    //Повертаємо користувача на сторінку реєстрації
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/php/Authorization/form_register.php");
             
                    //Зупиняємо скрипт
                    exit();
                }
                 
             
            }else{
                // Зберігаємо у сесію повідомлення про помилку.
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Відсутнє поле для вводу Email</p>";
                 
                //Повертаємо користувача на сторінку авторизації
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/php/Authorization/form_auth.php");
             
                //Зупиняємо скрипт
                exit();
            }
             
            if(isset($_POST["password"])){
 
                //Обрізаємо пробіли з початку та з кінця рядка
                $password = trim($_POST["password"]);
             
                if(!empty($password)){
                    $password = htmlspecialchars($password, ENT_QUOTES);
             
                    //Шифруємо пароль
                    $password = md5($password."top_secret");
                }else{
                    // Зберігаємо у сесію повідомлення про помилку.
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Вкажіть ваш пароль</p>";
                     
                    //Повертаємо користувача на сторінку реєстрації
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/php/Authorization/form_auth.php");
             
                    //Зупиняємо скрипт
                    exit();
                }
                 
            }else{
                // Зберігаємо у сесію повідомлення про помилку.
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Відсутнє поле для вводу паролю</p>";
                 
                //Повертаємо користувача на сторінку реєстрації
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/php/Authorization/form_auth.php");
             
                //Зупиняємо скрипт
                exit();
            }

            //Запит у БД на вибірці користувача.
            $result_query_select = $mysqli->query("SELECT * FROM `users` WHERE email = '".$email."' AND password = '".$password."'");
             
            if(!$result_query_select){
                // Зберігаємо у сесію повідомлення про помилку.
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Помилка запиту при виборі користувача із БД</p>";
                 
                //Повертаємо користувача на сторінку реєстрації
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/php/Authorization/form_auth.php");
             
                //Зупиняємо скрипт
                exit();
            }else{
             
                //Перевіряємо, якщо в базі немає користувача з такими даними, виводимо повідомлення про помилку
                if($result_query_select->num_rows == 1){
                     
                    // Якщо введені дані збігаються з даними з бази, зберігаємо логін і пароль в масив сесій.
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
             
                    //Повертаємо користувача на головну сторінку
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/php/Authorization/cab.php");
             
                }else{
                     
                    // Зберігаємо у сесію повідомлення про помилку. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error lang' key='error1'>Неправильний логін і/або пароль</p>";
                     
                    //Повертаємо користувача на сторінку авторизації
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/php/Authorization/form_auth.php");
             
                    //Зупиняємо скрипт
                    exit();
                }
            }
        }else{
            //Якщо капча не передана
            exit("<p><strong>Помилка!</strong> Відсутній перевіряючий код(код капчі). Ви можете перейти на <a href=".$address_site."> головну сторінку </a>.</p>");
        }

     
    }else{
        exit("<p><strong>Помилка!</strong> Ви зайшли на цю сторінку, поза авторизацією, тому немає данних для обробки. Ви можете перейти на <a href=".$address_site."> головну сторінку </a>.</p>");
    }