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

if (isset($_GET['error'])){
	if ($_GET['error']==1) echo "Falscher Benutzernamen oder falsches Passwort";
	if ($_GET['error']==2) echo "Bitte einen Benutzernamen eingeben";
	if($_GET['error']==3) echo "Bitte Benutzernamen eingeben oder wiederholtes Passwort prüfen";
	if ($_GET['error']==4) echo "Benutzername existiert schon";
}

?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Anmelden</title>

<link rel="stylesheet" href="css/style_detailansicht.css">
<script type="text/javascript" src="lib/jquery.js"></script> 
<script type="text/javascript" src="lib/labs.js"></script>
<script type="text/javascript" src="lib/jquery.raty.js"></script>	
<script type="text/javascript" src="js/script_detailansicht.js"></script>
<script type="text/javascript" src="js/script_raty.js"></script>


</head>
<body>

<h2>login</h2>
<form method="post" action="actions/login.php">
<input type="text" name="user" placeholder="Benutzername" autofocus/><br/>
<input type="password" name="password" placeholder="password"/></br></br>
<input type="submit" value="submit" name="login"/>
</form>
</div>
<div class="_register">
<h2>register</h2>
<form method="post" action="actions/login.php">
<input type="text" name="user" placeholder="Benutzername" /></br>
<input type="password" name="password_r" placeholder="password"/></br>
<input type="password" name="password2_r" placeholder="repeat password"/></br>
<input type="text" name="emailadresse" placeholder="emailadresse"/></br>
<input type="submit" value="submit" name="register"/>
</form>
</body>

</html>