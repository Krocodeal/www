<?php

function connectDB(){

	$mysql_host = "localhost";
	$mysql_database = "concertp_erad";
	$mysql_user = "concertp";
	$mysql_password = "966SiY352";

	// connection � la DB
	$link = mysql_connect($mysql_host, $mysql_user, $mysql_password) or die('Erreur : ' . mysql_error());
	mysql_select_db($mysql_database) or die('Erreur :' . mysql_error());
	
	return $link;
}
