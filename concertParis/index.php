<?php
	include("include/header.php");
?>

<h1>Agenda</h1>
<?php include("include/search.php");?>
<br />
<div class="post"> 
 <form action="index.php" method="post" id="accueil"> 
	<fieldset> 
		<legend>Evénements à venir :</legend> 
        	<?php
				$link = connectDB();

				$sql = 'SELECT * FROM t_evenement,t_photo,t_lieu WHERE t_evenement.EVENEMENT_ID = t_photo.EVENEMENT_ID AND  PHOTO_Libelle = "cover" AND t_evenement.LIEU_ID = t_lieu.LIEU_ID AND t_evenement.EVENEMENT_DATE >= CURRENT_DATE ORDER BY t_evenement.EVENEMENT_DATE ASC LIMIT 6 '; 
				$req = mysql_query($sql, $link) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
				$i = 0;
				
				echo "
					<div style='max-height:257px;overflow:auto'>
						<table style='margin : 0%;'>
							<tr>
				";

				while ($EvenementID = mysql_fetch_assoc($req)) {

					if ($i <= 2) {
						
						$sql1 = 'SELECT * FROM t_evenement,t_photo WHERE t_evenement.EVENEMENT_ID = t_photo.EVENEMENT_ID AND PHOTO_Libelle = "cover" AND t_evenement.EVENEMENT_ID = '. $EvenementID['EVENEMENT_ID'] .''; 
						$req1 = mysql_query($sql1, $link) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());

						$aUrlImageMea = mysql_fetch_assoc($req1);

						echo "<td class = 'mea'><a href='evenement.php?E_ID=" . $aUrlImageMea['EVENEMENT_ID'] . "'><img style='width:250px;height:250px' src='" .$aUrlImageMea['PHOTO_Url']. "' alt='" .$aUrlImageMea['EVENEMENT_Libelle']. "'></a></td>";
						
						$i++;

					} else {

						$sql2 = 'SELECT * FROM t_evenement,t_photo WHERE t_evenement.EVENEMENT_ID = t_photo.EVENEMENT_ID AND PHOTO_Libelle = "cover" AND t_evenement.EVENEMENT_ID = '. $EvenementID['EVENEMENT_ID'] .''; 
						$req2 = mysql_query($sql2, $link) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());

						$aUrlImageMea = mysql_fetch_assoc($req2);

						echo "</tr><tr>";
						echo "<td class = 'mea'><a href='evenement.php?E_ID=" . $aUrlImageMea['EVENEMENT_ID'] . "'><img style='width:250px;height:250px' src='" .$aUrlImageMea['PHOTO_Url']. "' alt='" .$aUrlImageMea['EVENEMENT_Libelle']. "'></a></td>";
						
						$i=0;

					}
					
				}
								
				echo "
							</tr>
						</table>
					</div>
				";
			?>
        	

        </p>
	</fieldset>
	</form>

	<br/>
	<br/>

	<form action="index.php" method="post" id="accueil">
	<fieldset> 
		<legend>Evénements avec le plus de participation :</legend> 
        <p>
        	<?php

				$sql = 'SELECT EVENEMENT_ID, COUNT(PERSONNE_ID) as nbPersonne FROM participer WHERE EVENEMENT_ID IN (SELECT EVENEMENT_ID FROM t_evenement WHERE t_evenement.EVENEMENT_DATE >= CURRENT_DATE) GROUP BY EVENEMENT_ID ORDER BY nbPersonne DESC LIMIT 6'; 
				$req = mysql_query($sql, $link) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
				$i = 0;
				
				echo "
					<div style='max-height:271px;overflow:auto'>
						<table>
							<tr>
				";

				while ($EvenementID = mysql_fetch_assoc($req)) {

					if ($i <= 2) {
						
						$sql1 = 'SELECT * FROM t_evenement,t_photo WHERE t_evenement.EVENEMENT_ID = t_photo.EVENEMENT_ID AND PHOTO_Libelle = "cover" AND t_evenement.EVENEMENT_ID = '. $EvenementID['EVENEMENT_ID'] .''; 
						$req1 = mysql_query($sql1, $link) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());

						$aUrlImageMea = mysql_fetch_assoc($req1);

						echo "<td class = 'mea'><a href='evenement.php?E_ID=" . $aUrlImageMea['EVENEMENT_ID'] . "'><img style='width:250px;height:250px' src='" .$aUrlImageMea['PHOTO_Url']. "' alt='" .$aUrlImageMea['EVENEMENT_Libelle']. "'></a></td>";
						
						$i++;

					} else {
							break;

					}
					
				}
								
				echo "
							</tr>
						</table>
					</div>
				";
			?>
        	

        </p>
	</fieldset> 
	</form>

	<br/>
	<br/>
	<form action="index.php" method="post" id="accueil">

	<fieldset> 
		
		<?php

			$sql = 'SELECT * FROM t_style'; 
			$req = mysql_query($sql, $link) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
			$i = 0;
			$aStyleId = array("");
			$aStyleName = array("");

			while ($styleId = mysql_fetch_assoc($req)) {
				array_push($aStyleId, $styleId['STYLE_ID']);
				array_push($aStyleName, $styleId['STYLE_Libelle']);
			}

			$randomId = 0;
			
			while ($randomId == 0) {
				$randomId = array_rand($aStyleId, 1);
			}

			$styleName = $aStyleName['' . $randomId . ''];

			echo"
			<legend>Evénements " . $styleName . " :</legend> 
        	<p>
        	";		
        		
        		$sql = 'SELECT * FROM associer WHERE STYLE_ID = ' . $randomId . ' AND EVENEMENT_ID IN (SELECT EVENEMENT_ID FROM t_evenement WHERE t_evenement.EVENEMENT_DATE >= CURRENT_DATE ORDER BY t_evenement.EVENEMENT_DATE ASC) '; 
				$req = mysql_query($sql, $link) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());

				echo "
					<div style='max-height:271px;overflow:auto'>
						<table>
							<tr>
				";

				while ($EvenementStyleID = mysql_fetch_assoc($req)) {
					if ($i <= 2) {
	
						$sql1 = 'SELECT * FROM t_evenement,t_photo WHERE t_evenement.EVENEMENT_ID = t_photo.EVENEMENT_ID AND PHOTO_Libelle = "cover" AND t_evenement.EVENEMENT_ID = '. $EvenementStyleID['EVENEMENT_ID'] .''; 
						$req1 = mysql_query($sql1, $link) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());

						$aUrlImageMea = mysql_fetch_assoc($req1);

						echo "<td class = 'mea'><a href='evenement.php?E_ID=" . $aUrlImageMea['EVENEMENT_ID'] . "'><img style='width:250px;height:250px' src='" .$aUrlImageMea['PHOTO_Url']. "' alt='" .$aUrlImageMea['EVENEMENT_Libelle']. "'></a></td>";

						$i++;

					} else {

						break;

					}		
				}
								
				echo "
							</tr>
						</table>
					</div>
				";
			?>
        	

        </p>
	</fieldset>

</form> <br /> 

 <?php include("include/footer.php");?>
