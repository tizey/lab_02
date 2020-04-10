<?php 
session_start();
include "../lang_arr.php";	

#выход
 if($_GET["exit"]){ 
        session_destroy();
        header("Location: ../auth.php");
    }


#Язык
if ($_GET["lang"]) {
	
	$_SESSION['lang'] = $_GET["lang"];
}


#Проверка на то что вообще хоть кто-тл залогинился
  if (!isset($_SESSION["role"])){
        header("Location: ../auth.php");
    }
   #Проверка на то что это админ

   if ($_SESSION["role"]=='client') {
        header("Location: ../404.php");
   }


    
   
?>
	

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Менеджер</title>
	<link rel="stylesheet" href="../styles/LkStyle.css">
</head>
<body>
	<!--Форма авторизации-->




<div class="select_lang">
<form method="GET">
	<input type="submit" name="exit"  value="<?php echo $translate[$_SESSION['lang']]['exit']; ?>">
</form>
<form >
		<select name="lang" method="GET">
			<option value="<?php $_SESSION['lang']; ?>"><?php echo $translate[$_SESSION['lang']]['ch_lan']; ?></option>
			<option value="ru">Russian</option>
			<option value="uk">Ukrainian</option>
			<option value="en">English</option>
			<option value="it">Italian</option>
		</select>
		<input type="submit" value="<?php echo $translate[$_SESSION['lang']]['save']; ?>">
</form>

</div>

<div class="left-s-bar">
	<div class="l-menu">
		<h2><?php echo $translate[$_SESSION['lang']]['menu'];?>  </h2>
			<div class="menu">
					


			<?php 	if ($_SESSION['role'] == 'admin') { ?>

			<a href="admin.php"><?php echo $translate[$_SESSION['lang']]['admin_menu']; ?></a>
			<br><br><br>
			<? } ?>





			<b><a href="manager.php"><?php echo $translate[$_SESSION['lang']]['manager_menu']; ?></a></b>
			<br><br><br>
			<a href="client.php"><?php echo $translate[$_SESSION['lang']]['client_menu']; ?></a>
			<br><br><br><br><br><br>	<br><br><br>
			 

			</div>
	</div>
		
</div>

<div class="contentich">
<p class="main_msg">  <?php 


	echo $translate[$_SESSION['lang']]['hello'];
	echo ", ";
	
	echo $_SESSION['name'];
	echo " ";
	echo $_SESSION['surname'];
	echo ". ";
	echo $translate[$_SESSION['lang']][$_SESSION['role']]; 

	?>    </p>



</div>

</body>
</html>