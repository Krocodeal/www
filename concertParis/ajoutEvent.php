<?php

include("include/header.php");
session_start();


if (!isset($_SESSION['user']) || $_SESSION['user']->getPersonneTypeUser() != 'organisateur') {
    header('Location: index.php');
	
    exit();
}

$link = connectDB();

// on teste si le visiteur a soumis le formulaire
if (isset($_POST['evenement']) && ($_POST['evenement'] == 'Ajouter')) {
    // on teste l'existence de nos variables. On teste également si elles ne sont pas vides
    if (
    	(isset($_POST['libelle']) && !empty($_POST['libelle'])) 
    	&& (isset($_POST['description']) && !empty($_POST['description'])) 
    	&& (isset($_POST['lieu']) && !empty($_POST['lieu'])) 
    	&& (isset($_POST['prix']) && !empty($_POST['prix'])) 
    	&& (isset($_POST['date']) && !empty($_POST['date']))  
    	&& (isset($_POST['horaire']) && !empty($_POST['horaire'])) 
    	&& (isset($_POST['artiste']) && !empty($_POST['artiste'])) 
    	&& (isset($_POST['style']) && !empty($_POST['style']))
    	&& (isset($_POST['orga']) && !empty($_POST['orga'])) 
    	)
    {	
		
    	


		//---------------------------------------------------------------------------------------------------------------------
		//Divers test sur la photo uploader

		if ($_FILES['photo']['error'] > 0) {
			
			exit("Erreur lors du transfert de l'image");
			
		} else{

			$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
			$extension_upload = strtolower(  substr(  strrchr($_FILES['photo']['name'], '.')  ,1)  );

			if (in_array($extension_upload,$extensions_valides)) {
				
				$aImage_sizes = getimagesize($_FILES['photo']['tmp_name']);
				$maxWidth = 250;
				$maxHeight = 250;

				if ($aImage_sizes[0] = $maxWidth AND $aImage_sizes[1] = $maxHeight) {
					
					$zebla = md5(uniqid(rand(), true));
					$nom = "images/event/{$zebla}.{$extension_upload}";
					$resultat = move_uploaded_file($_FILES['photo']['tmp_name'],$nom);
					
					//Upload sur le serveur et insert du lien dans la table photo

					if ($resultat) {
						
						//---------------------------------------------------------------------------------------------------------------------
						//Creation de l'evenement

						$sql = 'INSERT INTO t_evenement VALUES("", "' . mysql_real_escape_string($_POST["lieu"]) . '",
									"' . mysql_real_escape_string($_POST["libelle"]) . '",
									"' . mysql_real_escape_string($_POST["description"]) . '",
									"' . mysql_real_escape_string($_POST["prix"]) . '",
									"' . mysql_real_escape_string($_POST["horaire"]) . '",
									"' . mysql_real_escape_string($_POST["date"]) . '
									")';
						mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());

						//---------------------------------------------------------------------------------------------------------------------
						//Creation de la gallerie en lien avec l'event

						$sql = 'SELECT EVENEMENT_ID FROM t_evenement ORDER BY EVENEMENT_ID DESC LIMIT 1';
						$req = mysql_query($sql, $link) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());

						$donnees = mysql_fetch_array($req);
						$lastId = $donnees['EVENEMENT_ID'];
						
						$sql = 'INSERT INTO t_gallerie VALUES("", 
									"' . $lastId . '",
									"Gallerie :' . mysql_real_escape_string($_POST["libelle"]) . '
									")';
						mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());

						//---------------------------------------------------------------------------------------------------------------------
						//Upload sur le serveur et insert du lien dans la table photo

						$sql = 'SELECT GALLERIE_ID, t_evenement.EVENEMENT_ID FROM t_evenement, t_gallerie ORDER BY t_evenement.EVENEMENT_ID, GALLERIE_ID  DESC LIMIT 1';
						$req = mysql_query($sql, $link) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());

						$aDonnees = mysql_fetch_array($req);

						$sql = 'INSERT INTO t_photo VALUES("", "' . $lastId . '",
						"' . $aDonnees["GALLERIE_ID"] . '",
						"cover",
						"' . $nom . '
						")';
						mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());

					} else {
						exit("Transfert de l'image échouée.");
					}

				} else {
					exit("La taille de l'image doit être égal à 250*250px.");
				}
			} else { 
				exit("L'extention de l'image n'est pas conforme");
			}

		}
		
		//---------------------------------------------------------------------------------------------------------------------
		//Insert des styles de musique de l'event dans la table associer

		$aSelectedValuesS = $_POST['style'];
		
		foreach($aSelectedValuesS as $selectValue){
		
			$sql = 'INSERT INTO associer VALUES("' . $selectValue . '", 
						"' . $lastId . '
						")';
			mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());

		}

		//---------------------------------------------------------------------------------------------------------------------
		//Insert des artistes dans la table se_produire

		$aSelectedValuesA = $_POST['artiste'];
		
		foreach($aSelectedValuesA as $selectValue){
		
			$sql = 'INSERT INTO se_produire VALUES("' . $selectValue . '", 
						"' . $lastId . '
						")';
			mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());

		}
		
		//---------------------------------------------------------------------------------------------------------------------
		//Insert des liens !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
		//A FAIIIREEEEEEE !!!

		//---------------------------------------------------------------------------------------------------------------------
		//Insert de l organisateur dans la table organiser 
		
		$sql = 'INSERT INTO organiser VALUES( 
					"' . $lastId . '", 
					"' . $_POST['orga'] . '")';
		mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());


		header('Location: index.php');

    } else {
        exit('Veuillez remplir tous les champs obligatoires.');
    }
}
?>

	<h1>Ajout d'un événement</h1>
	<?php include("include/search.php");?>
	<br />
	<div class="post">
		<form action="#" method="post" enctype="multipart/form-data">
			<fieldset>
			<legend>Evénement :</legend><br />
				
				<label for="libelle">Libellé de l'événement : </label>
				<input type="text" name="libelle" value="<?php if (isset($_POST['libelle'])) echo htmlentities(trim($_POST['libelle'])); ?>">*<br />				
				
				<label for="photo">Photo de l'événement : </label>
				<input type="file" name="photo" accept="image/*">*<br />	

				<label for="description">Description : </label>
				<textarea type="text" name="description"><?php if (isset($_POST['description'])) echo htmlentities(trim($_POST['description'])); ?></textarea>*<br />
				
				<label for="section">Lieu :</label>				
				<select name="lieu">
					
					<option></option>
					<?php
						$sql = 'SELECT * FROM t_lieu';
						$req = mysql_query($sql, $link) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());

						while ($lieu = mysql_fetch_array($req)) {
							echo "<option value='" .$lieu['LIEU_ID']. "'>" .$lieu['LIEU_Libelle']. "</option>";
						}
					?>
				
				</select>*<a href="ajoutLieu.php" ><img src="./images/add_icon.jpg"></a><br />

				<label for="section">Artiste lié :</label>				
				<select multiple name="artiste[]">
					
					<option></option>
					<?php
						$sql = 'SELECT PERSONNE_ID, PERSONNE_Nom FROM t_artiste';
						$req = mysql_query($sql, $link) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());

						while ($artiste = mysql_fetch_array($req)) {
							echo "<option value='" .$artiste['PERSONNE_ID']. "'>" .$artiste['PERSONNE_Nom']. "</option>";
						}
					?>
				
				</select>*<a href="inscription.php" ><img src="./images/add_icon.jpg"></a><br />

				<label for="orga" >Organisateur : </label>
				<input type="text" name="orgaV" value="<?php if(($_SESSION['user'])) echo htmlentities(trim($_SESSION['user']->getPersonneNom())); ?>">*<br />
				<input type="hidden" name="orga" value="<?php if($_SESSION['user']) echo htmlentities(trim($_SESSION['user']->getPersonneID())); ?>"><br />

				<label for="prix" >Prix : </label>
				<input type="text" name="prix" value="<?php if (isset($_POST['prix'])) echo htmlentities(trim($_POST['prix'])); ?>">*<br />
				
				<label for="date">Date : </label>
				<input type="date" name="date" value="<?php if (isset($_POST['date'])) echo htmlentities(trim($_POST['date'])); ?>">*<br />

				<label for="horaire">Horaire : </label>
				<input type="text" name="horaire" value="<?php if (isset($_POST['horaire'])) echo htmlentities(trim($_POST['horaire'])); ?>">*<br />

				<label for="section">Type de musique : </label>
				<select multiple name="style[]">
					
					<option></option>
					<?php
						$sql = 'SELECT STYLE_ID, STYLE_Libelle FROM t_style';
						$req = mysql_query($sql, $link) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());

						while ($style = mysql_fetch_array($req)) {
							echo "<option value='" .$style['STYLE_ID']. "'>" .$style['STYLE_Libelle']. "</option>";
						}
					?>
				
				</select>*<a href="ajoutStyle.php" ><img src="./images/add_icon.jpg"></a><br />

				<input type="submit" id="submitmarg" name="evenement" value="Ajouter">
			</fieldset>
		</form>
	</div>
	
<?php include("include/footer.php");?>

