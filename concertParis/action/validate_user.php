<?php 
require_once('../include/connectDB.php');
session_start();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!isset($_SESSION['user']) || $_SESSION['user']->getPersonneTypeUser() != 'ADMIN') {
	header('Location: ../index.php');
}

if (!$id) {
	header('Location: ../admin.php');
}

$link = connectDB();
mysql_query(sprintf("UPDATE t_personne SET valid=1 WHERE id = %s", $id));
header('Location: ../admin.php');
