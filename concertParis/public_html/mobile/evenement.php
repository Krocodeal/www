<?php include("include/header.php");
session_start();


$link = connectDB();


// requ�te SQL qui compte le nombre total d'enregistrement dans la table et qui
//r�cup�re tous les enregistrements
$select =  'SELECT EVENEMENT_ID,EVENEMENT_Libelle, LIEU_Libelle, EVENEMENT_Prix, EVENEMENT_Description
			FROM `t_lieu`, t_evenement
			WHERE t_evenement.LIEU_ID = t_lieu.LIEU_ID
			AND EVENEMENT_ID = "'. $_GET["E_ID"].'";';
$result = mysql_query($select, $link) or die('Erreur : ' . mysql_error());

			
			if (isset($_POST['like'])){
				$select2='SELECT * FROM participer WHERE PERSONNE_ID = '. $_SESSION['user']['PERSONNE_ID'].' AND participer.EVENEMENT_ID = '. $_GET["E_ID"];
				$result2 = mysql_query($select2, $link) or die('Erreur : ' . mysql_error());
				if(result2){
					$_SESSION['erreur'] = 'Vous participez déjà à cet événement.<br/>';
				}else{
					$sql= "INSERT INTO participer VALUES(".$_SESSION['user']['PERSONNE_ID'].",". $_GET["E_ID"] .")";
					mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());
				}
			}
?>

<h1>Evénement</h1>
<br />
<div class="post"> <?php
		echo'<form action="evenement.php?E_ID='. $_GET["E_ID"] . '" method="post">';?>
	<fieldset> 
		<legend>Titre :</legend> 
        <p>
			<?php
			if((isset($_SESSION['erreur']))){
			echo $_SESSION['erreur'];}
				// Le nom, le lieu, le prix
				while($total = mysql_fetch_assoc($result)){
					echo ('<p>' . $total["EVENEMENT_Libelle"] . ' <br /> '. $total["LIEU_Libelle"] . ' | '. $total["EVENEMENT_Prix"] .'<br/>'.$total["EVENEMENT_Description"].'</p>');
					}
			?>
        </p>
        <p>
			<?php
				// Le nombre de personnes qui participent
				$select =  'SELECT *
							FROM t_evenement, participer
							WHERE participer.EVENEMENT_ID = t_evenement.EVENEMENT_ID
							AND participer.EVENEMENT_ID = '. $_GET["E_ID"];
				$result = mysql_query($select, $link) or die('Erreur : ' . mysql_error());
				$l=0;
				while($total = mysql_fetch_assoc($result)){
					$l++;
					}
				echo "Nombre de participants : ".$l;
			echo'<input type="submit" name="like" value="Like" style="float:right;">
			</form>';
				
			?>
        </p>
        <p>
			<?php
				// Player Soundcloud
				// Google Map
				//var_dump($total);
			?>
        </p>
	</fieldset> 
</form> </div><br />

 <?php include("include/footer.php");?>
