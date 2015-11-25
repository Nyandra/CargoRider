<?php
require_once('../config/db_connect.php');
//copyandpaste
try {
$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PW);
}

catch (PDOException $e){
	echo "Verbindung fehlgeschlagen";
	die();
}
/*
if (isset($_GET['error'])){
	if ($_GET['error']==1) echo "Falscher Benutzernamen oder falsches Passwort";
	if ($_GET['error']==2) echo "Bitte einen Benutzernamen eingeben";
	if($_GET['error']==3) echo "Bitte Benutzernamen eingeben oder wiederholtes Passwort prüfen";
	if ($_GET['error']==4) echo "Benutzername existiert schon";
}*/

/* LOGOUT
if (isset($_GET['logout'])){
	session_start();
	$_SESSION['eingeloggt']=false;
}*/

?>


<!-- <img src="images/logo_v2.png"> -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Anmelden</title>

<link rel="stylesheet" href="css/style_ausklappdiv.css">


<script type="text/javascript" src="lib/jquery.js"></script> 
<script type="text/javascript" src="lib/labs.js"></script>
<script type="text/javascript" src="lib/jquery.raty.js"></script>	
<script type="text/javascript" src="js/script_ausklappdiv.js"></script>
<script type="text/javascript" src="js/script.js"></script>

</head>
<body>


<div class="login_bereich">	
	<div class="_login">
	<h2>Profilinfos</h2>
<form method="post" action="actions/profilspeichern.php">
<input type="text" name="vorname" placeholder="Vorname" autofocus/><br/>
<input type="text" name="nachname" placeholder="Nachname"/></br></br>

<select name="nationalitaet">
	<?php
	$stmt = $db->prepare("SELECT * FROM land");

	$stmt->execute();

	$result = $stmt->fetchAll();

	foreach ($result as $row) {
		$nati = $row['landCode'];
		$natiland = $row['land'];

		?>
<option value=<?php echo($nati) ?>><?php echo($natiland)?></option>
<?php
}
?>
</select>
</br>
<input type="text" name="adresse" placeholder="Adresse"/></br></br>
Geburtsdatum:</br>
Tag:</br>
<select name="geburtstag">
<?php
for($tag=1;$tag<=31;$tag++){
?>
<option value=<?php echo($tag) ?>><?php echo($tag) ?></option>
<?php
}
?>
</select>
<br>
Monat:</br>
<select name="geburtsmonat">
<?php
for($monat=1;$monat<=12;$monat++){
?>
<option value=<?php echo($monat) ?>><?php echo($monat) ?></option>
<?php
}
?>
</select>
<br>
Jahr:</br>
<select name="geburtsjahr">
<?php
for($jahr=1935;$jahr<=1997;$jahr++){
?>
<option value=<?php echo($jahr) ?>><?php echo($jahr) ?></option>
<?php
}
?>
</select>
<br>
<input type="text" name="interessen" placeholder="interessen"/></br></br>
Geschlecht:</br>
<input type="radio" name="geschlecht" value="m"/>m</br></br>
<input type="radio" name="geschlecht" value="w"/>w</br></br>
<input type="text" name="facebook" placeholder="facebookverbindung"/></br></br>
<input type="text" name="twitter" placeholder="twitterverbindung"/></br></br>
<input type="text" name="pinterest" placeholder="pinterestverbindung"/></br></br>
Soll Ihr Vor- und Nachname öffentlich sichbar sein?
<input type="radio" name="nameSichtbar" value="1"/>ja</br></br>
<input type="radio" name="nameSichtbar" value="0"/>nein</br></br>

<h2>Kapitänformular</h2>
<input type="text" name="captainInfo" placeholder="Wieso haben Sie besonderes Interesse an einer Frachtschiffreise?" /></br>
<input type="submit" value="speichern" name="speichern"/>
<input type="submit" value="überspringen" name="ueberspringen"/>

</form>
</div>
</div>
	</body></html>