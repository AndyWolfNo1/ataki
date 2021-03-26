<?php
@session_start();
include("funkcje.php");

//$_SESSION['user']= 'niko_kipas';

if(!isset($_SESSION['user'])){
	header('Location: https://azot-potas.pl/ataki/login.php');
	} else {
		$userName = $_SESSION['user'];
	}
echo_base();
?>

	<div id="tytul">
                <?php echo $userName;?>, zgłoś atak!

<div style="float:left; padding:10px;font-size:.5em;"><a href="https://azot-potas.pl/ataki/admin.php"><span style='font-size:1.3em;'>Administracja</span></a></div>
<div style="float:right; padding:10px;font-size:.5em;"><a href="https://azot-potas.pl/ataki/logout.php">Wyloguj</a></div></div>
	<div id="container">
<div style="float:left;">
<span> <b>Wpisz dane o ataku:</b></span>
		<form action="form.php" method="post" accept-charset="utf-8"><br><br>
<div id="wpisz">
<span id="rama">
<b>Obrońca:</b>
<input type="text" name="defender" />
</span>
<span id="rama">
<br><br>
<b>Nazwa osady:</b>
<input type="text" name="nameos">
<br><br>
<b>Typ osady:</b>
<span style="font-size:0.8em;">
<span id="rama2"><input type="radio" id="typ" name="typeos" value="off">
<label for="off"><b>Off</b></label></span>
<span id="rama2"><input type="radio" id="typ" name="typeos" value="deff" checked>
<label for="deff"><b>Deff</b></label></span>
<span id="rama2"><input type="radio" id="typ" name="typeos" value="inne">
<label for="inne"><b>Inne</b></label></span>
</span>
</span>
<span id="rama">
<br><br>
<b>Stolica:</b>
<span style="font-size:0.8em;">
<span id="rama2"><input type="radio" id="typ" name="stolica" value="tak">
<label for="off"><b>Tak</b></label></span>
<span id="rama2"><input type="radio" id="typ" name="stolica" value="nie">
<label for="deff"><b>Nie</b></label></span>

</span>
<span id="rama">
<br><br>
<b>Osada obrońcy(x‬‬|‭y‬)‬:</b>
<b>x:</b> <input id="input_kordy" type="text" name="x_def" id="url">
<b>y:</b> <input id="input_kordy" type="text" name="y_def" id="url">
</span>
<span id="rama"> 
<br><br>
<b>Osada napastnika(x‬‬|‭y‬)‬:</b>
<b>x:</b><input id="input_kordy" type="text" name="x_off" id="url">
<b>y:</b><input id="input_kordy" type="text" name="y_off" id="url">
</span>
<span id="rama">
<br><br>
<b>Fale:</b>
<input id="input_kordy" type="text" name="fale" /> szt.
</span>
<br><br>
<span id="rama">
<b>Artefakt:</b>
<input type="radio" name="art" value="tak">
<label for="artek"><b>Tak</b></label>
<input type="radio" name="art" value="nie" checked>
<label for="artek"><b>Nie</b></label>
</span>
<br><br>
<span id="rama">
<b>Klin:</b>
<input type="radio" name="klin" value="tak">
<label for="klin"><b>Tak</b></label>
<input type="radio" name="klin" value="nie" checked>
<label for="klin"><b>Nie</b></label>
&nbsp;&nbsp;&nbsp;(<span style="color:red; font-size:.8em;">jeżeli tak to podaj czas</span>) <input type="text" name="czas_klin">
</span>
<br><br>

<span id="rama">
<b>Czas ataku:</b>
<input type="text" name="czas" />
</span>
</div>
<br>
<input style="display:none;" type="text" name="login" value="<?php echo $userName;?>" />
<br>
<input style="height:1.6em; font-size:0.7em; color:red; margin-left:30px;"type="submit" value="ZGŁOŚ" />
<br><br>
</form>
</div>
<div style="float:right; margin-right:10%; padding-right:30px; padding-left:30px;">
<b>OGŁOSZENIA:</b><br><br>
<div style=''>
<span style="color:black;">
<?php

$sql = "SELECT * FROM `ogloszenia` WHERE `nazwa` = 'glowna'";
$info = db_get($sql);
$info = $info['tekst'];
echo $info;
?>

</span>
</div>
</div>
<div style="clear: both;"></div>
<div id="info">
<span style="font-size:1.1em; color:blue;">Proponowany <a href="http://npi-quest.pl/chat/" target="_blank">Czat</a> do komunikacji dla wszystkich graczy Travian PL3.<br></span>
<span style="font-size:1.1em; color:black;">logować można się za pomocą dowolnych nicków bez haseł<br>Proszę o promowanie chatu.</span>
</div>
</div>
</div>
<br>
<br>
<footer style="font-size:.6em; ">
  <p>Autor: Niko_Kipas<br>
  <a href="https://nowyporzadekinwestowania.pl/">NOWY PORZĄDEK INWESTOWANIA</a><br>
Napisz email: <a href="mail:niko_kipas@nowyporzadekinwestowania.pl">niko_kipas@nowyporzadekinwestowania.pl</a><br>
</footer>
</body>
</html>
