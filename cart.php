<?php  

require_once('header.php');
require_once('add-to-cart.php');



?>


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="#">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

<?php 


if(isset($_SESSION['cart'])>=1)
{
   

?>


    <!-- Cart Start -->
    <div class="container-fluid pt-5 ">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0 cart">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php 
                          $total_cart=0;
                          $shipping=10;
                          
                         
                         foreach($_SESSION['cart'] as $key=>$val)
                         {
                          
                            $sql="SELECT * FROM products Where p_id='$key'";
                            $res=mysqli_query($conn,$sql);
                            $count=mysqli_num_rows($res);
                            $row=mysqli_fetch_assoc($res);
                            $pname=$row['p_name'];
                            $mrp=$row['mrp'];
                            $price=$row['price'];
                            $image=$row['image'];
                            $qty=$val['qty'];
                            $total=$qty*$price;
                            $total_cart=$total+$total_cart;
                           
                            
                            
                        ?>
                       
                        <tr>
                        

                            <td class="align-middle"><img src="admin/upload/<?php echo $image; ?>" alt="" style="width: 50px;"><span> <?php echo $pname; ?></span></td>
                            <td class="align-middle"><?php echo $price;  ?></td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center" id="<?php echo $key;?>qty" value="<?php echo (int)$qty; ?>">
                                    
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                    <a href="javasript:void();" onclick="add_to_cart('<?php echo $key ?>','update')">update</a>
                                </div>
                            </td>
                            <td class="align-middle"><?php echo $total; ?></td>
                            <td class="align-middle"><a href="javasript:void();" onclick="add_to_cart('<?php echo $key ?>','remove')"><button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></a></td>
                        </tr>
                        <?php  
                         } 
                  
                        
                    
                        ?>
                      
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <!-- <form class="mb-5" action="#">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form> -->
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium"><?php echo $total_cart;  ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium"><?php echo $shipping ?></h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold"><?php echo $total_amount=$shipping*$total_cart; ?></h5>
                        </div>
                        <a href="login.php"><button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
                        <?php }
                        else{
                            echo "<div class='alert alert-primary' role='alert' style='width:50%;margin:0 auto'>Your Cart is Empty</div>";
                        } ?>
<?php  

require_once('footer.php');

?>