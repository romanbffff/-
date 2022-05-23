<?php
    //Подключение шапки
    require_once("header.php");
?>
<!-- Блок для вывода сообщений -->
<div class="block_for_messages">
    <?php
        //Если в сессии существуют сообщения об ошибках, то выводим их
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];
 
            //Уничтожаем чтобы не выводились заново при обновлении страницы
            unset($_SESSION["error_messages"]);
        }
 
        //Если в сессии существуют радостные сообщения, то выводим их
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];
             
            //Уничтожаем чтобы не выводились заново при обновлении страницы
            unset($_SESSION["success_messages"]);
        }
    ?>
</div>
 
<?php
    //Проверяем, если пользователь не авторизован, то выводим форму регистрации, 
    //иначе выводим сообщение о том, что он уже зарегистрирован
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
                        <td class="lang" key="enter-captcha"> Введіть капчу: </td>
                        <td>
                            <p>
                                <img src="captcha.php" alt="captcha" /> <br><br>
                                <input type="text" name="captcha" placeholder="captcha" required="required">
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