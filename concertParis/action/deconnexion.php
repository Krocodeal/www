<?php
session_start();
require_once('../include/connectDB.php');
unset($_SESSION['user']);
session_unset();
session_destroy();
header('Location: ../index.php');
exit();
?> 

