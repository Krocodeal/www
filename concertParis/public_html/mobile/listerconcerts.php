<?php
require_once('connectDB.php');


	
	$link = connectDB();

	// on teste si une entrée de la base contient ce couple email / pass
	$sql = "SELECT EVENEMENT_ID, EVENEMENT_Libelle, EVENEMENT_Date FROM t_evenement WHERE EVENEMENT_DATE > CURRENT_DATE ORDER BY t_evenement.EVENEMENT_DATE DESC";
//	"' . mysql_real_escape_string($_REQUEST['loginemail']) . '" AND PERSONNE_Mdp = "' . mysql_real_escape_string(md5($_REQUEST['loginpass'])) . '"';
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
