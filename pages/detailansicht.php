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
<title>Anmelden</title>

<link rel="stylesheet" href="../css/style_detailansicht.css">
<script type="text/javascript" src="../lib/jquery.js"></script> 
<script type="text/javascript" src="../lib/labs.js"></script>
<script type="text/javascript" src="../lib/jquery.raty.js"></script>	
<script type="text/javascript" src="../js/script_detailansicht.js"></script>
<script type="text/javascript" src="../js/script_raty.js"></script>


</head>
<body>

<?php

		$stmt = $db->prepare("SELECT schiff.schiffID, schiff.schiffName, schiff.captain, schiff.groesse, schiff.nationalitaet, schiff.anzahlBesatzung, schiff.anzahlFotos, schiff.anzahlGaeste, schiff.anzahlGebucht, bewertungSchiff.datanumberGemuetlichkeit, avg(bewertungSchiff.datascoreGemuetlichkeit), bewertungSchiff.datanumberSauberkeit, avg(bewertungSchiff.datascoreSauberkeit), bewertungSchiff.datanumberFreundlichkeit, avg(bewertungSchiff.datascoreFreundlichkeit) FROM schiff INNER JOIN bewertungSchiff ON schiff.schiffID = bewertungSchiff.schiffID group by schiff.schiffID");

		$stmt->execute();

	

	$result = $stmt->fetchAll();

	



foreach ($result as $row) {
	 

	 	$schiffID= $row['schiffID'];

	 	$schiffName= $row['schiffName'];

	 	$captain= $row['captain'];

	 	$groesse = $row['groesse'];

	 	$nationalitaet = $row['nationalitaet'];

	 	$anzahlGaeste = $row['anzahlGaeste'];

	 	$anzahlGebucht = $row['anzahlGebucht'];

	 	$anzahlBesatzung = $row['anzahlBesatzung'];

	 	$anzahlFotos = $row['anzahlFotos'];

	 	$datanumberGemuetlichkeit = $row['datanumberGemuetlichkeit'];

	 	$avgdatascoreGemuetlichkeit = $row['avg(bewertungSchiff.datascoreGemuetlichkeit)'];

	 	$datanumberSauberkeit = $row['datanumberSauberkeit'];

	 	$avgdatascoreSauberkeit = $row['avg(bewertungSchiff.datascoreSauberkeit)'];

	 	$datanumberFreundlichkeit = $row['datanumberFreundlichkeit'];

	 	$avgdatascoreFreundlichkeit = $row['avg(bewertungSchiff.datascoreFreundlichkeit)'];
	 
	 ?>


<dl>
    <dt><? echo($schiffName) ?><a id="button" class="closed"></a></dt>
    <dd>
	<p>


<div class="scorenumberuser" data-number=<?php echo($anzahlGaeste) ?> data-score=<?php echo($anzahlGebucht) ?>></div></br>
<?php echo($anzahlGebucht) ?> von <?php echo($anzahlGaeste) ?> Usern haben bereits gebucht.




<?php
	 //	$schiffIDdatum = $schiffID;

	 	$stmt = $db->prepare("SELECT * from schiffreise where schiffID=:schiffID");
	 	$stmt->bindValue(":schiffID",$schiffID);
		$stmt->execute();
		$result = $stmt->fetchAll();
		foreach ($result as $row) {

			$abfahrtsdatum = $row['abfahrtsdatum'];
			$ankunftsdatum = $row['ankunftsdatum'];
			$schiffreiseID = $row['schiffreiseID'];
	?>
<?php
$stmt = $db->prepare("SELECT * from user where aktuelleSchiffsreiseID=:schiffreiseID");
	 	$stmt->bindValue(":schiffreiseID",$schiffreiseID);
		$stmt->execute();
		$result = $stmt->fetchAll();
		foreach ($result as $row) {

			$benutzername = $row['benutzername'];
?>
<br>
<?php echo ($benutzername) ?> fährt mit.
<?php
}
?>
<br><br>
Abfahrtsdatum: <?php echo($abfahrtsdatum) ?><br>
Ankunftsdatum: <?php echo($ankunftsdatum) ?><br>

<?php

			$stmt = $db->prepare("SELECT * from hafen join schiffreise on hafen.hafenID = schiffreise.anlegehafen and schiffreise.schiffID = :schiffID");
			$stmt->bindValue(":schiffID",$schiffID);
			$stmt->execute();
			$result=$stmt->fetchAll();
			foreach ($result as $row) {
				$anlegehafen = $row['hafen'];
?>			
Anlegehafen: <?php echo($anlegehafen) ?><br>
<?php } ?>

<?php

			$stmt = $db->prepare("SELECT * from hafen join schiffreise on hafen.hafenID = schiffreise.zielhafen and schiffreise.schiffID = :schiffID");
			$stmt->bindValue(":schiffID",$schiffID);
			$stmt->execute();
			$result=$stmt->fetchAll();
			foreach ($result as $row) {
				$zielhafen = $row['hafen'];
?>			
Zielhafen: <?php echo($zielhafen) ?><br>
<?php } ?>

<?php
//}
}
?>
</br></br>
<!-- AUFRUFEN UND OVERLAY WEITERE INFOS -->
<a href='#' onclick='weitereinfos<?php echo($schiffID) ?>()'>Informationen über das Schiff</a>

<div id="weitereinfos<?php echo($schiffID) ?>">
     <div>
          <p>Name:	<?php echo($schiffName) ?></br>
          	Kapitän:	<?php echo($captain) ?></br>
          	Größe:	<?php echo($groesse) ?> m^2</br>
          	Nationalität:	<?php echo($nationalitaet) ?></br>
          	Anzahl der Besatzung:	<?php echo($anzahlBesatzung) ?></br>

          	</p>
          Click here to [<a href='#' onclick='weitereinfos<?php echo($schiffID) ?>()'>close</a>]
     </div>
</div>

<!-- AUFRUFEN UND OVERLAY BEWERTUNG -->
<br><br>
<a href='#' onclick='bewertung<?php echo($schiffID) ?>()'>Bewertung</a>

<div id="bewertung<?php echo($schiffID) ?>">
     <div id="aussen">
          <p>
Gemütlichkeit:<br>
<div class="scorenumberanchor" data-number=<?php echo($datanumberGemuetlichkeit)?> data-score=<?php echo($avgdatascoreGemuetlichkeit) ?>></div>
<br>Die Gemütlichkeit erreichte <b><?php echo(round($avgdatascoreGemuetlichkeit,2)) ?> von <?php echo($datanumberGemuetlichkeit)?></b> Punkten.<br>
<br>
Sauberkeit<br>
<div class="scorenumberanchor" data-number=<?php echo($datanumberSauberkeit)?> data-score=<?php echo($avgdatascoreSauberkeit) ?>></div>
<br>Die Sauberkeit erreichte <b><?php echo(round($avgdatascoreSauberkeit,2)) ?> von <?php echo($datanumberSauberkeit)?></b> Punkten.<br>
<br>Freundlichkeit<br>
<div class="scorenumberanchor" data-number=<?php echo($datanumberFreundlichkeit)?> data-score=<?php echo($avgdatascoreFreundlichkeit) ?>></div>
<br>Die Freundlichkeit erreichte <b><?php echo(round($avgdatascoreFreundlichkeit,2)) ?> von <?php echo($datanumberFreundlichkeit)?></b> Punkten.<br>

<br>Kommentare:
<?php
$schiffIDkommentar = $schiffID;

$stmt = $db->prepare("SELECT kommentar FROM bewertungSchiff where schiffID=:schiffIDkommentar");
$stmt->bindValue(":schiffIDkommentar",$schiffIDkommentar);
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $row) {
	$kommentar = $row['kommentar'];

	print "<li>".$kommentar."</li>";
}
?>

          	</p>
          Click here to [<a href='#' onclick='bewertung<?php echo($schiffID) ?>()'>close</a>]
     </div>
</div>


	</dd>
	
</dl>


<!--SCRIPT //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<script type="text/javascript">


function weitereinfos<?php echo($schiffID) ?>() {
	el = document.getElementById("weitereinfos<?php echo($schiffID) ?>");
	el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
}

function bewertung<?php echo($schiffID) ?>() {
	el = document.getElementById("bewertung<?php echo($schiffID) ?>");
	el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
}
</script>
<!--SCRIPT ENDE //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--STYLE //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<style type="text/css">
#weitereinfos<?php echo($schiffID) ?> {
	 visibility: hidden;
     position: absolute;
     left: 0px;
     top: 0px;
     width:100%;
     height:100%;
     text-align:center;
     z-index: 1000;
}

#weitereinfos<?php echo($schiffID) ?> div {
     width:300px;
     margin: 100px auto;
     background-color: #fff;
     border:1px solid #000;
     padding:15px;
     text-align:center;
}

#bewertung<?php echo($schiffID) ?> {
	 visibility: hidden;
     position: absolute;
     left: 0px;
     top: 0px;
     width:100%;
     height:100%;
     text-align:center;
     z-index: 1000;
}

#bewertung<?php echo($schiffID) ?> #aussen {
     width:300px;
     margin: 100px auto;
     background-color: #fff;
     border:1px solid #000;
     padding:15px;
     text-align:center;
}
</style>
<!--STYLE ENDE//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<?php

	 	}

	?>
</body>
</html>