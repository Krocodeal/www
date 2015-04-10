<?php 
include("include/header.php");

$link = connectDB();

/////////INSCRIPTION
// on teste si le visiteur a soumis le formulaire
if (isset($_POST['style']) && $_POST['style'] == 'Ajouter') {
    // on teste l'existence de nos variables. On teste également si elles ne sont pas vides
    if ((isset($_POST['libelle']) && !empty($_POST['libelle']))) {
      
        $sql = 'INSERT INTO t_style VALUES("", "' . mysql_real_escape_string($_POST['libelle']) . '")';
		mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());

		header('Location: ajoutStyle.php');

    } else {
        $erreur = 'Veuillez remplir le champs obligatoire.';
    }
}
?>

	<h1>Ajout d'un style</h1>
	<?php include("include/search.php");?>
	<br />
	<div class="post">
		<form action="#" method="post">
			<fieldset>
			<legend>Style :</legend><br />
				
				<label for="libelle">Libellé du style : </label>
				<input type="text" name="libelle" value="<?php if (isset($_POST['libelle'])) echo htmlentities(trim($_POST['libelle'])); ?>">*<br />
				<br />
				<input type="submit" id="submitmarg" name="style" value="Ajouter">
			</fieldset>
		</form>
	</div>
	
<?php include("include/footer.php");?>

