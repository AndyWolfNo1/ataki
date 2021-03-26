<?php

include("vars.php");
include("funkcje.php");

@session_start();

$nick = '';
$haslo = '';
$haslo2 = '';

if(isset($_POST['nick']))$nick=$_POST['nick'] ;
if(isset($_POST['haslo']))$haslo=$_POST['haslo'] ;
if(isset($_POST['haslo2']))$haslo2=$_POST['haslo2'] ;
if(isset($_POST['nation']))$nation=$_POST['nation'] ;
if(isset($_POST['game_type']))$game_type=$_POST['game_type'] ;
echo "<style>#info{border:1px solid red; float:center; margin-top:30px; text-align:center; padding:20px;} body{background-color:#D0D0FF;}</style>";
if($nick == '' or $haslo2 == '' or $haslo2 =='') die("<div id='info'>Musisz uzupełnić wszystkie pola<br><a href='https://azot-potas.pl/ataki/register.php'>Powróć</a></div>"); 

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("DB stat code 503. Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, salt, password FROM `czlonkowie` WHERE name = '$nick'";

$wynik = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($wynik);

if((isset($row['name']) and (!isset($row['password'])))){
	

	if($haslo != $haslo2){
		echo "<div id='info'>Hasła muszą być takie same<br><a href='https://azot-potas.pl/ataki/register.php'>Powróć</a></div>";
	}

	if(($haslo == $haslo2)and (isset($row['name']))){
		if(isset($row['salt'])){
			$salt = $row['salt'];
			} else {
				echo("problem soli");
			}
		$pass_hash = hashuj($salt, $haslo2);
				
		$sql = "UPDATE `czlonkowie` SET `password`= '$pass_hash' WHERE name = '$nick'";
		

		 if ($conn->query($sql) === TRUE) {
			 echo "<div id='info'>Rejestrajca przebiegła pomyślnie!<br><a href='https://azot-potas.pl/ataki/'>Ataki</a></div>";
		 } else {
			 echo "Error: " . $sql . "<br>" . $conn->error;
		 }
		 
		$sql2 = "UPDATE `czlonkowie` SET `nation`= '$nation' WHERE name = '$nick'";
		if(isset($_POST['nation'])){
				$conn->query($sql2);
			}
		
		$sql3 = "UPDATE `czlonkowie` SET `game_type`= '$game_type' WHERE name = '$nick'";
		if(isset($_POST['game_type'])){
				$conn->query($sql3);
			}
	}
} else {
	if(!isset($row['name'])){
	echo"<div id='info'>Nie ma takiego członka w sojuszu, sprawdz jeszcze raz.<br><a href='https://azot-potas.pl/ataki/register.php'>Powróć</a></div>";
		
	}
	
	if((isset($row['password'])) and (isset($row['name']) and ($row['password']!=null) )){
		echo "<div id='info'>Jesteś już zarejestrowany.<br><a href='https://azot-potas.pl/ataki/'>Ataki</a></div>";
	} 
}

$conn->close();
?>
