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

?>


<html>
<head>
<?php
	include "../includes/einbindungen.php";
?>
</head>
<body>

<!--
	PUT YOUR CODE IN HERE




/////////////////EXAMPLE OF SQL QUERY////////////////////
$examplevariable = SESSION/"3"/etc;

<?php
$stmt = $db->prepare("SELECT * from example where exampleID=:exampleID");
		$stmt->bindValue(":exampleID",$examplevariable);
		$stmt->execute();
		
		$result = $stmt->fetchAll();

		foreach ($result as $row) {

	 	$example= $row['example'];

		}
?>
/////////////////AUSGABE VON PHP VARIABLE IN HTML CODE

<?php echo($example) ?>

//WENN PHP VARIABLEN IN CSS UND JS CODE
//EINGEBAUT WERDEN SOLL, SOLLTE DIESER CODE IN DIESER DATEI STEHEN

/////////////////CSS CODE MIT PHP VARIABLEN
<style type="text/css">

.class<?php echo($example) ?>
{
	
}

#id<?php echo($example) ?>
{
	
}

</style>

/////////////////JS CODE MIT PHP VARIABLEN
<script type="text/javascript">

function funktion<?php echo($example) ?>() {
	................
	}

</script>	

/////////////////FORMS
//GANZ WICHTIG BEIM PFAND IN DEN ACTIONS ORDNER GEHEN

<form method="post" action="actions/action_php_vorlage.php">
	.........
</form>


-->

</body>

</html>