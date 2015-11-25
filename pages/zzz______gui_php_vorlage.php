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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>
<!--
	PUT YOUR TITLE IN HERE
-->

</title>

<link rel="stylesheet" href="css/style_detailansicht.css">
<script type="text/javascript" src="lib/jquery.js"></script> 
<script type="text/javascript" src="lib/labs.js"></script>
<script type="text/javascript" src="lib/jquery.raty.js"></script>	
<script type="text/javascript" src="js/script_detailansicht.js"></script>
<script type="text/javascript" src="js/script_raty.js"></script>


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