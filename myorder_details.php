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
            <h1 class="font-weight-semi-bold text-uppercase mb-3"> Orders Details</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="#">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Orders Details</p>
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
                       $sql="SELECT distinct(order_details.id),order_details.*,products.p_name,products.image from order_details,products,`order` WHERE order_details.order_id='$id' And `order`.user_id='$uid' And order_details.product_id=products.p_id";
                        $res=mysqli_query($conn,$sql) or die('error');
                        if(mysqli_num_rows($res))
                        {   $totalprice=0;
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $totalprice=$totalprice+($row['qty'])*($row['price']);
                         ?>
                       
                        <tr>
                        <td class="align-middle"><?php echo $row['p_name'] ?></td>
                            <td class="align-middle"> <img class="img-fluid order_details" src="admin/upload/<?php echo $row['image']; ?>" alt=""></td>
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
            </div>

        </div>
    </div>
    <!-- Cart End -->

<?php  

require_once('footer.php');

?>