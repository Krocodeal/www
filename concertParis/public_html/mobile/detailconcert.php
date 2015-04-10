<?php
require_once('connectDB.php');


	
	$link = connectDB();

	// on teste si une entrée de la base contient ce couple email / pass
	$sql = "SELECT *
			FROM ViewEvent
			WHERE EVENEMENT_ID = ". $_REQUEST['E_ID'];
	$req = mysql_query($sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
	$sortie =array();
	while($data = mysql_fetch_assoc($req))
	{
		$sortie[]=$data;
	}
	print (json_encode($sortie));
	mysql_free_result($req);
	mysql_close();

	return $sortie;

?>
