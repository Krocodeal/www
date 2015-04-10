<?php include("include/header.php");
	if (isset($_GET['ID']) && !empty($_GET['ID']) && isset($_GET['TYPE']) && !empty($_GET['TYPE'])) {
		$link = connectDB();
		
		//*******************************************************************************************************
		//Si c est un artiste
		
		if ($_GET['TYPE'] == 'artiste') {
			
			//*******************************************************************************************************			
			//On recupere et affiche ses Infos

			$sql='SELECT * from t_artiste,t_pays WHERE PERSONNE_ID = ' .$_GET['ID']. ' AND t_pays.PAYS_ID = t_artiste.PAYS_ID';
			$req = mysql_query($sql,$link) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error()); 

			$aArtisteInfo = mysql_fetch_array($req);

			$nom = $aArtisteInfo['PERSONNE_Nom'];
			$photo = "<img style='max-width:450px;' src='" .$aArtisteInfo['PERSONNE_Photo']. "' >";
			if($aArtisteInfo['ARTISTE_Age']>0) $age=$aArtisteInfo['ARTISTE_Age'];
			$pays = utf8_encode($aArtisteInfo['PAYS_Libelle']);
			$description = $aArtisteInfo['ARTISTE_Description'];

			echo "<h1>Fiche Artiste</h1>
			<br />
			<table BORDER=2>
				<tr>
					<td rowspan=2 style='width:450px;'>" .$photo. "</td>
								<td align=center>" .$nom. "</td>";
						if(isset($age)) echo "<td align=center>" .$age. "</td>";
						echo"		<td align=center>" .$pays. "</td>
						<tr>
							<td COLSPAN=";
							if(isset($age)) echo "3"; else echo"2"; echo">" .$description. "</td>
						</tr>
			</table>";

			//*******************************************************************************************************
			//On recupere et affiche ses evenement liés

			$sql='SELECT * from t_artiste, se_produire, t_evenement, t_lieu, t_photo WHERE t_artiste.PERSONNE_ID = ' .$_GET['ID']. ' AND se_produire.PERSONNE_ID = ' .$_GET['ID']. ' AND se_produire.EVENEMENT_ID = t_evenement.EVENEMENT_ID AND t_evenement.EVENEMENT_ID = t_photo.EVENEMENT_ID AND t_evenement.LIEU_ID = t_lieu.LIEU_ID';
			$req = mysql_query($sql,$link) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
			
			$i=0;

			while($aArtisteEvenement = mysql_fetch_array($req)) 
			{
				if ($i<1) {
					echo "<h2>Evenements liés</h2>";
					$i++;
				}

				$imgUrl = $aArtisteEvenement['PHOTO_Url'];

				echo "<a href='evenement.php?E_ID=" . $aArtisteEvenement['EVENEMENT_ID'] . "'>
					<table style='border:1px solid black; width:450px;'>
						<tr><td ROWSPAN = 4 style='width:140px;'><img style='width:140px;' src='" .$imgUrl. "' alt='" . $aArtisteEvenement['PHOTO_Libelle'] . "' ></td><td>
						<tr><td>" .$aArtisteEvenement['EVENEMENT_Libelle']. "</td></tr>
						<tr><td>" .$aArtisteEvenement['LIEU_Libelle']. " - " .$aArtisteEvenement['LIEU_Ville']. " (" .$aArtisteEvenement['LIEU_Codepostal']. ")</td></tr>
						<tr><td>" .$aArtisteEvenement['EVENEMENT_Date']. " à " .$aArtisteEvenement['EVENEMENT_Horaire']. "</td></tr></td></tr>
					</table></a>
				";
				
			}

			//*******************************************************************************************************
			//On recupere et affiche ses liens (fb, tweet, insta..)

			$sql='SELECT * from t_lien WHERE PERSONNE_ID_Artiste = ' .$_GET['ID']. ' ';
			$req = mysql_query($sql,$link) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());

			

		//Si c est une orga
		} elseif ($_GET['TYPE'] == 'organisateur') {
			$sql='SELECT * from t_organisation,t_pays WHERE PERSONNE_ID = ' .$_GET['ID']. ' ';
			$req = mysql_query($sql, $link) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());

			$aOrgaInfo = mysql_fetch_array($req);

			$pseudo = $aOrgaInfo['PERSONNE_Pseudo'];
			$photo = $aOrgaInfo['PERSONNE_Photo'];
			$mail = $aOrgaInfo['PERSONNE_Mail'];

			echo "<h1>Fiche Organisateur</h1>
			<br />
			<table>
				<tr>
					<td>" .$pseudo. "</td>
					<td>" .$photo. "</td>
					<td>" .$mail. "</td>
				</tr>
			</table>
			";

			//*******************************************************************************************************
			//On recupere et affiche ses evenement liés

			$sql='SELECT * from t_organisation, organiser, t_evenement, t_lieu, t_photo WHERE t_organisation.PERSONNE_ID = ' .$_GET['ID']. ' AND organiser.PERSONNE_ID = ' .$_GET['ID']. ' AND organiser.EVENEMENT_ID = t_evenement.EVENEMENT_ID AND t_evenement.EVENEMENT_ID = t_photo.EVENEMENT_ID AND t_evenement.LIEU_ID = t_lieu.LIEU_ID';
			$req = mysql_query($sql,$link) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
			
			$i=0;

			while($aOrgaEvenement = mysql_fetch_array($req)) 
			{
				if ($i<1) {
					echo "<h2>Evenements liés</h2>";
					$i++;
				}

				$imgUrl = substr_replace($aOrgaEvenement['PHOTO_Url'], "/100x100/", 12, 1);

				echo "
					<table style='border:1px solid black;'>
						<tr><td ROWSPAN = 4><img src='" .$imgUrl. "' alt='" . $aOrgaEvenement['PHOTO_Libelle'] . "' ></td><td>
						<tr><td>" .$aOrgaEvenement['EVENEMENT_Libelle']. "</td></tr>
						<tr><td>" .$aOrgaEvenement['LIEU_Libelle']. " - " .$aOrgaEvenement['LIEU_Ville']. " (" .$aOrgaEvenement['LIEU_Codepostal']. ")</td></tr>
						<tr><td>" .$aOrgaEvenement['EVENEMENT_Date']. " à " .$aOrgaEvenement['EVENEMENT_Horaire']. "</td></tr></td></tr>
					</table>
				";
				
			}
		} else {
		//*******************************************************************************************************
		//Si c est un utilisateur lambda
		
		if ($_GET['TYPE'] == 'utilisateur') {
			
			//*******************************************************************************************************			
			//On recupere et affiche ses Infos

			$sql='SELECT * from t_utilisateur WHERE PERSONNE_ID = ' . $_GET['ID'];
			$req = mysql_query($sql,$link) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error()); 

			$aUtilInfo = mysql_fetch_array($req);

			$pseudo = $aUtilInfo['PERSONNE_Pseudo'];
			$photo = "<img style='max-width:450px;' src='" .$aUtilInfo['PERSONNE_Photo']. "' >";

			echo "<h1>Fiche Utilisateur</h1>
			<br />
			<table BORDER=2>
				<tr>
					<td style='max-width:450px;'>" .$photo. "</td>
								<td align=center style='width:350px;'><h2>" .$pseudo. "</h2></td>
						</tr>
			</table>";

			//*******************************************************************************************************
			//On recupere et affiche ses evenement liés
			echo'<h2>Evènements auquels participe ' . $pseudo . '</h2>';
			$select='SELECT *
					FROM `t_lieu`, t_evenement, participer,t_photo
					WHERE participer.PERSONNE_ID = '. $_GET['ID'] .'
					AND t_evenement.EVENEMENT_ID = participer.EVENEMENT_ID
					AND t_evenement.EVENEMENT_ID = t_photo.EVENEMENT_ID
					AND t_evenement.LIEU_ID = t_lieu.LIEU_ID;';
				$result = mysql_query($select, $link) or die('Erreur : ' . mysql_error());
					while($total = mysql_fetch_assoc($result)){
					
					if(mysql_num_rows($result) > 0){
						$imgUrl = $total['PHOTO_Url'];

						echo "<a style='width:450px;'href='evenement.php?E_ID=" . $total['EVENEMENT_ID'] . "'>
							<table style='border:1px solid black; width:450px;'>
								<tr><td ROWSPAN = 4 style='width:140px;'><img style='width:140px;' src='" .$imgUrl. "' alt='" . $total['PHOTO_Libelle'] . "' ></td><td>
								<tr><td>" .$total['EVENEMENT_Libelle']. "</td></tr>
								<tr><td>" .$total['LIEU_Libelle']. " - " .$total['LIEU_Ville']. " (" .$total['LIEU_Codepostal']. ")</td></tr>
								<tr><td>" .$total['EVENEMENT_Date']. " à " .$total['EVENEMENT_Horaire']. "</td></tr></td></tr>
							</table></a>";
						}
					else{
						echo ('Aucun résultat n\'a été trouvé dans cette rubrique.');
					}
				}
				
			}

		}
	} else { 
		header('Location: denied.php');
	}
?>

 <?php include("include/footer.php");?>