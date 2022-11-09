<?php
require_once('include/connection.inc.php');
$id=$_GET['id'];
$sql="DELETE FROM contact WHERE id='$id'";
mysqli_query($conn,$sql);
header('location:contact-us.php');







?>