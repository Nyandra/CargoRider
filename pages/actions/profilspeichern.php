<?php
require_once('../../config/db_connect.php');
//copyandpaste
try {
$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PW);
}

catch (PDOException $e){
	echo "Verbindung fehlgeschlagen";
	die();
}
session_start();
if(isset($_POST['speichern'])){

$user = $_SESSION['user'];


$vorname = $_POST['vorname'];
$nachname = $_POST['nachname'];
$nationalitaet = $_POST['nationalitaet'];
$adresse = $_POST['adresse'];
$geburtstag = $_POST['geburtstag'];
$geburtsmonat = $_POST['geburtsmonat'];
$geburtsjahr = $_POST['geburtsjahr'];
$geburtsdatum = $geburtsjahr."-".$geburtsmonat."-".$geburtstag;

$interessen = $_POST['interessen'];
$geschlecht = $_POST['geschlecht'];
$facebook = $_POST['facebook'];
$twitter = $_POST['twitter'];
$pinterest = $_POST['pinterest'];
$nameSichtbar = $_POST['nameSichtbar'];
$captainInfo = $_POST['captainInfo'];





	 $stmt = $db->prepare("UPDATE users SET vorname='$vorname',nachname='$nachname',nationalitaet='$nationalitaet',adresse='$adresse', gebDatum='$geburtsdatum',interessen='$interessen',geschlecht='$geschlecht', facebook='$facebook',twitter='$twitter',pinterest='$pinterest',nameSichtbar='$nameSichtbar',captainInfo='$captainInfo' WHERE benutzername=:benutzer");

	$stmt->bindValue(":benutzer",$user);


	$stmt->execute();

}


?>
