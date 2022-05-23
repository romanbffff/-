<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title class="MUnit lang" key="unit">JetIKy - Ми краще за Jet!</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="pictures/logo.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/lang/translator-app.js"></script>
</head>

<body class="page" id="HomePage">
	<header>
        <nav>
        <div class="header-menu">
            <div class="logo">
               <img src="pictures/logo.png" alt="logo" title="JetIKy">
            </div>
            <div class="menu">
                <ul>
                    <li><a href="index.php" class="lang" key="home">Головна</a></li>
                    <li><a href="#Test" class="lang" key="simulator">Тренажер</a></li>
                    <li><a href="#" class="lang" key="contact">Контакти</a></li>
					<?php
                //Проверяем авторизован ли пользователь
                if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
					// Не авторизований - вивід кнопки - ВХІД
            ?>
			<li class="login"><a href="/php/Authorization/form_auth.php" class="login lang" key="login">Вхід</a></li>
            <?php
                }else{
                    //Если пользователь авторизован, то выводим ссылку Выход
            ?> 
                    <li><a href="#" class="lang" key="shedule">Розклад</a></li>
                    <li class="login"><a href="/php/Authorization/cab.php" class="login lang" key="cab">Кабінет</a></li>
            <?php
                }
            ?>
                    <li><a id="ua" class="translate">UA</a></li>
                    <li><a id="en" class="translate">EN</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="block-information">
    	    <div class="text_info">
                <h1 class="lang" key="title">JetIKy - Навчальна платформа</h1><br><br>
                <h2 class="lang" key="description"><br>Онлайн платформа для дистанційного навчання</h2>
                <ul>
                    <br><li><span class="lang" key="parametrs">Безкоштовна форма навчання</span></li>
                    <li><span class="lang" key="goodmaterials">Зрозуміле подання матеріалів</span></li>
                    <li><span class="lang" key="viewing">Можливість переглядати вебінари</span></li>
                </ul>    
            </div>
            <div class="gif">
                <img src="pictures/gifka.gif" alt="The bear writes" title="Bear from Coca-Cola">
            </div>
    </div>
     <div class="Trenajer">
           <h1 id="Test" class="lang" key="simulatorZNO">Тренажер ЗНО</h1>
             <div class="gallery">
		       <div class="line1">
		       	<div class="photo">
			     <a href="https://zno.osvita.ua/ukrainian/" target="_blank"><img src="pictures/knugu.png" alt="Книга" title="Українська література"></a><span class="lang" key="ukrlangandlitr">Українська мова і <br>література</span>
			     </div>
			     <div class="photo">
			<a href="https://zno.osvita.ua/ukrmova/" target="_blank"><img src="pictures/pero.png" alt="Перо" title="Українська мова"></a><span class="lang" key="ukrlang">Українська мова</span>
		</div>
		    <div class="photo">
			<a href="https://zno.osvita.ua/mathematics/" target="_blank"><img src="pictures/kalculator.png" alt="Калькулятор" title="Математика"></a><span class="lang" key="math">Математика</span>
		       </div>
		       </div>
		<div class="line2">
			<div class="photo">
			<a href="https://zno.osvita.ua/ukraine-history/" target="_blank"><img src="pictures/sword.png" alt="Меч" title="Історія"></a><span class="lang" key="history">Історія</span>
			</div>
			<div class="photo">
			<a href="https://zno.osvita.ua/geography/" target="_blank"><img src="pictures/globus.png" alt="Глобус" title="Географія"></a><span class="lang" key="geography">Географія</span>
			</div>
			<div class="photo">
			<a href="https://zno.osvita.ua/biology/" target="_blank"><img src="pictures/dnk.png" alt="ДНК" title="Біологія"></a><span class="lang" key="biology">Біологія</span>
			</div>
		</div>
		<div class="line3">
			<div class="photo">
			<a href="https://zno.osvita.ua/physics/" target="_blank"><img src="pictures/atom.png" alt="Атом" title="Фізика"></a><span class="lang" key="physics">Фізика</span>
			</div>
			<div class="photo">
			<a href="https://zno.osvita.ua/chemistry/" target="_blank"><img src="pictures/probirka.png" alt="Пробірка і колба" title="Хімія"></a><span class="lang" key="chemestry">Хімія</span>
			</div>
			<div class="photo">
			<a href="https://zno.osvita.ua/english/" target="_blank"><img src="pictures/english.png" alt="Підручник англільської" title="Англільська мова"></a><span class="lang" key="english">Англійська мова</span>
			</div>
		</div>
     </div>
    </div>
                
    <footer>
  <p>JetIKy &copy; 2022</p>
</footer>
</body>
</html>