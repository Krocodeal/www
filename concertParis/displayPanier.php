<?php
/**
 * Created by PhpStorm.
 * User: Rémi KOCI
 * Date: 11/04/2015
 * Time: 18:45
 */
include("include/header.php");
if ($_SESSION['user']->getPersonneTypeUser()!="utilisateur" ) {
    header('Location: index.php');
}
if ( isset ( $_GET['action'] ) && $_GET['action'] == 'retraitPanier' && isset ( $_GET['E_ID']) && $_SESSION['user']->getPersonneTypeUser()=="utilisateur" ) {
    $_SESSION['panier']->removePanierByConcertID($_GET['E_ID']);
    header('Location: displayPanier.php');
}
?>

<h1>Panier</h1>
<?php include("include/search.php");?>
<br />
<div class="post">
        <?php
            if($_SESSION['panier']->getPanierTaille()==0)
                echo 'Vous n\'avez aucun produit dans votre panier.';
            else{
                echo'<p>Voici votre panier : </p>';
                $listeConcert = $_SESSION['panier']->getPanierListeConcert();
                echo '<form action="confirmation.php" method="post">';
                $prixTotal = 0;
                for ($i = 0; $i < $_SESSION['panier']->getPanierTaille(); $i++){
                    $concert=$listeConcert[$i];
                    echo "<table style='border:1px solid black;width:100%;'>";
                    echo "<tr><td>";
                    echo "<a target='_blank' href='evenement.php?E_ID=" . $concert->getConcertID() . "'>
							<table>
								<tr><td ROWSPAN = 5 style='width:140px;'><img style='width:140px;' src='" . $concert->getConcertPhoto() . "' alt='" . $concert->getConcertLibelle() . "' ></td><td>
								<tr><td>" . $concert->getConcertLibelle() . "</td></tr>
								<tr><td>" . $concert->getConcertLieuLibelle() . " - " . $concert->getConcertLieuVille() . " (" . $concert->getConcertLieuCodepostal() . ")</td></tr>
								<tr><td>" . $concert->getConcertDate() . " à " . $concert->getConcertHoraire() . "</td></tr>
								<tr><td>";
                                if($concert->getConcertPrix()>0) echo $concert->getConcertPrix() . " euros";
                                else echo "Gratuit";
                                echo "</td></tr></table></a>";
                    echo '<td><a href="?action=retraitPanier&E_ID='. $concert->getConcertID() . '"><input name="Supprimer" value="Supprimer" style="float:right; " id="remove-from-cart"></a></td></tr>';
                    echo "</td></table>";
                    $prixTotal += (int) $concert->getConcertPrix();
                }
                echo'<h3>Total</h3>';
                if($prixTotal>0) echo $prixTotal . " euros";
                else echo "Gratuit";
                $_SESSION['panier']->setPanierTotal($prixTotal);
                echo '<br /><input name="Commander" style="float:right;" value="Commander" type="submit" id="submit" /><br />';
                echo '<br/></form>';
            }
        ?>
    <br />
<?php include("include/footer.php");?>