<?php include("include/header.php");

$link = connectDB();
?>

<h1>Recherche</h1>
<?php include("include/search.php");?>
<br />
	<?php
		echo '<center>Résultat pour votre recherche : "'. $_GET["Recherche"] .'"</center>';
	?>
<div class="divRecherche"> 
	<fieldset> 
		<legend>Evenement :</legend> 
        <p>
			<?php
				// requ�te SQL qui compte le nombre total d'enregistrement dans la table et qui
				//r�cup�re tous les enregistrements
				$select =  'SELECT EVENEMENT_ID,EVENEMENT_Libelle, LIEU_Libelle, EVENEMENT_Prix
							FROM `t_lieu`, t_evenement
							WHERE EVENEMENT_Libelle LIKE "%'. $_GET["Recherche"] .'%"
							AND t_evenement.LIEU_ID = t_lieu.LIEU_ID;';
				$result = mysql_query($select, $link) or die('Erreur : ' . mysql_error());
				if(mysql_num_rows($result) > 0){
					while($total = mysql_fetch_assoc($result)){
						echo ('<a href="evenement.php?E_ID=' . $total["EVENEMENT_ID"] . '">' . $total["EVENEMENT_Libelle"] . ' <br /> '. $total["LIEU_Nom"] . ' | '. $total["EVENEMENT_Prix"] .'</a><br/><br/>');
						}
					}
					else{
						echo ('Aucun résultat n\'a été trouvé dans cette rubrique.');
					}
				
			?>
        </p>
	</fieldset> <br />
	<fieldset> 
		<legend>Artiste :</legend> 
        <p>
			<?php
				// requ�te SQL qui compte le nombre total d'enregistrement dans la table et qui
				//r�cup�re tous les enregistrements
				$select =  'SELECT PERSONNE_ID, PERSONNE_Nom, PERSONNE_TypeUser
							FROM `t_artiste`
							WHERE PERSONNE_Nom LIKE "%'. $_GET["Recherche"].'%";';
				$result = mysql_query($select, $link) or die('Erreur : ' . mysql_error());
				if(mysql_num_rows($result) > 0){
					while($total = mysql_fetch_assoc($result)){
						echo ('<a href="fiche.php?ID=' . $total["PERSONNE_ID"] . '&TYPE=' . $total["PERSONNE_TypeUser"] . '">' . $total["PERSONNE_Nom"] . '</a><br/><br/>');
					}
				}else{
					echo ('Aucun résultat n\'a été trouvé dans cette rubrique.');
				}
			?>
        </p>
	</fieldset> <br />
	<fieldset> 
		<legend>Lieu :</legend> 
        <p>
			<?php
				// requ�te SQL qui compte le nombre total d'enregistrement dans la table et qui
				//r�cup�re tous les enregistrements
				$select =  'SELECT *
							FROM `t_lieu`
							WHERE LIEU_Libelle LIKE "%'. $_GET["Recherche"].'%";';
				$result = mysql_query($select, $link) or die('Erreur : ' . mysql_error());
				if(mysql_num_rows($result) > 0){
					while($total = mysql_fetch_assoc($result)){
						echo '<a href="lieu.php?L_ID=' .$total["LIEU_ID"].'">' .$total["LIEU_Libelle"].' <br /> ' .$total["LIEU_Adresse"].' <br /> '.$total["LIEU_Ville"]. ' | '.$total["LIEU_Codepostal"].'</a><br/><br/>';
					}
				}else{
					echo 'Aucun résultat n\'a été trouvé dans cette rubrique.';
				}
			?>
        </p>
	</fieldset> <br />
	<fieldset> 
		<legend>Utilisateur :</legend> 
        <p>
			<?php
				// requ�te SQL qui compte le nombre total d'enregistrement dans la table et qui
				//r�cup�re tous les enregistrements
				$select =  'SELECT PERSONNE_ID, PERSONNE_Pseudo, PERSONNE_TypeUser
							FROM `t_personne`
							WHERE PERSONNE_TypeUser = "utilisateur"
							AND PERSONNE_Pseudo LIKE "%'. $_GET["Recherche"].'%";';
				$result = mysql_query($select, $link) or die('Erreur : ' . mysql_error());
				if(mysql_num_rows($result) > 0){
					while($total = mysql_fetch_assoc($result)){
						echo '<a href="fiche.php?ID=' .$total["PERSONNE_ID"].'&TYPE=' .$total["PERSONNE_TypeUser"].'">'.$total["PERSONNE_Pseudo"].'</a><br/><br/>';
					}
				}else{
					echo 'Aucun résultat n\'a été trouvé dans cette rubrique.';
				}
			?>
        </p>
	</fieldset> 
 <br />
 </div>

 <?php include("include/footer.php");?>
