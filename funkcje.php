<?php
@session_start();

include('parowa.php');

function privilage($name){
	include("vars.php");
	$conn = new mysqli($servername, $username, $password, $dbname);
	$conn -> set_charset("utf8");
	if ($conn->connect_error) {
		die("DB stat code 503. Connection failed: " . $conn->connect_error);
	} else{
		try {
			$sql = "SELECT privilages FROM `czlonkowie` WHERE name = '$name'";
			$wynik = mysqli_query($conn,$sql);
			@$row = mysqli_fetch_array($wynik);
}catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
		if(isset($row)){
			return $row['privilages'];
		} else {
			return 0;
		}	
	}
}


function db_get($sql){
	include("vars.php");
	$conn = new mysqli($servername, $username, $password, $dbname);
	$conn -> set_charset("utf8");
	if ($conn->connect_error) {
		die("DB stat code 503. Connection failed: " . $conn->connect_error);
	} else{
		try {
			$wynik = mysqli_query($conn,$sql);
			@$row = mysqli_fetch_array($wynik);
}catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
		if(isset($row)){
			return $row;
		} else {
			return 0;
		}	
	}
}

function hashuj($salt, $passw) {
  $data = $salt.$passw.$salt;
  $res = md5($data);
  return $res;
}

function echo_base(){
        $myfile = fopen("base.txt", "r") or die("Unable to open file!");
        echo fread($myfile,filesize("base.txt"));
        fclose($myfile);
}


function logowanie(){
echo_base(); 
	echo <<<END
<div id="panel">
<div id="tytul">
<p><b>Graczu koalicji Wik, zaloguj się nikiem z gry.</p>
</div>
<div id='container'>
<form id='form_log' action="login.php" method="post">
<label for="username">Nazwa gracza:</label>
<input type="text" id="username" name="username">
<label for="password">Hasło:</label>
<input type="password" id="password" name="password">
<div id="lower"><br>
<input type="submit" style="margin-right:auto; margin-left:auto;" value="Zaloguj">
</b>
</div>
</form>
<br> <a href="https://azot-potas.pl/ataki/register.php">Rejestracja</a>
</div>
	
END;
}

function gen_link_push($cord_x, $cord_y){
	$jeden = 'https://ts3.travian.pl/position_details.php?x=';
	$dwa = '&y=';
	$caly = $jeden.$cord_x.$dwa.$cord_y;
	return $caly;
}


function consola($par_contxt){
	echo '<div id="consola">';
	echo $par_contxt;
	echo '</div>';
}


function parowaPanel($name, $parowa){
	if($name == 'Niko_Kipas'){
		echo '<div id="panelParowy">';
		echo $parowa;
		echo '<br>';
//		consola
		echo '<br>';
		echo '</div>';
		} else{echo $name;}
}








?>

