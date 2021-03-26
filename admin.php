<style>
table{
	background-color:white;
	margin-left:auto;
	margin-right:auto;
	font-weight: bold;
	text-align: center;
}

th{
	color:blue;
	padding:10px;
	background-color:#c8cae8;
}

td {
	padding:10px;
	background-color:#dfe0eb;
}
#kosz{
	width:50%;
}

</style>
<?php

include("funkcje.php");
include("vars.php");
include("parowa.php");
@session_start();

//$_SESSION['user'] = "niko_kipas";

if(!isset($_SESSION['user'])){
//	$_SESSION['user']=null;
	header('Location: https://azot-potas.pl/ataki/login.php');
	}else {
		$userName = $_SESSION['user'];
	}
echo_base();
echo '<meta name="viewport" content="width=device-width, initial-scale=.4">';
$sql = "SELECT * FROM `zgloszenia` WHERE status = 1";


?>

<div id="tytul">
                <?php echo "Ataki"; ?>

	

<div style="float:left; padding:10px;font-size:.5em;"><a  href="https://azot-potas.pl/ataki/"><span style='font-size:1.3em;'>Powrót</span></a></div>
<div style="float:right; padding:10px;font-size:.5em;"><a href="https://azot-potas.pl/ataki/logout.php">Wyloguj</a></div></div>
	<div id="container" style='color:black;'>

<?php

if(privilage($_SESSION['user'])== '5'){
	$conn = new mysqli($servername, $username, $password, $dbname);
	$conn -> set_charset("utf8");
	if ($conn->connect_error) {
		die("DB stat code 503. Connection failed: " . $conn->connect_error);
	} else{
		try {
			
			$wynik = mysqli_query($conn,$sql);
			$res = mysqli_fetch_assoc($wynik);
			
			 

			echo "<form id='form_log' action='' method='post'>";
			echo "<table><tr><th>LP</th><th>ID</th><th>Obrońca</th><th>Osada</th><th>Typ osady</th><th>Stolica</th><th>Link DEF</th><th>Link OFF</th><th>Fale</th><th>Artefakt</th><th>Klin</th><th>Czas klin</th><th>Czas wejścia</th><th>Login</th><th style='width:250px;'>Uwagi</th><th>Zgłoszono</th></tr>";

			$licznik = 1;
			while($row = $wynik->fetch_assoc()) {
				$_SESSION['ID_att'] = $row['id'];
				$link_def = gen_link_push($row['x_def'], $row['y_def']);
				$link_off = gen_link_push($row['x_off'], $row['y_off']);
				$_SESSION['uwagi'] = $row['uwagi'];
				 echo '<tr>';
					echo '<td>'.$licznik.'</td>';
					echo '<td>'.$row['id'].'</td>';
					echo '<td>'.$row['defender'].'</td>';
					echo '<td>'.$row['nameos'].'</td>';
					echo '<td>'.$row['typeos'].'</td>';
					echo '<td>'.$row['stolica'].'</td>';
					echo "<td><a target='_blank' href='".$link_def."'>(".$row['x_def'].')|('.$row['y_def'].")</a></td>";
					echo "<td><a target='_blank' href='".$link_off."'>(".$row['x_off'].')|('.$row['y_off'].")</a></td>";
					echo '<td>'.$row['fale'].'</td>';
					echo '<td>'.$row['art'].'</td>';
					echo '<td>'.$row['klin'].'</td>';
					echo '<td>'.$row['czas_klin'].'</td>';
					echo '<td>'.$row['czas'].'</td>';
					echo '<td>'.$row['login'].'</td>';
					//echo "<td style='font-size:.9em;'><textarea style=' resize: none; width:100%; font-weight: bold;' rows='4' name='uwagi'>".$_SESSION['uwagi'].'</textarea></td>';
					echo '<td>'.$row['uwagi'].'</td>';
					echo '<td>'.$row['czas_zgloszenia'].'</td>';
//					echo '<td><img src="https://nowyporzadekinwestowania.pl/upload/image/20210209/1612842270278033.png"  ><input id="kosz" type="checkbox" name="kosz" /></td>';
				echo '</tr>';
				$licznik++;
			}
			echo "</table><br><!--<input style='height:1.6em; font-size:0.7em; color:red; margin-right:30px; float:right;'type='submit' value='Zmień' /><br><br><div style='float:right; font-size:.7em;'>(Zmiany wprowadzać pojedyńczo)--></div></form>";

			if(isset($_POST['kosz'])){
					$kosz = $_POST['kosz'];
					$id_att = $_SESSION['ID_att'];
					$sql_kosz = "UPDATE `zgloszenia` SET `status`=0 WHERE id = '$id_att'; ";
					$wynik_kosz = mysqli_query($conn,$sql_kosz);
					header('Location: https://azot-potas.pl/ataki/admin.php');
				} 
			
			if(isset($_POST['uwagi'])){
				$uwagi = $_POST['uwagi'];
				$_SESSION['uwagi'] = $uwagi;
				$id_att = $_SESSION['ID_att'];
				$sql_uwagi = "UPDATE `zgloszenia` SET `uwagi`='$uwagi' WHERE id = '$id_att'; ";
				$wynik_uwagi = mysqli_query($conn,$sql_uwagi);
				header('Location: https://azot-potas.pl/ataki/admin.php');
			}


	}catch(Exception $e) {
	  echo 'Message: ' .$e->getMessage();
	}
	}
} else{
	die("<div id='info'><b>Brak uprawnień.</b><br><a  href='https://azot-potas.pl/ataki/'><span style='font-size:1.3em;'>Powrót</span></a></div>");
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
	if($_POST["czyszczenie"] == 'Clean'){
		consola('Wyczyszczono listę starych ataków.');
	}
}
//$konsola = consola('konsolowy tekst');
parowaPanel($_SESSION['user'], $parowa);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="js.js"></script>

<footer style="font-size:.6em; ">
  <p>Autor: Niko_Kipas<br>
  <a href="https://nowyporzadekinwestowania.pl/">NOWY PORZĄDEK INWESTOWANIA</a><br>
Napisz email: <a href="mail:niko_kipas@nowyporzadekinwestowania.pl">niko_kipas@nowyporzadekinwestowania.pl
</footer>
</body>
</html>

