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

/*
PUT YOUR CODE HERE
*/


////////////////////////EXAMPLE CODE VON LOGIN
////////////////////////SESSION, ISSET-FUNKTION, HEADER "LOCATION", ETC
/*
session_start();
if(isset($_POST['login'])){ //action von form


	$user = $_POST['user']; //eingabe in userfeld
	//md5 für hashen
	$pw=md5("supermegatollersalt").md5($_POST['password']); //passwortfeld

		//variable für statement
	$stmt = $db->prepare("SELECT * FROM users WHERE benutzername=:user AND passwort=:pw");
	$stmt->bindValue(":user",$user);
	$stmt->bindValue(":pw",$pw);

	$stmt->execute();

	$result = $stmt->fetchAll();

	
	$_SESSION['user'] = $user;

	ODER wenn schon eine session besteht diese übergeben an variable
	$user = $_SESSION['user'];



//wenn was falsches eingegeben wurde
	if(!isset($result[0])){
		$_SESSION['eingeloggt']=false;
		 header("Location: index.php?error=1");

	}

	if (isset($result[0])){
		$_SESSION['eingeloggt']=true;
		// sleep(5);
		header("Location: ../profil.php"); //wenn erfolgreich eingeloggt

	}

	
}

if(isset($_POST['register'])){ //action von form

if(($_POST['password_r'] == $_POST['password2_r']) && $_POST['user'] != ""){
	//if($_POST['user2'] !=""){

	$user = $_POST['user'];
	//md5 für hashen
	$pw1=md5("supermegatollersalt").md5($_POST['password_r']);
	$pw2=md5("supermegatollersalt").md5($_POST['password2_r']);


	// $alter = $_POST['alter'];
	$emailadresse = $_POST['emailadresse'];



	$stmt_askUser=$db->prepare("SELECT * FROM users WHERE benutzername=:user");
	$stmt_askUser->bindValue(":user",$user);

	$stmt_askUser->execute();
	
	$result_askUser= $stmt_askUser->fetchAll();

	$_SESSION['user'] = $user;



	if(isset($result_askUser[0])){
		header("Location: index.php?error=4"); //benutzername existiert schon
	}
	else {


	//variable für statement
	$stmt = $db->prepare("INSERT INTO users (benutzername,eMail,passwort) values (:user,:email,:passwort);");
	$stmt->bindValue(":user",$user);
	$stmt->bindValue(":passwort",$pw1);
	// $stmt->bindValue(":alter",$alter);
	$stmt->bindValue(":email",$emailadresse);

	$stmt->execute();


		$_SESSION['eingeloggt']=true;


	header("Location: ../profileingabe_gui.php");
}
}

else {
	header("Location: index.php?error=3");
}







}
*/
?>
