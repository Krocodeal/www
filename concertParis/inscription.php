<?php 
include("include/header.php");

$link = connectDB();

/////////INSCRIPTION
// on teste si le visiteur a soumis le formulaire
if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
    // on teste l'existence de nos variables. On teste également si elles ne sont pas vides
    if ((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['type']) && !empty($_POST['type'])) && (isset($_POST['pass']) && !empty($_POST['pass'])) && (isset($_POST['pass_confirm']) && !empty($_POST['pass_confirm'])) && (isset($_POST['pseudo']) && !empty($_POST['pseudo'])) && ((isset($_POST['nomU']) && !empty($_POST['nomU'])) || (isset($_POST['nomA']) && !empty($_POST['nomA'])) || (isset($_POST['nomO']) && !empty($_POST['nomO'])))) {
        // on teste les deux mots de passe
        if ($_POST['pass'] != $_POST['pass_confirm']) {
            $erreur = 'Les 2 mots de passe sont différents.';
        } else {

            // on recherche si l'email est déjà utilisé par un autre membre
            $sql = 'SELECT count(*) FROM t_personne WHERE PERSONNE_Mail="' . mysql_escape_string($_POST['email']) . '"';
            $req = mysql_query($sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
            $data = mysql_fetch_array($req);

            if ($data[0] == 0) {
				
				 // on recherche si l'email est déjà utilisé par un autre membre
				$sql = 'SELECT count(*) FROM t_personne WHERE PERSONNE_Pseudo="' . mysql_escape_string($_POST['pseudo']) . '"';
				$req = mysql_query($sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
				$data = mysql_fetch_array($req);
				
				if($data[0] == 0) {
			
					if(isset($_POST['nomU']) && !empty($_POST['nomU']))	$nom = $_POST['nomU'];
					else if(isset($_POST['nomA']) && !empty($_POST['nomA'])) $nom = $_POST['nomA'];
					else $nom = $_POST['nomO'];
					
					
		
		//----------------------------------------------------------------------------------------------------------------------------------
		//----------------------------------------------------------------------------------------------------------------------------------
		//Photo uploader
		$photo_url="url";
		if ($_FILES['photo']['size']>0) {
			if ($_FILES['photo']['error'] > 0) {
				
				exit("Erreur lors du transfert de l'image");
				
			} else{

			$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
			$extension_upload = strtolower(  substr(  strrchr($_FILES['photo']['name'], '.')  ,1)  );
			var_dump($_FILES['photo']['name']);
			echo($_FILES['photo']['name']);

				if (in_array($extension_upload, $extensions_valides)) {
						
						$aImage_sizes = getimagesize($_FILES['photo']['tmp_name']);
							
							$zebla = md5(uniqid(rand(), true));
							$photo_url = "images/event/{$zebla}.{$extension_upload}";
							move_uploaded_file($_FILES['photo']['tmp_name'],$photo_url);
							
				} else { 
					exit("L'extension de l'image n'est pas conforme");
				}

			}
		}
		//----------------------------------------------------------------------------------------------------------------------------------
		//----------------------------------------------------------------------------------------------------------------------------------
					
					$sql = 'INSERT INTO t_personne VALUES("", "' . mysql_escape_string($_POST['pseudo']) . '",
					"' . mysql_escape_string($nom) . '", "' . mysql_escape_string(md5($_POST['pass'])) . '",
					"' . $_POST['type'] . '", "'.$photo_url.'", "' . mysql_escape_string($_POST['email']) . '", "' . $_POST['telephone'] . '")';
					mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());
					$sql = 'SELECT * FROM t_personne WHERE PERSONNE_ID = "'.mysql_insert_id().'"';
					$result = mysql_query($sql);
					session_start();
					$_SESSION['user'] = mysql_fetch_assoc($result);
					switch($_SESSION['user']['PERSONNE_TypeUser']){
						case "utilisateur":
							$sql = 'INSERT INTO t_utilisateur VALUES('. $_SESSION['user']['PERSONNE_ID'] .', "' . mysql_escape_string($_POST['datedenaissance']) . '",
							"' . mysql_escape_string($_POST['adresse']) . '", "' . mysql_escape_string($_POST['codepostal']) . '",
							"' . $_POST['ville'] . '", "' . mysql_escape_string($_POST['civilite']) . '", "' . $_POST['prenom'] . '", 
							"' . mysql_escape_string($_POST['pseudo']) . '", "' . mysql_escape_string($nom) . '", 
							"' . mysql_escape_string(md5($_POST['pass'])) . '", "' . $_POST['type'] . '", "'.$photo_url.'", 
							"' . mysql_escape_string($_POST['email']) . '", "' . $_POST['telephone'] . '")';
							mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());
						break;
						case "artiste":
							$sql = 'INSERT INTO t_artiste VALUES('. $_SESSION['user']['PERSONNE_ID'] .', "' . ($_POST['pays']) . '",
							"' . ($_POST['age']) . '",
							"' . mysql_escape_string($_POST['description']) . '", 
							"' . mysql_escape_string($_POST['pseudo']) . '", "' . mysql_escape_string($nom) . '", 
							"' . mysql_escape_string(md5($_POST['pass'])) . '", "' . $_POST['type'] . '", "'.$photo_url.'", 
							"' . mysql_escape_string($_POST['email']) . '", "' . $_POST['telephone'] . '")';
							mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());
							$aSelectedValuesS = $_POST['style'];
							foreach($aSelectedValuesS as $selectValue){
								$sql = 'INSERT INTO jouer VALUES("' . $_SESSION['user']['PERSONNE_ID'] . '", 
											"' . $selectValue . '
											")';
								mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());

							}
						break;
						case "organisateur":
							$sql = 'INSERT INTO t_organisation VALUES('. $_SESSION['user']['PERSONNE_ID'] .', "' . $_POST['contact'] . '", "' . mysql_escape_string($_POST['pseudo']) . '",
							"' . mysql_escape_string($nom) . '", "' . mysql_escape_string(md5($_POST['pass'])) . '",
							"' . $_POST['type'] . '", "'.$photo_url.'", "' . mysql_escape_string($_POST['email']) . '", "' . $_POST['telephone'] . '")';
							mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());
						break;
					}
					header('Location: action/deconnexion.php');
					exit();
					}else{
						$erreur = 'Ce pseudo est déjà utilisé.';	
					}
            } else {
                $erreur = 'Un membre possède déjà cette adresse email.';
            }
        }
    } else {
        $erreur = 'Veuillez remplir tous les champs obligatoires.';
    }
}
?>
<script type="text/javascript">
	function showstuff(element){
	    document.getElementById("utilisateur").style.display = element=="utilisateur"?"block":"none";
	    document.getElementById("artiste").style.display = element=="artiste"?"block":"none";
	    document.getElementById("organisateur").style.display = element=="organisateur"?"block":"none";
	}
</script>

	<h1>Inscription</h1>
	<?php include("include/search.php");?>
	<br />
	<div class="post">
		<form action="#" method="post" enctype="multipart/form-data">
			<fieldset>
			<legend>Inscrivez-vous :</legend><br />
				<label for="pseudo">Pseudo : </label>
				<input type="text" name="pseudo" value="<?php if (isset($_POST['pseudo'])) echo htmlentities(trim($_POST['pseudo'])); ?>">*<br />		
				<label for="photo">Photo : </label>
				<input type="file" name="photo" accept="image/*">*<br />	
				<label for="telephone" >Téléphone : </label>
				<input type="text" name="telephone" value="<?php if (isset($_POST['telephone'])) echo htmlentities(trim($_POST['telephone'])); ?>"><br />
				<br/>
				<label for="email">E-mail :</label>
				<input type="text" name="email" value="<?php if (isset($_POST['email'])){echo htmlentities(trim($_POST['email']));} else if (isset($_POST['loginemail'])){ echo htmlentities(trim($_POST['loginemail']));} ?>">*<br />				
				<label for="message">Mot de passe :</label>
				<input type="password" name="pass" id="insc" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>">*<br />
				<label for="message">Confirmation :</label>
				<input type="password" name="pass_confirm" id="insc" value="<?php if (isset($_POST['pass_confirm'])) echo htmlentities(trim($_POST['pass_confirm'])); ?>">*<br />
				<br />
				<label for="section">Type :</label>				
				<select name="type" onchange="showstuff(this.value);">
					<option></option>
					<option value="utilisateur">Utilisateur</option>
					<option value="artiste">Artiste</option>
					<option value="organisateur">Organisateur</option>
				</select>*<br /><br />
				<div id="utilisateur" style="display:none;">
					<label for="prenom">Prénom : </label>
					<input type="text" name="prenom" value="<?php if (isset($_POST['prenom'])) echo htmlentities(trim($_POST['prenom'])); ?>">*<br />
					<label for="nom">Nom : </label>
					<input type="text" name="nomU" value="<?php if (isset($_POST['nomU'])) echo htmlentities(trim($_POST['nomU'])); ?>">*<br />
					<label for="civilite">Civilité : </label>
					<input type="radio" name="civilite" value="<?php if (isset($_POST['civilite'])) echo htmlentities(trim($_POST['civilite'])); ?>">Mr
					<input type="radio" name="civilite" value="<?php if (isset($_POST['civilite'])) echo htmlentities(trim($_POST['civilite'])); ?>">Mme<br /><br />
					<label for="date">Date de Naissance : </label>
					<input type="date" name="datedenaissance" value="<?php if (isset($_POST['date'])) echo htmlentities(trim($_POST['date'])); ?>">*<br />
					<label for="adresse">Adresse : </label>
					<input type="text" name="adresse" value="<?php if (isset($_POST['adresse'])) echo htmlentities(trim($_POST['adresse'])); ?>"><br />
					<label for="codepostal">Code Postal : </label>
					<input type="text" name="code Postal" value="<?php if (isset($_POST['codepostal'])) echo htmlentities(trim($_POST['codepostal'])); ?>"><br />
					<label for="ville">Ville : </label>
					<input type="text" name="ville" value="<?php if (isset($_POST['ville'])) echo htmlentities(trim($_POST['ville'])); ?>"><br />
				</div>
				<div id="artiste" style="display:none;">
					<label for="nom">Nom de scène : </label>
					<input type="text" name="nomA" value="<?php if (isset($_POST['nomA'])) echo htmlentities(trim($_POST['nomA'])); ?>">*<br />
					<label for="age">Age : </label>
					<input type="text" name="age" value="<?php if (isset($_POST['age'])) echo htmlentities(trim($_POST['age'])); ?>"><br />
					<label for="description">Description : </label>
					<input type="text" name="description" value="<?php if (isset($_POST['description'])) echo htmlentities(trim($_POST['description'])); ?>"><br />
					<label for="pays">Pays :</label>		
					<select name="pays">
						<option selected="selected"></option>
						<?php
							$selectid = 'SELECT * FROM t_pays ORDER BY PAYS_Libelle';
							$resultid = mysql_query($selectid) or die('Erreur : ' . mysql_error());
							while ($ligne_pays = mysql_fetch_assoc($resultid)){
								echo'<option value="'. $ligne_pays['PAYS_ID'] .'">'. utf8_encode ($ligne_pays['PAYS_Libelle']) .'</option>';
							}
						?>
					</select>*<br />
					<label for="style">Type de musique : </label>
					<select multiple name="style[]">					
						<option></option>
						<?php
							$sql = 'SELECT STYLE_ID, STYLE_Libelle FROM t_style';
							$req = mysql_query($sql, $link) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());

							while ($style = mysql_fetch_array($req)) {
								echo "<option value='" .$style['STYLE_ID']. "'>" .$style['STYLE_Libelle']. "</option>";
							}
						?>
					</select>*<a href="ajoutStyle.php" ><img src="http://www.iconshock.com/img_jpg/IMPRESSIONS/general/jpg/16/add_icon.jpg"></a><br />
				</div>
				<div id="organisateur" style="display:none;">
					<label for="nom">Nom de l'Organisation : </label>
					<input type="text" name="nomO" value="<?php if (isset($_POST['nomO'])) echo htmlentities(trim($_POST['nomO'])); ?>">*<br />
					<label for="contact">Nom du Contact : </label>
					<input type="text" name="contact" value="<?php if (isset($_POST['contact'])) echo htmlentities(trim($_POST['contact'])); ?>">*<br />
				</div><br /><br />
				<input type="submit" id="submitmarg" name="inscription" value="Inscription">
			</fieldset>
		</form>
	</div>
	
<?php include("include/footer.php");?>

