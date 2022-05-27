<?php

/* https://api.telegram.org/bot5237546248:AAGLWukTGCcciTOCr6OCE88rgSA74tVD72I/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$email = $_POST['user_email'];
$message = $_POST['user_message'];
$token = "5237546248:AAGLWukTGCcciTOCr6OCE88rgSA74tVD72I";
$chat_id = "-1001686992917";
$arr = array(
  "Ім'я користувача: " => $name,
  'Телефон: ' =>$phone,
  'Email: ' => $email,
  'Повідомлення: '=> $message
);

foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) {
  header('Location: contact.php');
} else {
  echo "Error";
}
?>