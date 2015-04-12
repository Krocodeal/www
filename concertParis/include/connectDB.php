<?php

function connectDB(){

	$mysql_host = "localhost";
	$mysql_database = "concert_paris";
	$mysql_user = "root";
	$mysql_password = "";

	// connection � la DB
	$link = mysql_connect($mysql_host, $mysql_user, $mysql_password) or die('Erreur : ' . mysql_error());
	mysql_select_db($mysql_database) or die('Erreur :' . mysql_error());
	
	return $link;
}
