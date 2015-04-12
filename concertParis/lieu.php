<?php include("include/header.php");
	if (isset($_GET['L_ID']) && !empty($_GET['L_ID'])) {
		$link = connectDB();
		
			
			//*******************************************************************************************************			
			//On recupere et affiche ses Infos

			$sql='SELECT * from t_lieu WHERE LIEU_ID = ' .$_GET['L_ID'];
			$req = mysql_query($sql,$link) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error()); 

			$total = mysql_fetch_array($req);

			echo "<h1>Fiche Lieu</h1>
			<br />
			<table style='width:100%;' BORDER=2>
				<tr>
				<td align=center><h2 style'margin-top:15px;'>" .$total['LIEU_Libelle']. "<br />"
								   .$total['LIEU_Adresse']. "<br />"
								   .$total['LIEU_Codepostal']. " "
								   .$total['LIEU_Ville']. "</h2></td>
			</table>";

			//*******************************************************************************************************
			//On recupere et affiche ses evenement liés

			$sql='SELECT * from t_evenement, t_lieu, t_photo WHERE t_evenement.LIEU_ID = ' .$_GET['L_ID']. ' AND t_lieu.LIEU_ID = ' .$_GET['L_ID']. ' AND t_evenement.EVENEMENT_ID = t_photo.EVENEMENT_ID AND t_evenement.LIEU_ID = t_lieu.LIEU_ID';
			$req = mysql_query($sql,$link) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
			
			$i=0;

			while($aLieuEvenement = mysql_fetch_array($req)) 
			{
				if ($i<1) {
					echo "<h2>Evenements liés</h2>";
					$i++;
				}

				$imgUrl = $aLieuEvenement['PHOTO_Url'];

				echo "<a href='evenement.php?E_ID=" . $aLieuEvenement['EVENEMENT_ID'] . "'>
					<table style='border:1px solid black; width:450px;'>
						<tr><td ROWSPAN = 4 style='width:140px;'><img style='width:140px;' src='" .$imgUrl. "' alt='" . $aLieuEvenement['PHOTO_Libelle'] . "' ></td><td>
						<tr><td>" .$aLieuEvenement['EVENEMENT_Libelle']. "</td></tr>
						<tr><td>" .$aLieuEvenement['LIEU_Libelle']. " - " .$aLieuEvenement['LIEU_Ville']. " (" .$aLieuEvenement['LIEU_Codepostal']. ")</td></tr>
						<tr><td>" .$aLieuEvenement['EVENEMENT_Date']. " à " .$aLieuEvenement['EVENEMENT_Horaire']. "</td></tr></td></tr>
					</table></a>
				";
				
			}
			
	} else { 
		header('Location: denied.php');
	}
?>

 <?php include("include/footer.php");?>