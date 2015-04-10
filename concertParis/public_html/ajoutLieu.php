<?php 
include("include/header.php");

$link = connectDB();

/////////INSCRIPTION
// on teste si le visiteur a soumis le formulaire
if (isset($_POST['lieu']) && $_POST['lieu'] == 'Ajouter') {
    // on teste l'existence de nos variables. On teste également si elles ne sont pas vides
    if ((isset($_POST['libelle']) && !empty($_POST['libelle'])) && (isset($_POST['adresse']) && !empty($_POST['adresse'])) && (isset($_POST['ville']) && !empty($_POST['ville'])) && (isset($_POST['cp']) && !empty($_POST['cp']))) {
      
        $sql = 'INSERT INTO t_lieu VALUES("", "' . mysql_real_escape_string($_POST['libelle']) . '",
					"' . mysql_real_escape_string($_POST['adresse']) . '", "' . mysql_real_escape_string($_POST['ville']) . '",
					"' . mysql_real_escape_string($_POST['cp']) . '")';
		mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());

		header('Location: ajoutEvent.php');

    } else {
        $erreur = 'Veuillez remplir tous les champs obligatoires.';
    }
}
?>

	<h1>Ajout d'un lieu</h1>
	<?php include("include/search.php");?>
	<br />
	<div class="post">
		<form action="#" method="post">
			<fieldset>
			<legend>Lieu :</legend><br />
				
				<label for="libelle">Libellé du lieu : </label>
				<input type="text" name="libelle" value="<?php if (isset($_POST['libelle'])) echo htmlentities(trim($_POST['libelle'])); ?>">*<br />				
				
				<label for="adresse">Adresse : </label>
				<input type="text" name="adresse" value="<?php if (isset($_POST['adresse'])) echo htmlentities(trim($_POST['adresse'])); ?>">*<br />
				
				<label for="ville" >Ville : </label>
				<input type="text" name="ville" value="<?php if (isset($_POST['ville'])) echo htmlentities(trim($_POST['ville'])); ?>">*<br />

				<label for="cp">Code Postal : </label>
				<input type="text" name="cp" value="<?php if (isset($_POST['cp'])) echo htmlentities(trim($_POST['cp'])); ?>">*<br />

				<input type="submit" id="submitmarg" name="lieu" value="Ajouter">
			</fieldset>
		</form>
	</div>
	
<?php include("include/footer.php");?>

