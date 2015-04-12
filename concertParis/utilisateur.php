<?php include("include/header.php");

$link = connectDB();
?>

<h1>Espace utilisateur</h1>
<?php include("include/search.php");?>
<br />
	<?php
		echo '<center>Les évènements auquels vous souhaitez participer :</center>';
	?>
<div class="divRecherche">
	<fieldset> 
		<legend>Evenements :</legend> 
        <p>
			<?php
				// requ�te SQL qui compte le nombre total d'enregistrement dans la table et qui
				//r�cup�re tous les enregistrements
				$select =  'SELECT participer.PERSONNE_ID,t_evenement.EVENEMENT_ID,t_evenement.EVENEMENT_Libelle, t_lieu.LIEU_Libelle, t_evenement.EVENEMENT_Prix
							FROM `t_lieu`, t_evenement, participer
							WHERE participer.PERSONNE_ID = '. $_SESSION['user']->getPersonneID() .'
							AND t_evenement.EVENEMENT_ID = participer.EVENEMENT_ID
							AND t_evenement.LIEU_ID = t_lieu.LIEU_ID ORDER BY t_evenement.EVENEMENT_DATE DESC;';
				$result = mysql_query($select, $link) or die('Erreur : ' . mysql_error());
				if(mysql_num_rows($result) > 0){
					while($total = mysql_fetch_assoc($result)){
						echo ('<a href="evenement.php?E_ID=' . $total["EVENEMENT_ID"] . '">' . $total["EVENEMENT_Libelle"] . ' <br /> '. $total["LIEU_Libelle"] . ' | '. $total["EVENEMENT_Prix"] .'</a><br/><br/>');
						}
					}
					else{
						echo ('Aucun résultat n\'a été trouvé dans cette rubrique.');
					}
				
			?>
        </p>
	</fieldset> <br />
</div>	
 <?php include("include/footer.php");?>