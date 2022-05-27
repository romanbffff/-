<?php
    require_once("header.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title class="lang" key="contact-title">JetIKy - Контакти</title>
    <link rel="stylesheet" type="text/css" href="/css/contact.css">
    <meta charset="utf-8">
</head>
       <body>
        <h1 class="lang" key="contact">Контакти</h1>
             <section class="contact">
             <div class="happy_girl_img">
               <img src="/pictures/happy_girl.jfif ">  
             </div>
             <div class="info">
             <h3 class="lang" key="tittle-quest">МАЄТЕ ЗАПИТАННЯ ЩОДО ПРОЕКТУ АБО СПІВПРАЦІ?</h3>  
             <p><a class="lang" key="answer">Вам залюбки відповість</a><br>
             <a class="lang" key="tech-adm">Технічний модератор JetIKy</a><br>
             <a> E-mail: <a href="mailto:jetiky@yopmail.com" class="lang">jetiky@yopmail.com</a><br>
             <a class="lang" key="andress"> Адреса: вулиця Келецька, 98,</a><br>
             <a class="lang" key="city-vn"> Вінниця, Вінницька область,21000</a><br>
              </p>
            </div> 
           </section>
           <h1 class="lang h_cont" key="">Форма зворотнього зв'язку</h1> 
           <section class="form">
           <form action="telegram.php" method="POST">

                <div class="form-group">
                    <label for="">Введіть ваше ім'я:</label>
                    <input type="text" class="form-control" id="" name="user_name" placeholder="Name">
                </div>
            
                <div class="form-group">
                    <label for="">Введіть ваш номер телефона:</label>
                    <input type="tel" class="form-control" id="" name="user_phone" placeholder="+38 (099) 99 99 999" pattern="^+380\d{3}\d{2}\d{2}\d{2}$" maxlength="13">
                </div>
            
                <div class="form-group">
                    <label for="">Введіть email:</label>
                    <input type="email" class="form-control" id="" name="user_email" placeholder="mail@mail.com">
                </div>
            <div class="form-group">
              <label for="" class="mes">Введіть повідомлення:</label>
              <textarea placeholder="Message" rows="3" name="user_message"></textarea>
            </div>
               
                <button type="submit" class="btn btn-primary">Відправити</button>
            </form>
        </section>
     </body>
    <footer class="f-contact"><p>JetIKy &copy; 2022</p></footer>
</html>


            
        
        


