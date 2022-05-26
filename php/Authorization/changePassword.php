<?php
    session_start();

    //Дододаємо файл подключення до БД
    require_once("dbconnect.php");

	$id = $_SESSION['id']; // id юзера із сесії
	$query = "SELECT * FROM users WHERE id='$id'";
	
	$result = mysqli_query($link, $query);
	$user = mysqli_fetch_assoc($result);
	
	$hash = $user['password']; // пароль з БД
	$oldPassword = $_POST['old_password'];
	$newPassword = $_POST['new_password'];
	
	// перевірка хешу (співпадіння з 'old_password')
	if (password_verify($oldPassword, $hash)) {
		$newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
		
		$query = "UPDATE users SET password='$newPasswordHash' WHERE id='$id'";
		mysqli_query($link, $query);
	} else {
        // вивід повідомлення про неправильно написаний пароль
	}
?>