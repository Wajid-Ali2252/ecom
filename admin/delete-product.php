<?php
require_once('include/connection.inc.php');
$id=$_GET['id'];
echo $id;
$sql="DELETE FROM products WHERE p_id='$id'";
if(mysqli_query($conn,$sql))
{
    echo 1;
}else{
    echo 0;
}


?>