<?php
include("vars.php");
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
@session_start();

$defender = $_POST['defender'];
//$defender = mb_substr($defender, 0 ,20);
//$defender = iconv(mb_detect_encoding($defender), "UTF-8", $defender);
$nameos = $_POST['nameos'];
$typeos = $_POST['typeos'];
$x_def = $_POST['x_def'];
$y_def = $_POST['y_def'];
$x_off = $_POST['x_off'];
$y_off = $_POST['y_off'];
$fale = $_POST['fale'];
$art = $_POST['art'];
$klin = $_POST['klin'];
$czas = $_POST['czas'];
$login = $_POST['login'];
$pass = $_POST['pass'];
$czas_klin = $_POST['czas_klin'];
$stolica = $_POST['stolica'];


$data=date("m-d");
$czas_zgloszenia=date("m-d H:i:s");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

// Check connection
 if ($conn->connect_error) {
   die("DB stat code 503. Connection failed: " . $conn->connect_error);
 }

$sql = "SELECT name, password FROM `czlonkowie` WHERE name = '$login'";

echo "<style>#info{border:1px solid red; float:center; margin-top:30px; text-align:center; padding:20px;} body{background-color:#D0D0FF;}</style>";
$sql = "INSERT INTO zgloszenia (defender, nameos, typeos, stolica , x_def, y_def, x_off, y_off, fale, art, klin, czas_klin, czas, login, czas_zgloszenia, status)
	VALUES ('$defender', '$nameos', '$typeos', '$stolica', '$x_def', '$y_def', '$x_off', '$y_off', '$fale', '$art', '$klin', '$czas_klin', '$czas', '$login', '$czas_zgloszenia', '1')";
if ($conn->query($sql) === TRUE) {
	echo "<div id='info'>Dodano zawiadomienie o ataku!<br>Dziękujemy!";
	echo "<br><a href='https://azot-potas.pl/ataki/'>Powrót</a></div>";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}
 
$conn->close();

?>
