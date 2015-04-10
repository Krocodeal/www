<?php
require_once('connectDB.php');
function my_autoloader($class) {
    include 'objects/' . $class . '.php';
}
spl_autoload_register('my_autoloader');

				session_start();

if (!empty($_POST)) {
    if (isset($_POST['logininscription'])) {
        header('Location: inscription.php');
    } else if (isset($_POST['connexion'])) {
		
		///////////// CONNEXION
		// on teste si le visiteur a soumis le formulaire de connexion
		if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
			if ((isset($_POST['loginemail']) && !empty($_POST['loginemail'])) && (isset($_POST['loginpass']) && !empty($_POST['loginpass']))) {

				$link = connectDB();

				// on teste si une entrée de la base contient ce couple email / pass
				$sql = 'SELECT * FROM t_personne WHERE PERSONNE_Mail = "' . mysql_real_escape_string($_POST['loginemail']) . '" AND PERSONNE_Mdp = "' . mysql_real_escape_string(md5($_POST['loginpass'])) . '"';
				$req = mysql_query($sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
				$data = mysql_fetch_array($req);


				mysql_free_result($req);
				mysql_close();

				// si on obtient une réponse, alors l'utilisateur est un membre
					if ($_POST['loginemail'] == $data['PERSONNE_Mail']) {
						session_start();
						$_SESSION['user'] = new Personne($data[PERSONNE_ID],$data[PERSONNE_Pseudo], $data[PERSONNE_Nom], $data[PERSONNE_TypeUser],$data[PERSONNE_Photo], $data[PERSONNE_Mail], $data[PERSONNE_Tel]);
						$link = connectDB();
						$req = mysql_query($sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
						$data = mysql_fetch_assoc($req);
					}
					// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son email, soit dans son mot de passe
					else if (!(isset($data['loginemail']))) {

						$loginerreur = 'Adresse e-mail ou mot de passe incorrect.<br/>';
					}
					// sinon, alors la, il y a un gros problème 
					else {
						$loginerreur = 'Erreur critique';
					}
			} else {
				$loginerreur = 'Veuillez remplir tous les champs.<br/>';
			}
		}

    }
}

?>
<script type="text/javascript">
	function showpass(element){
	    document.getElementById("loginpass").style.display = "block";
		document.getElementById("loginconnexion").style.display = "none";
	}
	
	function showsearch(element){
	    document.getElementById("divsearch").style.display = "block";
		document.getElementById("btnsearch").style.display = "none";
	}
</script>

<html>
   <head> 
       <title>Projet</title> 
       <meta charset="utf-8" /> 
       <link rel="stylesheet" media="screen" type="text/css" title="Design" href="configuration.css" />
	   <link rel="shortcut icon" href="images/fav-icon.ico">
         </head> 
   <body> 
 <div id="container">
<header style="display:block;">
	<div id= "titre"><strong>CONCERT PARIS</strong></div>
 </header>
     <div id="login">
 <?php 
		if (!isset($_SESSION['user'])) {
		echo'<form action="#" method="post">
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
 <div id="bloc">
 <div id="menu">
       <ul id="sous_menu" style="margin-bottom:12px;"> 
	   <?php
        echo "<li><a href='index.php'>Agenda</a></li>";
        if (!(isset($_SESSION['user']))) {

            echo "<li><a href='inscription.php'>Inscription</a></li>";
        } else {
            if ($_SESSION['user']->getPersonneTypeUser() == 'organisateur')
                echo "<li><a href='ajoutEvent.php'>Espace Organisateur</a></li>";
			else if ($_SESSION['user']->getPersonneTypeUser() == 'artiste')
                echo "<li><a href='artiste.php'>Espace Artiste</a></li>";
            else
                echo "<li><a href='utilisateur.php'>Espace Utilisateur</a></li>";
				
            echo "<li><a href='action/deconnexion.php'>Déconnexion</a></li>";
        }
        ?>
		<li><a href="mailto:webmaster.concert@paris.fr">Webmaster</a></li> 
       </ul>
 </div>
    <div id="corps">
		
