<!doctype html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity = "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin = "anonymous">
		<link rel = "stylesheet" href = "style.css">
		<title>Вход</title>
	</head>

	<body>
		<?php
			require('connect.php');

			if (isset($_POST['login']) && isset($_POST['password'])){
				$login = $_POST['login'];
				$password = $_POST['password'];

				$query = "INSERT INTO users (login, password) VALUES ('$login', '$password')";
				$result = mysqli_query($connection, $query);

				if ($result){
					$ssmg = "Регистрация прошла успешно";
				} else {
					$flsmg = "Ошибка";
				}
			}

		?>
		<div class = "container">
			<form class = "form-signin" method = "POST">
				<h2>Вход</h2>
				<?php if(isset($ssmg)){?> <div class = "alert alert-success" role = "alert"> <?php echo $ssmg; ?> </div> <?php } ?>
				<?php if(isset($flsmg)){?> <div class = "alert alert-danger" role = "alert"> <?php echo $flsmg; ?> </div> <?php } ?>
				<input type = "text" name = "login" class = "form-control" placeholder = "Логин" required>
				<input type = "text" name = "password" class = "form-control" placeholder = "Пароль" required>
				<button class = "btn btn-lg btn-primary btn-block" type = "submit">Регистрация</button>
				<a href = "index.php" class = "btn btn-lg btn-primary btn-block">Вход</a>
			</form>
	</body>
</html>