<?php
include("vars.php");
include("funkcje.php");
@session_start();
$expl_username = null;
$expl_password = '....';
$salt = null;

//$_SESSION['user'] = 'niko_kipas';

if(!isset($_SESSION['user'])){
	echo logowanie();
	} else {
		header('Location: https://azot-potas.pl/ataki/');
		// header('Location: http://localhost/ataki/');
	}

if(isset($_POST['username'])){
	$expl_username = $_POST['username'];
}

if(isset($_POST['password'])){
	$expl_password = $_POST['password'];
}

if($expl_password == '....'){
	echo"<div id='info' style='background-color:#7AA1E9;'>Wpisz login oraz hasło.</div>";
}

if(isset($expl_username) and isset($expl_password )){
	$sql = "SELECT name, password, salt FROM `czlonkowie` WHERE name = '$expl_username'";
	$row = db_get($sql);
	if(isset($row['name'])){
		$salt = $row['salt'];
		$name_user = $row['name'];
		$pass_user = $row['password'];
		$pass_hash_db = $pass_user;
		$pass_hash_form = hashuj($salt, $expl_password);
		if($pass_hash_db == $pass_hash_form){
			$_SESSION['user'] = $name_user;
			header('Location: https://azot-potas.pl/ataki/');
			// header('Location: http://localhost/ataki/');
		} else {
			echo"<div id='info'><b>Złe dane. Nie zapomnij się najpierw zarejestrować.</b></div>";
		}
	} else {
		echo"<div id='info'><b>Brak takiego gracza.</b></div>";
	}
	
	
	//echo $name_user.'<br>'.$salt.'<br>'.$pass_user;
}

?>
<footer style="font-size:.6em; ">
  <p>Autor: Niko_Kipas<br>
  <a href="https://nowyporzadekinwestowania.pl/">NOWY PORZĄDEK INWESTOWANIA</a><br>
Napisz email: <a href="mail:niko_kipas@nowyporzadekinwestowania.pl">niko_kipas@nowyporzadekinwestowania.pl</a><br>
</footer>
</body>
</html>
