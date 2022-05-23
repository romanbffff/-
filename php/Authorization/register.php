<?php
    session_start();
    require_once("dbconnect.php");

    //Оголошуємо осередок додавання помилок, які можуть виникнути під час обробки форми.
    $_SESSION["error_messages"] = '';

    //Оголошуємо осередок для додавання успішних повідомлень
    $_SESSION["success_messages"] = '';

    /*
        Перевіряємо, чи була відправлена ​​форма, тобто чи була натиснута кнопка зареєструватися. Якщо так, то йдемо далі, якщо ні, то користувач зайшов на цю сторінку безпосередньо. У цьому випадку виводимо повідомлення про помилку.
    */
    if(isset($_POST["email"]) && !empty($_POST["password"])){
        
        //Обрізаємо пробіли з початку та з кінця рядка
        $captcha = trim($_POST["captcha"]);

        if(isset($_POST["captcha"]) && !empty($captcha)){

            //Порівнюємо отримане значення із значенням із сесії.
            if(($_SESSION["rand"] != $captcha) && ($_SESSION["rand"] != "")){
                
                // Якщо капча не вірна, то повертаємо користувача на сторінку реєстрації, і там виведемо повідомлення про помилку що він ввів неправильну капчу.
                $error_message = "<p class='mesage_error'><strong>Помилка!</strong> Ви робот? - Спробуйте ще разОК </p>";

                // Зберігаємо у сесію повідомлення про помилку. 
                $_SESSION["error_messages"] = $error_message;

                //Повертаємо користувача на сторінку реєстрації
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/php/Authorization/form_register.php");

                //Зупиняємо скрипт
                exit();
            }

            //Перевіряємо якщо у глобальному масиві $_POST існують дані, надіслані з форми і укладаємо передані дані в звичайні змінні.
            if(isset($_POST["first_name"])){
                
                //Обрізаємо пробіли з початку та з кінця рядка
                $first_name = trim($_POST["first_name"]);

                //Перевіряємо змінну на порожнечу
                if(!empty($first_name)){
                    // Для безпеки, перетворюємо спеціальні символи на HTML-сутності
                    $first_name = htmlspecialchars($first_name, ENT_QUOTES);
                }else{
                    // Зберігаємо у сесію повідомлення про помилку. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error'>Вкажіть Ваше ім'я</p>";

                    //Повертаємо користувача на сторінку реєстрації
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/php/Authorization/form_register.php");

                    //Зупиняємо скрипт
                    exit();
                }

                
            }else{
                // Зберігаємо у сесію повідомлення про помилку.
                $_SESSION["error_messages"] .= "<p class='mesage_error'>Відсутнє поле із іменем</p>";

                //Повертаємо користувача на сторінку реєстрації
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/php/Authorization/form_register.php");

                //Зупиняємо скрипт
                exit();
            }

            
            if(isset($_POST["last_name"])){

                //Обрізаємо пробіли з початку та з кінця рядка
                $last_name = trim($_POST["last_name"]);

                if(!empty($last_name)){
                    // Для безпеки, перетворюємо спеціальні символи на HTML-сутності
                    $last_name = htmlspecialchars($last_name, ENT_QUOTES);
                }else{

                    // Зберігаємо у сесію повідомлення про помилку.
                    $_SESSION["error_messages"] .= "<p class='mesage_error'>Вкажіть Ваше прізвище</p>";
                    
                    //Повертаємо користувача на сторінку реєстрації
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/php/Authorization/form_register.php");

                    //Зупиняємо скрипт
                    exit();
                }

                
            }else{

                // Зберігаємо у сесію повідомлення про помилку.
                $_SESSION["error_messages"] .= "<p class='mesage_error'>Відсутнє поле з прізвищем</p>";
                
                //Повертаємо користувача на сторінку реєстрації
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/php/Authorization/form_register.php");

                //Зупиняємо скрипт
                exit();
            }

            
            if(isset($_POST["email"])){

                //Обрізаємо пробіли з початку та з кінця рядка
                $email = trim($_POST["email"]);

                if(!empty($email)){


                    $email = htmlspecialchars($email, ENT_QUOTES);

                    //Перевіряємо формат отриманої поштової адреси за допомогою регулярного виразу
                    $reg_email = "/^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i";

                    //Якщо формат отриманої поштової адреси не відповідає регулярному виразу
                    if( !preg_match($reg_email, $email)){
                        // Зберігаємо у сесію повідомлення про помилку.
                        $_SESSION["error_messages"] .= "<p class='mesage_error' >Ви ввели хибний email</p>";
                        
                        //Повертаємо користувача на сторінку реєстрації
                        header("HTTP/1.1 301 Moved Permanently");
                        header("Location: ".$address_site."/php/Authorization/form_register.php");

                        //Зупиняємо скрипт
                        exit();
                    }

                    //Перевіряємо, чи немає вже такої адреси в БД.
                    $result_query = $mysqli->query("SELECT `email` FROM `users` WHERE `email`='".$email."'");
                    
                    //Якщо кількість отриманих рядків дорівнює одиниці, значить користувач з такою поштовою адресою вже зареєстрований
                    if($result_query->num_rows == 1){

                        //Якщо отриманий результат не дорівнює false
                        if(($row = $result_query->fetch_assoc()) != false){
                            
                                // Зберігаємо у сесію повідомлення про помилку. 
                                $_SESSION["error_messages"] .= "<p class='mesage_error' >Користувач з такою поштовою адресою вже зареєстрований</p>";
                                
                                //Повертаємо користувача на сторінку реєстрації
                                header("HTTP/1.1 301 Moved Permanently");
                                header("Location: ".$address_site."/php/Authorization/form_register.php");
                            
                        }else{
                            // Зберігаємо у сесію повідомлення про помилку.
                            $_SESSION["error_messages"] .= "<p class='mesage_error' >Помилка в запиті до БД</p>";
                            
                            //Повертаємо користувача на сторінку реєстрації
                            header("HTTP/1.1 301 Moved Permanently");
                            header("Location: ".$address_site."/php/Authorization/form_register.php");
                        }

                        /* закриття вибірки */
                        $result_query->close();

                        //Зупиняємо скрипт
                        exit();
                    }

                    /* закриття вибірки */
                    $result_query->close();
                }else{
                    // Зберігаємо у сесію повідомлення про помилку.
                    $_SESSION["error_messages"] .= "<p class='mesage_error'>Вкажіть Ваш email</p>";
                    
                    //Повертаємо користувача на сторінку реєстрації
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/php/Authorization/form_register.php");

                    //Зупиняємо скрипт
                    exit();
                }

            }else{
                // Зберігаємо у сесію повідомлення про помилку.
                $_SESSION["error_messages"] .= "<p class='mesage_error'>Відсутнє поле для вводу Email</p>";
                
                //Повертаємо користувача на сторінку реєстрації
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/php/Authorization/form_register.php");

                //Зупиняємо скрипт
                exit();
            }

            
            if(isset($_POST["password"])){

                //Обрізаємо пробіли з початку та з кінця рядка
                $password = trim($_POST["password"]);

                if(!empty($password)){
                    $password = htmlspecialchars($password, ENT_QUOTES);

                    //Шифруємо папроль
                    $password = md5($password."top_secret"); 
                }else{
                    // Зберігаємо у сесію повідомлення про помилку.
                    $_SESSION["error_messages"] .= "<p class='mesage_error'>Вкажіть ваш пароль</p>";
                    
                    //Повертаємо користувача на сторінку реєстрації
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/php/Authorization/form_register.php");

                    //Зупиняємо скрипт
                    exit();
                }

            }else{
                // Зберігаємо у сесію повідомлення про помилку.
                $_SESSION["error_messages"] .= "<p class='mesage_error'>Відсутнє поле для вводу паролю</p>";
                
                //Повертаємо користувача на сторінку реєстрації
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/php/Authorization/form_register.php");

                //Зупиняємо скрипт
                exit();
            }

            //Запит на додавання користувача до БД
            $result_query_insert = $mysqli->query("INSERT INTO `users` (first_name, last_name, email, password) VALUES ('".$first_name."', '".$last_name."', '".$email."', '".$password."')");

            if(!$result_query_insert){
                // Зберігаємо у сесію повідомлення про помилку.
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Помилка запиту при додаванні користувача із БД</p>";
                
                //Повертаємо користувача на сторінку реєстрації
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/php/Authorization/form_register.php");

                //Зупиняємо скрипт
                exit();
            }else{

                $_SESSION["success_messages"] = "<p class='success_message'>Реєстрація пройшла успішно!!! <br />Тепер Ви можете авторизуватися використовуючи Ваш логін и пароль.</p>";

                //Надсилаємо користувача на сторінку авторизації
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/php/Authorization/form_auth.php");
            }

            /* Завершення запиту */
            $result_query_insert->close();

            //Закриваємо підключення до БД
            $mysqli->close();
            
        }else{
            //Якщо капча не передана або вона є порожньою
            exit("<p><strong>Помилка!</strong> Відсутній перевіряючий код(код капчі). Ви можете перейти на <a href=".$address_site."> головну сторінку </a>.</p>");
        }

    }else{

        exit("<p><strong>Помилка!</strong> Ви зайшли на цю сторінку, поза авторизацією, тому немає данних для обробки. Ви можете перейти на <a href=".$address_site."> головну сторінку </a>.</p>");
    }
?>