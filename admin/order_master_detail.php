<?php
require_once('include/connection.inc.php');
require_once('include/function.inc.php');
require_once('include/header.php');

// $sql="SELECT * FROM users";
// $res=mysqli_query($conn,$sql);

$order_id=$_GET['id'];
?>



<?php
require_once('include/sidebar.php');
?>


      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Order Detail
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
                            <th>Product name</th>
                            <th>Product Image</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total</th>
                            
                        </tr>
                    </thead>
                    <!-- SELECT order_details.order_id,order_details.product_id,order_details.qty,order_details.price,products.p_name,products.image from order_details
                        LEFT JOIN products 
                        on order_details.order_id=products.p_id -->
                    <tbody class="align-middle">
                        <?php 
                        $id=$_GET['id'];
                        $uid=$_SESSION['user_id'];
                       $sql="SELECT distinct(order_details.id),order_details.*,products.p_name,products.image,`order`.address,`order`.city,`order`.pincode from order_details,products,`order` WHERE order_details.order_id='$id' And `order`.user_id='$uid' And order_details.product_id=products.p_id";
                        $res=mysqli_query($conn,$sql) or die('error');
                        if(mysqli_num_rows($res))
                        {
                          $totalprice=0;
                            while($row=mysqli_fetch_assoc($res))
                            {
                              $totalprice=$totalprice+($row['qty'])*($row['price']);

                              $address=$row['address'];
                              $city=$row['city'];
                              $pincode=$row['pincode'];

                         ?>
                       
                        <tr>
                        <td class="align-middle"><?php echo $row['p_name'] ?></td>
                            <td class="align-middle"> <img class="img-fluid order_details" src="upload/<?php echo $row['image']; ?>" alt=""></td>
                            <td class="align-middle"><?php echo $row['qty']; ?></td>
                            <td class="align-middle"><?php echo$row['price'];  ?></td>
                            <td class="align-middle"><?php echo $row['qty']* $row['price']; ?></td>
                     
                          
                        </tr>
                        <?php  
                            }
                        }
                    
                        ?>
                         <tr>
                            <td colspan="3"></td>
                          
                            <td class="align-middle">Total</td>
                            <td class="align-middle"><?php echo $totalprice;  ?></td>
                        
                        </tr>
                        
                    </tbody>
                </table>
                <strong>Address:</strong>
                <?php echo $address .", ".$city.", ".$pincode ?><br>
                <strong>Order Status:</strong>

                <?php
                $sql="select order_status.name from order_status,`order` where `order`.id='$order_id' and `order`.order_status=order_status.id";
                 $res=mysqli_query($conn,$sql) or die('eroro');
                 if(mysqli_num_rows($res) > 0)
                 {
                   while($data=mysqli_fetch_assoc($res))
                   {
                     $order_status_name=$data['name'];
                     echo $order_status_name;
                   }
                   
                 }

                ?>
                 <div class="form-group">
                    <label for="Category">Category </label><br>
                     <?php  
                     $sql="SELECT * FROM catagory";
                     $query=mysqli_query($conn,$sql);

                     
                     ?>
                    <select class="form-select form-select-sm form-control" name="category"  aria-label=".form-select-sm example">
                      <?php
                      if(mysqli_num_rows($query) > 0)
                      {
                        while($res=mysqli_fetch_assoc($query))
                        {
                      
                      ?>
                        <!-- <option selected>Category</option> -->
                        <option value="<?php echo $res['cat_id'] ?>"><?php echo $res['cat_name'];  ?></option>
                        
                      <?php
                          }
                      }
                      ?>
                        </select>
                    </div>
              
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    
<?php

require_once('include/footer.php');

?>