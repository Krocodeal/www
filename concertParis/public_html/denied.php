<?php include("include/header.php"); ?>
<h1>Accès refusé !</h1>
<br />
<?php
if (isset($erreur))
    echo '<br /><br />', $erreur;
?>
<p>
    ACCES REFUSE (INFORMATIONS ERRONEES)
</p>
<?php include("include/footer.php"); ?></html>