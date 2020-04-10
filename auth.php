<?php 
session_start();

$login = $_POST['login'];
$password = $_POST['password'];

#$_SESSION['log'] = $login;
#$_SESSION['pass'] = $password;




$users = [

['login' => 'Vasisualiy', 'name'=>'Василий', 'surname'=>'Лоханкин', 'password' => '12345', 'lang' => 'ru', 'role'=>'client'],
['login' => 'Afanasiy','name'=>'Афанасий', 'surname'=>'Цукерберг', 'password' => '54321', 'lang' => 'en', 'role'=>'client'],
['login' => 'Petro', 'name'=>'Петр', 'surname'=>'Инкогнито', 'password' => 'EkUC42nzmu', 'lang' => 'uk', 'role'=>'manager'],
['login' => 'Pedrolus', 'name'=>'Педро','surname'=>'Миланов', 'password' => 'Cogito_ergo_sum', 'lang' => 'it','role'=>'admin'],
['login' =>'Sasha', 'name'=>'Александр', 'surname'=>'Александров', 'password' => 'Ignorantia', 'lang' => 'it', 'role'=>'manager'],

];

#Перебираю элементы массива

for ($i=0; $i < count($users); $i++) { 

if ( ($users[$i]['login'] == $login) && ($users[$i]['password'] == $password) ) {	
			$counter++;

			
			#Передача в сессию 
			$_SESSION['log'] = $users[$i]['login'];
			$_SESSION['pass'] = $users[$i]['password'];
			$_SESSION['name'] = $users[$i]['name'];
			$_SESSION['surname'] = $users[$i]['surname'];
			$_SESSION['lang'] = $users[$i]['lang'];
			$_SESSION['role'] = $users[$i]['role'];

			#Проверяю какой именно пользователь вошёл
			#И перенаправляю на его страницу

				if ($users[$i]['role'] == 'admin') {
					header('Location: users/admin.php');
				}

				if ($users[$i]['role'] == 'client') {
					header('Location: users/client.php');
				}

				if ($users[$i]['role'] == 'manager') {
					header('Location: users/manager.php');
				}

			break;
	}
}

if ($counter == 0) {
	$_SESSION['mess'] = 'Такого пользователя не существует';    
	header('Location: index.php');
}


?>