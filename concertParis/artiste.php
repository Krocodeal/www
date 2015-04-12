<?php
include("include/header.php");
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']->getPersonneTypeUser() != 'artiste') {
    header('Location: index.php');
	
    exit();
}

		$link = connectDB();
		
		$Infosql='SELECT * FROM t_artiste,t_pays WHERE PERSONNE_ID = ' . $_SESSION['user']->getPersonneID() . ' AND t_pays.PAYS_ID = t_artiste.PAYS_ID';
		$Inforeq = mysql_query($Infosql, $link) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
		$ArtisteInfo = mysql_fetch_array($Inforeq);
		
?>

<h1>Artiste</h1>
<?php include("include/search.php");?>

	<div class="post">
		<form action="#" method="post" style="width:75%; margin-left:10%;">
			<fieldset>
				<legend>Votre profil</legend>
				<br/>
				<?php echo "<img style='width:100%;'src='". $ArtisteInfo['PERSONNE_Photo'] ."'>"; ?>
				<h2><?php echo($ArtisteInfo['PERSONNE_Nom']); ?></h2>
				<h4><?php echo($ArtisteInfo['PAYS_Libelle']); ?></h4>
				<textarea style="width:100%;min-height:120px;"><?php echo($ArtisteInfo['ARTISTE_Description']); ?></textarea><br/>
				<input type="submit" id="submitmarg" name="evenement" value="Sauvegarder">
			</fieldset>
		</form>
		<br />
	<?php

		
		//*******************************************************************************************************
			//On recupere et affiche ses evenement liés

			$sql='SELECT * from t_artiste, se_produire, t_evenement, t_lieu, t_photo WHERE t_artiste.PERSONNE_ID = ' . $_SESSION['user']->getPersonneID() . ' AND se_produire.PERSONNE_ID = ' . $_SESSION['user']->getPersonneID() . ' AND se_produire.EVENEMENT_ID = t_evenement.EVENEMENT_ID AND t_evenement.EVENEMENT_ID = t_photo.EVENEMENT_ID AND t_evenement.LIEU_ID = t_lieu.LIEU_ID';
			$req = mysql_query($sql,$link) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
			
			$i=0;

			while($aArtisteEvenement = mysql_fetch_array($req)) 
			{
				if ($i<1) {
					echo "<h2>Vos évènements à venir</h2>";
					$i++;
				}

				$imgUrl = $aArtisteEvenement['PHOTO_Url'];

				echo "<a href='evenement.php?E_ID=" . $aArtisteEvenement['EVENEMENT_ID'] . "'>
					<table style='border:1px solid black; max-width:450px;'>
						<tr><td ROWSPAN = 4 style='width:140px;'><img style='width:140px;' src='" .$imgUrl. "' alt='" . $aArtisteEvenement['PHOTO_Libelle'] . "' ></td><td>
						<tr><td>" .$aArtisteEvenement['EVENEMENT_Libelle']. "</td></tr>
						<tr><td>" .$aArtisteEvenement['LIEU_Libelle']. " - " .$aArtisteEvenement['LIEU_Ville']. " (" .$aArtisteEvenement['LIEU_Codepostal']. ")</td></tr>
						<tr><td>" .$aArtisteEvenement['EVENEMENT_Date']. " à " .$aArtisteEvenement['EVENEMENT_Horaire']. "</td></tr></td></tr>
					</table></a>
				";
				
			} ?>
<br/> 

 <?php include("include/footer.php");?>
