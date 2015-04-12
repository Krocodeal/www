<?php include("include/header.php");

	$link = connectDB();

	//On recupere les infos de la personne
	$sql='SELECT * from t_personne';
	$req = mysql_query($sql,$link) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error()); 
?>

<h1>Users</h1>
<br />
	
<?php
	echo('<table><tr>
					<th>ID</th>
					<th>USER</th>
					<th>FICHE</th>
					<th>DELETE</th>
				</tr>');

	while ($aPersonneInfo = mysql_fetch_array($req)) {
		echo'<tr>
				<td>' .$aPersonneInfo['PERSONNE_ID'].'</td>
				<td>' .$aPersonneInfo['PERSONNE_Nom'].'</td>
				<td><a href="fiche.php?ID=' .$aPersonneInfo['PERSONNE_ID'].'&TYPE=' .$aPersonneInfo['PERSONNE_TypeUser']. '">Voir</a></td>
				<td><a href="action/destroy_user.php?ID=' .$aPersonneInfo['PERSONNE_ID'].'">Del</a></td>
			</tr>';
	}
	echo('</table>'); 
?>

 <?php include("include/footer.php");?>