<?php
/**
 * Created by PhpStorm.
 * User: Rémi KOCI
 * Date: 11/04/2015
 * Time: 21:34
 */
include("include/header.php");

if (!(isset ($_POST['Commander']) && $_SESSION['panier']->getPanierTaille()==0) && $_SESSION['user']->getPersonneTypeUser()!="utilisateur" ) {
    header('Location: denied.php');
}
?>

    <h1>Confirmation d'achat</h1>
    <br />
    <div class="post">
<?php
    echo'<p>Merci de vérifer vos adresses et de confirmer votre achat : </p>';
    echo '<form action="cheque.php" method="post">';
    echo'<label for="livraison">Adresse de livraison : </label>';
    echo'<textarea style="color:black" cols="60" rows="3" name="livraison">'. $_SESSION['user']->getUtilisateurAdresse() .' '. $_SESSION['user']->getUtilisateurCp() .' '. $_SESSION['user']->getUtilisateurVille() .'</textarea>';
    echo '<br /><br />';
    echo'<label for="facturation">Adresse de facturation : </label>';
    echo'<textarea style="color:black" cols="60" rows="3" name="facturation">'. $_SESSION['user']->getUtilisateurAdresse() .' '. $_SESSION['user']->getUtilisateurCp() .' '. $_SESSION['user']->getUtilisateurVille() .'</textarea>';
    echo '<br /><br />';
    echo'<h3>Conditions générales de ventes : </h3>';
    echo'<input type="checkbox" name="cgv" value="1">Vous devez accepter les conditions générales de vente pour passer à l\'étape suivante ';
    echo'<a href="./files/cgv.doc" target="_blank">(lire)</a>';
    echo '<br /><br /><input name="Poursuivre" style="float:right;" value="Poursuivre" type="submit" id="submit" /><br />';
    echo '<br /></form>';

?>
    <br />
<?php include("include/footer.php");?>