<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Авторизация</title>
	<link rel="stylesheet" href="styles/style.css">
</head>
<body>
	<!--Форма авторизации-->
	<form action="auth.php" method="post" class="form_auth">		
		<label>Логин</label>
		<input type="text" name="login" placeholder="Введите свой логин">

		<label>Пароль</label>
		<input type="password" name="password" placeholder="Введите свой пароль">

		<button>Войти</button>	

			<?php 
			if ($_SESSION['mess']) {
				echo '<p class="msg">' .$_SESSION['mess'] . '</p>';
			}			
				unset($_SESSION['mess']);
			?>
		

		</p>

	</form>
</body>
</html>