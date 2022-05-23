<?php
    require_once("header.php");
?>
<!-- Блок для показу повідомлень -->
<div class="block_for_messages">
    <?php
 
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];
 
            //Забираємо щоб не появилось заново при оновленні сторінки
            unset($_SESSION["error_messages"]);
        }
 
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];
             
            unset($_SESSION["success_messages"]);
        }
    ?>
</div>
 
<?php
    //Проверяем, если пользователь не авторизован, то выводим форму авторизации, 
    //иначе выводим сообщение о том, что он уже авторизован
    if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])){
?>
 
 
    <div id="form_auth">
    <section class="overlay">
        <h2 class="lang" key="sign-in">Авторизація</h2>
        <form action="auth.php" method="post" name="form_auth">
            <table>
          
                <tbody><tr>
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
                            <img src="captcha.php" alt="Img captcha" /> <br>
                            <input type="text" name="captcha" placeholder="captcha">
                        </p>
                    </td>
                </tr>
 
                <tr>
                    <td colspan="2">
                        <button type="submit" class="submit lang" key="sign-in1" name="btn_submit_auth">Увійти</button>
                    </td>
                </tr>
            </tbody></table>
        </form>
        <div class="create-ac">
            <h4 class="lang" key="none-ac?">Немає аккаунту? - </h4><a href="form_register.php" class="lang" key="sign-up2">Зареєструватися</a>
        </div>
    </section>
    </div>
 
<?php
    }else{
?>
 
    <div id="authorized">
        <h2 class="lang" key="you-sign-in">Ви вже авторизовані</h2>
    </div>
 
<?php
    }
?>

<footer class="f-auth">
  <p>JetIKy &copy; 2022</p>
</footer>
