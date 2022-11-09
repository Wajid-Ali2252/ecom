<?php
require_once('include/connection.inc.php');
require_once('include/function.inc.php');
require_once('include/header.php');

// $sql="SELECT * FROM users";
// $res=mysqli_query($conn,$sql);

?>




<?php
require_once('include/sidebar.php');
?>


      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Order Master
            <!-- <small>preview of simple tables</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Simple</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12 col-md-12">
              <div class="box">
                
                <div class="box-body table-responsive no-padding">
                <table class="table table-bordered text-center mb-0 cart">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Order ID</th>
                            <th>Order Date</th>
                            <th>Address</th>
                            <th>Payment Type</th>
                            <th>Payment Status</th>
                            <th>Order Status</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php 
                        $uid=$_SESSION['user_id'];
                       $sql="SELECT `order`.*,order_status.name as order_status_str from `order`,order_status  WHERE user_id='$uid' and order_status.id=`order`.order_status";
                        $res=mysqli_query($conn,$sql);
                        if(mysqli_num_rows($res))
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {

                         ?>
                       
                        <tr>
                        <td class="align-middle"><a href="order_master_detail.php?id=<?php echo $row['id']; ?>"><button class="btn btn-primary px-3"><?php echo $row['id']; ?> </button></a></td>
                            <td class="align-middle"><?php echo  $row['added_on']; ?></td>
                            <td class="align-middle"><?php echo $row['address'];$row['city']; $row['pincode']; ?></td>
                            <td class="align-middle"><?php echo$row['payment_type'];  ?></td>
                            <td class="align-middle"><?php echo $row['payment_status']; ?></td>
                            <td class="align-middle"><?php echo $row['order_status_str']; ?></td>
                          
                        </tr>
                        <?php  
                            }
                        }
                    
                        ?>
                      
                    </tbody>
                </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    
<?php

require_once('include/footer.php');

?>