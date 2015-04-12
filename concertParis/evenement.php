<?php include("include/header.php");


    $link = connectDB();


// requ�te SQL qui compte le nombre total d'enregistrement dans la table et qui
//r�cup�re tous les enregistrements
$select =  'SELECT *
			FROM `t_lieu`,t_photo, t_evenement
			WHERE t_evenement.LIEU_ID = t_lieu.LIEU_ID
			AND t_evenement.EVENEMENT_ID = t_photo.EVENEMENT_ID
			AND t_photo.PHOTO_Libelle = "cover"
			AND t_evenement.EVENEMENT_ID = "'. $_GET["E_ID"].'";';
$result = mysql_query($select, $link) or die('Erreur : ' . mysql_error());
$total = mysql_fetch_assoc($result);

$concert = new Concert($total['EVENEMENT_ID'], $total['LIEU_Libelle'],
                        $total['LIEU_Ville'],
                        $total['LIEU_Codepostal'],
                        $total['EVENEMENT_Libelle'],
                        $total['EVENEMENT_Description'],
                        $total['EVENEMENT_Prix'], $total['EVENEMENT_Horaire'],
                        $total['EVENEMENT_Date'], $total['PHOTO_Url']);

if ( isset ( $_GET['action'] ) && $_GET['action'] == 'ajoutPanier' && isset ( $_GET['E_ID']) && $_SESSION['user']->getPersonneTypeUser()=="utilisateur" ){
    $_SESSION['panier']->addPanier($concert);
    header('Location: displayPanier.php');
}

			
			if (isset($_POST['participer'])){
				$select2='SELECT count(*) FROM participer WHERE PERSONNE_ID = '. $_SESSION['user']->getPersonneID() .' AND EVENEMENT_ID = '. $_GET["E_ID"];
				$result2 = mysql_query($select2, $link) or die('Erreur : ' . mysql_error());
				$sql2 = mysql_fetch_array($result2);
				if($sql2[0] != 0){
					$_SESSION['erreur'] = 'Vous avez déjà ajouté cet événement à votre liste de souhaits.<br/>';
				}else{
					$sql= "INSERT INTO participer VALUES(".$_SESSION['user']->getPersonneID().",". $_GET["E_ID"] .")";
					mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());
				}
			}
?>

<h1>événement</h1>
<?php include("include/search.php");?>
<br />
<div class="post"> <?php
		echo'<form style="padding-top:1px;" action="evenement.php?E_ID='. $_GET["E_ID"] . '" method="post">';
        if (isset($_SESSION['user'])&& $_SESSION['user']->getPersonneTypeUser()=="utilisateur")
        echo'<a href="?action=ajoutPanier&E_ID='. $_GET["E_ID"] . '" ><input name="Submit" value="Ajouter au panier" style="float:right; border-bottom: none; border-radius: 3px 3px 0 0;" id="add-to-cart"></a>';?>
			<?php
				// Le nom, la date le lieu, le prix
					echo '<p>' . $total["EVENEMENT_Libelle"] . ' <br /> '. $total["EVENEMENT_Date"] . ' <br /></p><img style="width:100%" src="' .$total['PHOTO_Url']. '" alt="' .$total['EVENEMENT_Libelle']. '"><br /><p><a href="lieu.php?L_ID='. $total["LIEU_ID"] .'">'. $total["LIEU_Libelle"] . '</a> | ';
                    if($total["EVENEMENT_Prix"]>0) echo $total["EVENEMENT_Prix"]."euros";
                    else echo "Gratuit";
                    echo '<br/>'. nl2br($total["EVENEMENT_Description"]).'</p>';
			?>
        <p>
			<?php
			$select =  'SELECT  PERSONNE_ID, PERSONNE_NOM
							FROM t_artiste
							WHERE PERSONNE_ID IN (
								SELECT PERSONNE_ID 
								FROM se_produire
								WHERE se_produire.EVENEMENT_ID = '. $_GET["E_ID"].')';
				$result = mysql_query($select, $link) or die('Erreur : ' . mysql_error());
				echo 'Artiste(s) lié(s) : ';
				while($total = mysql_fetch_array($result)){
					echo '<a href="fiche.php?ID=' . $total[0] . '&TYPE=artiste">' . $total[1] . '</a> ';
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
			if (isset($_SESSION['user'])) {
                echo '<input type="submit" name="participer" value="Ajouter à ma liste de souhaits" style="float:right;">';
            }

			if((isset($_SESSION['erreur']))){
			echo '<p style="color:red;">'.$_SESSION['erreur'].'</p>';
			unset($_SESSION['erreur']);}

            if (isset($_SESSION['user'])&& $_SESSION['user']->getPersonneTypeUser()=="utilisateur")
                echo '<a href="?action=ajoutPanier&E_ID='. $_GET["E_ID"] . '" ><input name="Submit" value="Ajouter au panier" id="add-to-cart"></a>';

            echo'</form>';

				// Player Soundcloud
				// Google Map
				//var_dump($total);
			?>
        </p>
</form></div> <br />

 <?php include("include/footer.php");?>
