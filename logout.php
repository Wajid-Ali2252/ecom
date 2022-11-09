<?php 
require_once('connection.inc.php');
unset($_SESSION['email']);
session_destroy();
header('location:index.php');


?>