<br /><br />
    </div>
</div>
<?php
if (isset($erreur)) echo '<br />',$erreur;
?>
<br />
 <br />
	<div id="fin"> 
		<p><span style="color:#FB4F4F;margin-right:3px;">Version 2.0</span> | <a href="mailto:webmaster.concert@paris.fr">Contact Webmaster</a> | <a href="#">Haut</a> <?php if (isset($_SESSION['user'])) echo "| <a href='action/deconnexion.php'>Déconnexion</a>"; ?> </p>
	</div> 
</body> 
</html>
