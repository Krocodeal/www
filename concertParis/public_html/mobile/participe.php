<?php
require_once('connectDB.php');


	
	$link = connectDB();

	// on teste si une entrée de la base contient ce couple email / pass
	$sql = "SELECT COUNT(*) as BOOL FROM participer WHERE PERSONNE_ID ='".$_REQUEST['U_ID']."' and EVENEMENT_ID='".mysql_real_escape_string($_REQUEST['E_ID'])."'";
	$req = mysql_query($sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
	$data = mysql_fetch_assoc($req);
	if($data==0){
		$sql = "INSERT INTO participer VALUES (" .$_REQUEST['U_ID'].",".$_REQUEST['E_ID'].")";
		$req = mysql_query($sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
	}
	$sortie =array();
	$sortie[]=$data;
	print (json_encode($sortie));
	mysql_free_result($req);
	mysql_close();

	return $sortie;

?>