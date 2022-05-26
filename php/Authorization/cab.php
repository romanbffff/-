<?php
    session_start();
    require_once("header.php");
    include "dbConnection.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title class="lang" key="persn-acc">JetIKy - Особистий кабінет</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/style for account/cab.css">
</head>
<body>
<?php
 if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
					
            ?>
			<h1>Ви не авторизувались!</h1>
            <?php
                }else{
                   
            ?> 
                
    <h1 class="lang" key="cab">Кабінет</h1>
    <section class="account-info">
      <div class="hi-messange">
           <h2 class="lang" color="black" key="hello">Привіт, </h2><h2><?php echo $_SESSION['first_name']; ?>!</h2>
      </div>
      <div>
        <span class="email-info lang" key="y-email">Ваш Email:</span><span class="email-info"><?php echo $_SESSION['email']; ?></span>
      </div>
<!--
      <div>
        <form action="changePassword.php" method="POST">
	        <input name="old_password">
	        <input name="new_password">
	        <input type="submit" name="submit">
        </form>
      </div> -->
    </section>
    <h1 class="parnt-info lang" text-align="center" key="partners-video">Відео-матеріали наших партнерів</h1>
    <div class="gallery">
		       <div class="line1">
		       	<div class="photo">
			     <a href="https://www.youtube.com/watch?v=Kqi3S61CIWI&list=PLH1iFGL1sy5gyqE6SJb646b4hKb_D1RPJ" target="_blank"><img src="/pictures/white.png" alt="white pictures" title="Українська література"></a><span class="lang" key="ukrlangandlitr">Українська мова і <br>література</span>
			     </div>
			     <div class="photo">
			<a href="https://www.youtube.com/watch?v=qegIXq9ppq8&list=PLH1iFGL1sy5gHKvIZOJNkAk-GzjJ5xFGU" target="_blank"><img src="/pictures/white.png" alt="white pictures" title="Українська мова"></a><span class="lang" key="ukrlang">Українська мова</span>
		</div>
		       </div>
		<div class="line2">
			<div class="photo">
			<a href="https://www.youtube.com/watch?v=Dq79WEhXdgk&list=PLH1iFGL1sy5jrmyBo3RgiGjcTRGgbDdG_" target="_blank"><img src="/pictures/white.png" alt="white pictures" title="Історія"></a><span class="lang" key="history">Історія</span>
			</div>
			<div class="photo">
			<a href="https://www.youtube.com/watch?v=927ixVpw1w8&list=PLH1iFGL1sy5iGiHSNtwdOKnbeyPlQZsG_" target="_blank"><img src="/pictures/white.png" alt="white pictures" title="Географія"></a><span class="lang" key="geography">Географія</span>
			</div> 
		</div>
		<div class="line3">
			<div class="photo">
			<a href="https://www.youtube.com/watch?v=tWy5fdKiKHU&list=PLH1iFGL1sy5gZNoYzd8hts5vIbvGe0S-1" target="_blank"><img src="/pictures/white.png" alt="white pictures" title="Математика"></a><span class="lang" key="math">Математика</span>
			</div>
			<div class="photo">
			<a href="https://iq.vntu.edu.ua/method/by2.php?card_id=41975" target="_blank"><img src="/pictures/white.png" alt="white pictures" title="Фізика"></a><span class="lang" key="physics">Фізика</span>
			</div>
		</div>
     </div>
</body>
</html>
            <?php
                }
            ?>
<footer class="footer"><p>JetIKy &copy; 2022</p></footer>