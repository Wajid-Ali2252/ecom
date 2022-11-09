<?php  

require_once('header.php');
// require_once('add-to-cart.php');

if(!isset($_SESSION['user_id']))
{
    echo "<script>window.location.href='index.php'</script>";
}

?>


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">My Orders</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="#">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">My Orders</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5 ">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
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
                        $res=mysqli_query($conn,$sql) or die('error');
                        if(mysqli_num_rows($res) > 0)
                        {
                        
                            while($row=mysqli_fetch_assoc($res))
                            {
                            
                         ?>
                       
                        <tr>
                        <td class="align-middle"><a href="myorder_details.php?id=<?php echo $row['id']; ?>"><button class="btn btn-primary px-3"><?php echo $row['id']; ?> </button></a></td>
                            <td class="align-middle"><?php echo  $row['added_on']; ?></td>
                            <td class="align-middle"><?php echo $row['address'];$row['city']; $row['pincode']; ?></td>
                            <td class="align-middle"><?php echo $row['payment_type'];  ?></td>
                            <td class="align-middle"><?php echo $row['payment_status']; ?></td>
                            <td class="align-middle"><?php echo $row['order_status_str']; ?></td>
                          
                        </tr>
                        <?php  
                            }
                            
                        }
                      
                        ?>
                        
                    </tbody>
                
                </table>
            </div>

        </div>
    </div>
    <!-- Cart End -->

<?php  

require_once('footer.php');

?>