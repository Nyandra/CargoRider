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
	//test code ... steht später in der url(get parameter) 
	$userID = 3;
	
	include "../includes/header.php";
	
?>
<section id = "left">
	<div id = "userimage">	
		<?php
			//$userdata = $db->prepare("SELECT * from users where userID=:schiffID");

	
			
			$userdata = $db->prepare("SELECT * from users");
			$userdata->bindValue(":userID",$userID);
			$userdata->execute();
			$result = $userdata->fetchAll();
			foreach ($result as $row) {

			$vorname = $row['vorname'];

				echo $vorname;
			}
		

		?>	
	</div>
</section>

</section id = "right"></section>
