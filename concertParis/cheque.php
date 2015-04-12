<?php
/**
 * Created by PhpStorm.
 * User: Rémi KOCI
 * Date: 12/04/2015
 * Time: 17:34
 */
include("include/header.php");

if (!(isset ($_POST['Commander']) && $_SESSION['panier']->getPanierTaille() == 0) && $_SESSION['user']->getPersonneTypeUser() != "utilisateur") {
    header('Location: denied.php');
}
?>

    <h1>Paiement par chèque</h1>
    <form action="merci.php" method="post">
        <p>
            Vous avez choisi de régler par chèque.
            <br/><br/>
            Voici un bref récapitulatif de votre commande :
        </p>

        <p style="margin-top:20px;">- Le montant total de votre commande s'élève
            à <?php echo $_SESSION['panier']->getPanierTotal() ?> € TTC</p>

        <p>
            L'ordre et l'adresse du chèque seront affichés sur la page suivante.
            <br/><br/>
            <b>Veuillez confirmer votre commande en cliquant sur &quot;Je confirme ma commande&quot;.</b>
        </p>

        <p>
            <input type="submit" name="submit" value="Je confirme ma commande" id="submit"/>
        </p>
    </form>
    <br/>
<?php include("include/footer.php"); ?>