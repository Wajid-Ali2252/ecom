<?php
require_once('include/connection.inc.php');
$id=$_GET['id'];
$sql="DELETE FROM users WHERE id='$id' ";
mysqli_query($conn,$sql);
header('location:users.php');


?>