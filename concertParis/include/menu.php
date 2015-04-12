<?php
		if (!isset($_SESSION['user'])) {
		echo'<div id="login">
				<form action="#" method="post">
					<label for="pseudo">Email :</label>
					<input type="text" name="loginemail" style="float:left;" tabindex="10" value="'; if (isset($_POST['loginemail'])) echo htmlentities(trim($_POST['loginemail'])); echo'" />
					<input type="button" id="loginconnexion" name="loginconnexion" style="float:left;" value="Connexion" onclick="showpass();">
					<div id="loginpass" style="display:none;">
						<label for="message">Mot de passe :</label>
						<input type="password" style="float:left;" name="loginpass" tabindex="20" value="'; if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass']));  echo'"/>
						<input type="submit" name="connexion" value="Connexion" style="float:right;">
					</div>
					<input type="submit" name="logininscription" value="Inscription" style="float:top;">
				</form><br />';
		}
			if (isset($loginerreur)) echo '<br />',$loginerreur;
		?>			
		</div>
 <br />
   <br />
 <br />
 
 <div id="menu">
       <ul id="sous_menu" style="margin-bottom:12px;"> 
	   <?php
        if (!(isset($_SESSION['user']))) {

            echo "<li><a href='index.php'>Agenda</a></li>";
            echo "<li><a href='inscription.php'>Inscription</a></li>";
        } else {
            if ($_SESSION['user']['PERSONNE_TypeUser'] == 'organisateur')
                echo "<li><a href='ajoutEvent.php'>Espace Organisateur</a></li>";
			else if ($_SESSION['user']['PERSONNE_TypeUser'] == 'artiste')
                echo "<li><a href='artiste.php'>Espace Artiste</a></li>";
			else if ($_SESSION['user']['PERSONNE_TypeUser'] == 'utilisateur')
                echo "<li><a href='utilisateur.php'>Espace Utilisateur</a></li>";
				
            echo "<li><a href='action/deconnexion.php'>Déconnexion</a></li>";
        }
        ?>
		<li><a href="mailto:webmaster.concert@paris.fr">Webmaster</a></li> 
       </ul>
 </div>