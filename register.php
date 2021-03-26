<?php

include("vars.php");

@session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ataki Wik</title>
<link rel="stylesheet"href="https://fonts.googleapis.com/css2?family=Crimson+Pro">
</head>
<body>
	<style>
body {
background-color:#D0D0FF;
padding:10px;
font-family: 'Crimson Pro', serif;
//font-size: 28px;
}

#container{
background-color:#7AA1E9;
margin:20px;
padding:15px;
padding-bottom:20px;
color:#0033AA;
text-align:center;
}

#tytul {
background-color:#7AA1E9;
margin:20px;
padding:5px;
color:#0033AA;
text-align:center;
//font-size:25px;
//font-family: 'Crimson Pro', serif;
font-size: 28px;
}

</style>
<div id="tytul">
    Rejestracja
</div>
	<div id="container">
		<p> Zarejestruj się nickiem z sojuszu WIK</p><br>
		<form action="reg.php" method="post">
			<b>Nick:</b><br>
			<input type="text" name="nick"><br>
			<b>Hasło:</b><br>
			<input type="password" name="haslo"><br>
			<b>Powtórz hasło:</b><br>
			<input type="password" name="haslo2"><br><br>
			<b>Nacja:</b></b><br>
				<label for="off">Rzymianie</label></span>
				<span id="rama2"><input type="radio" id="typ" name="nation" value="rzymianie">
				<label for="off">|| Galowie</label></span>
				<span id="rama2"><input type="radio" id="typ" name="nation" value="galowie" >
				<label for="deff">|| Germanie</label></span>
				<span id="rama2"><input type="radio" id="typ" name="nation" value="germanie"><br><br>
			<b>Typ gry:</b><br>
				<label for="off">OFF</label></span>
				<span id="rama2"><input type="radio" id="typ" name="game_type" value="OFF">
				<label for="off">|| DEFF</label>
				<span id="rama2"><input type="radio" id="typ" name="game_type" value="DEFF">
				</span><br><br>
			<input style="height:1.6em; font-size:0.7em; color:red;"type="submit" value="Zarejestruj" />
		</form>
</div>


<footer style="font-size:.6em; ">
  <p>Autor: Niko_Kipas<br>
  <a href="https://nowyporzadekinwestowania.pl/">NOWY PORZĄDEK INWESTOWANIA</a><br>
  Napisz email: <a href="mail:niko_kipas@nowyporzadekinwestowania.pl">niko_kipas@nowyporzadekinwestowania.pl</a><br>
</footer>
</body>
</html>
