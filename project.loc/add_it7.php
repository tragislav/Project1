<!doctype html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity = "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin = "anonymous">
		<link rel = "stylesheet" href = "style.css">
		<title>Добавление пропуска</title>
	</head>

	<body>
		<?php
			require('connect.php');

			if (isset($_POST['FIO']) && isset($_POST['subject'])){
				$FIO = $_POST['FIO'];
                $subject = $_POST['subject'];
                $hours = $_POST['hours'];

				$query = "INSERT INTO tablе_it7 (FIO, subject, hours) VALUES ('$FIO', '$subject', '$hours')";
				$result = mysqli_query($connection, $query);

				if ($result){
					$ssmg = "Добавление успешно, вернитесь назад, чтобы проверить";
				} else {
					$flsmg = "Ошибка";
				}
			}

		?>
		<div class = "container">
			<form class = "form-signin" method = "POST">
				<h2>Добавить пропуск</h2>
				<?php if(isset($ssmg)){?> <div class = "alert alert-success" role = "alert"> <?php echo $ssmg; ?> </div> <?php } ?>
				<?php if(isset($flsmg)){?> <div class = "alert alert-danger" role = "alert"> <?php echo $flsmg; ?> </div> <?php } ?>
				<input type = "text" name = "FIO" class = "form-control" placeholder = "ФИО" required>
				<input type = "text" name = "subject" class = "form-control" placeholder = "Предмет" required>
				<input type = "text" name = "hours" class = "form-control" placeholder = "Количество пропущенных часов" required><br>
				<button class = "btn btn-lg btn-primary btn-block" type = "submit">Добавить</button>
				<a href = "table_it7_admin.php" class = "btn btn-lg btn-primary btn-block">Назад</a>
			</form>
	</body>
</html>