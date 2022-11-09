<?php
require_once('include/connection.inc.php');
require_once('include/function.inc.php');
require_once('include/header.php');
if(isset($_GET['type']) &&  $_GET['type']!='')
{ 

  $type=get_safe_value($conn,$_GET['type']);
  if($type=='status')
  {
    $operation=get_safe_value($conn,$_GET['operation']);
    $id=$_GET['id'];

    if($operation=="active")
    {
      $status="1";
    }else{
      $status="0";
    }
    
    $update_status="UPDATE products SET status='$status' WHERE p_id='$id'";
    $query=mysqli_query($conn,$update_status) or die('failed');
  }
}
$sql="SELECT * FROM products  ORDER BY `products`.`p_id` ASC";
$res=mysqli_query($conn,$sql);


?>









<?php
require_once('include/sidebar.php');
?>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Products
            <small>advanced tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Products</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">All Product</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <!-- <th>Category</th> -->
                        <th>MRP</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Status</th>
                        <th colspan="2">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        if(mysqli_num_rows($res) > 0)
                        {
                          while($row=mysqli_fetch_assoc($res))
                          {
                            
                      ?>
                    <tr>
                        <td><?php echo $row['p_id']; ?></td>
                        <td><img src="upload/<?php  echo $row['image']; ?>" height="100" width="100"></td>
                        <td><?php echo $row['p_name']; ?></td>
                        <!-- <th><?php echo $row['cat_name']; ?></th> -->
                        <td><?php echo $row['mrp']; ?></td>
                        <td><?php echo $row['price'];?></td>
                        <td><?php echo $row['qty']?></td>
                        <td><?php if($row['status']==1)
                        {
                          echo "<span class='label label-success statusbtn'><a href='?type=status&operation=deactive&id=".$row['p_id']."'>Active</a></span";
                        }else{
                          echo "<span class='label label-warning statusbtn'> <a href='?type=status&operation=active&id=".$row['p_id']."'>Deactive</a></span>";
                        }
                          ?></td>
                        <td><a href="update-product.php?id=<?php echo $row['p_id'];?>"><i class="fa fa-edit"></i></a></td>
                        <td class="dtproduct" data-id=<?php echo $row['p_id']; ?>><i class="fa fa-trash"></i></td>
                      </tr>
                     <?php
                        
                      }
                    }
                     ?>
                     
                     
                     
                    </tbody>
                  
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <?php require_once('include/footer.php'); ?>