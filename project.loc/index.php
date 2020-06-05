<?php session_start(); ?>
<!doctype html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity = "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin = "anonymous">
		<link rel = "stylesheet" href = "style.css">
		<title>Вход</title>
	</head>

	<body>
		
		<div class = "container">
			<form class = "form-signin" method = "POST">
				<h2>Вход</h2>
				<input type = "text" name = "login" class = "form-control" placeholder = "Логин" required>
				<input type = "text" name = "password" class = "form-control" placeholder = "Пароль" required>
				<button class = "btn btn-lg btn-primary btn-block" type = "submit">Вход</button>
		
			</form>

			<?php
			require('connect.php');

			if (isset($_POST['login']) and isset($_POST['password'])){
				$login = $_POST['login'];
				$password = $_POST['password'];

				$query = "SELECT * FROM users WHERE login = '$login' and password =  '$password'";
				$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
				$count = mysqli_num_rows($result);

				if ($count == 1){
					$_SESSION['login'] = $login;
				} else {
					echo '<script>alert("Данные неверные! Пожалуйста, заполните поля правильно.");</script>';
				}
			}

			if (isset($_SESSION['login'])){
				$login = $_SESSION['login'];
				header ('Location: main.php');
   				exit();
				/*echo "Добро пожаловать " . $login . " ";
				echo "Вы вошли";
				echo "<a href = 'logout.php' class = 'btn btn-lg btn-primary'>Выйти</a>";*/
			} 

		?>


	</body>
</html>
