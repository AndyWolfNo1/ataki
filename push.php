<?php

include("funkcje.php");

@session_start();
 if(!isset($_SESSION['user'])){
	 $_SESSION['user']=null;
	 header('Location: https://azot-potas.pl/ataki/login.php');
 } else {
	 $username = $_SESSION['user'];
 }

//$username = 'niko_kipas';
$ilosc = false;

if(isset($_POST['ilosc'])){
	$ilosc=$_POST['ilosc'] ;
}


echo_base();

$sql = "SELECT * FROM `push` ORDER BY id DESC LIMIT 1";
$row = db_get($sql);
$get_pusher = $row['name'];
$cord_x_pusher = $row['cord_x'];
$cord_y_pusher = $row['cord_y'];
$link_cord = $row['link'];
$data_push = $row['data'];
$link_get_pusher = gen_link_push($cord_x_pusher, $cord_y_pusher);
$sql = "SELECT * FROM `ogloszenia` WHERE `nazwa` = 'pushe'";
$info = db_get($sql);
$info = $info['tekst'];

?>

<div id="tytul">
                <?php echo "Dziś wysyłamy surowce do <a href='$link_get_pusher' target='_blank'>$get_pusher</a>"; ?>

	

<div style="float:left; padding:10px;font-size:.5em;"><a  href="https://azot-potas.pl/ataki/"><span style='font-size:1.3em;'>Powrót</span></a></div>
<div style="float:right; padding:10px;font-size:.5em;"><a href="https://azot-potas.pl/ataki/logout.php">Wyloguj</a></div></div>
	<div id="container" style='color:black;'>

<?php
if ($link_cord != null){
	echo "<div id='tytul'><a target='_blank' href='"
	echo $link_get_pusher;
	echo "'>'";
    echo "(";
    echo $cord_x_pusher ;
    echo ")|(" ;
    echo$cord_y_pusher ;
    echo ")</a></div></div>";
    } else {
        echo $link_cord;
	echo "</div></div>";
        }
?>


	<?php 
	
	echo $info; 

?>

<footer style="font-size:.6em; ">
  <p>Autor: Niko_Kipas<br>
  <a href="https://nowyporzadekinwestowania.pl/">NOWY PORZĄDEK INWESTOWANIA</a><br>
Napisz email: <a href="mail:niko_kipas@nowyporzadekinwestowania.pl">niko_kipas@nowyporzadekinwestowania.pl
</footer>
</body>
</html>
