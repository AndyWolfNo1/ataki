<?php
@session_start();
if(isset($_SESSION['user'])){
	$_SESSION['user']=null;
	header('Location: https://azot-potas.pl/ataki/login.php');
}

?>
