<?php
require_once('connectDB.php');


	
	$link = connectDB();

	// on teste si une entrée de la base contient ce couple email / pass
	$sql = "SELECT COUNT(PERSONNE_ID) as NB_UTILISATEUR FROM t_personne WHERE PERSONNE_Mail ='".mysql_real_escape_string($_REQUEST['Mail'])."' and PERSONNE_Mdp='".mysql_real_escape_string(md5($_REQUEST['Mdp']))."'";
	//$sql = "SELECT COUNT(*) as NB_UTILISATEUR FROM t_personne WHERE PERSONNE_Mail ='remikoci@hotmail.fr' and PERSONNE_Mdp='".md5("motdepasse")."'";	
	$req = mysql_query($sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
	$data = mysql_fetch_assoc($req);
	$sortie =array();
	$sortie[]=$data;
	print (json_encode($sortie));
	mysql_free_result($req);
	mysql_close();

	return $sortie;

?>