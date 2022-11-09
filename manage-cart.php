<?php
require_once('connection.inc.php');
require_once('add-to-cart.php');


$pid=mysqli_real_escape_string($conn,$_POST['pid']);
$qty=mysqli_real_escape_string($conn,$_POST['qty']);
$type=mysqli_real_escape_string($conn,$_POST['type']);

$obj=new Cart();

if($type=='add')
{
$obj->addproduct($pid,$qty);
}

if($type=='remove')
{
$obj->removeproduct($pid);
}

if($type=='update')
{
$obj->updateproduct($pid,$qty);
}
echo $obj->totalproduct();



?>