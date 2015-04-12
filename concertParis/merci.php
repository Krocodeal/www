<?php
/**
 * Created by PhpStorm.
 * User: Rémi KOCI
 * Date: 12/04/2015
 * Time: 20:12
 */
include("include/header.php");

if (isset ($_SESSION['panier'])){
    $_SESSION['panier'] = new Panier();
    header('Location: merci.php');
}
?>

    <h1>Commande terminée</h1>
        <p>Merci de votre achat.</p>
<?php include("include/footer.php"); ?>