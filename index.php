<?php
require_once('config/db_connect.php');
/*Kommentar Andrea*/

try {
$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PW);
}

catch (PDOException $e){
	echo "Verbindung fehlgeschlagen";
	die();
}
?>
<?php
	include "includes/header.php";
?>


<!-- kommentar -sssssss->



<?php 
	include "includes/footer.php";
?>