<?php   

require_once('header.php');
require_once('connection.inc.php');
if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0)
{
    echo "<script>window.location.href='login.php'</script>";
}
$total_cart1=0;
$total_cart=0;
$shipping=10;
// foreach($_SESSION['cart'] as $key=>$val)
// {
 
//    $sql="SELECT * FROM products Where p_id='$key'";
//    $res=mysqli_query($conn,$sql);
//    $count=mysqli_num_rows($res);
//    $row=mysqli_fetch_assoc($res);
//    $pname=$row['p_name'];
   
//    $price=$row['price'];
 
//    $qty=$val['qty'];
//    $total=$qty*$price;
//    $total_cart1=$total+$total_cart1;
  
// }
foreach($_SESSION['cart'] as $key=>$val)
{

    $sql="SELECT * FROM products Where p_id='$key'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);
    $price=$row['price'];
    $qty=$val['qty'];
    $total=$qty*$price;
    $total_cart1=$total+$total_cart1;
   
 }


if(isset($_POST['submit']))
{    
  



    $name=mysqli_real_escape_string($conn,$_POST['fname']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $phone=mysqli_real_escape_string($conn,$_POST['phone']);
    $address=mysqli_real_escape_string($conn,$_POST['address']);
    $city=mysqli_real_escape_string($conn,$_POST['city']);
    $zipcode=mysqli_real_escape_string($conn,$_POST['zip']);
    $payment_type=mysqli_real_escape_string($conn,$_POST['payment']);
    $total_price=$total_cart1;
 
    $user_id=$_SESSION['user_id'];
    $payment_status="pending";
    if($payment_type=='paypal' || $payment_type=='banktransfer' || $payment_type=='directcheck' )
    {
        $payment_status="success";
    }
    $order_status='1';
    $added_on=date('Y-m-d h:i:s');
    $sql_query="INSERT INTO `order`(user_id,name,email,Phone,address,city,pincode,payment_type,total_price,payment_status,order_status,added_on)
     VALUES('$user_id','$name','$email','$phone','$address','$city','$zipcode','$payment_type','$total_price','$payment_status','$order_status',' $added_on')";
     $res=mysqli_query($conn,$sql_query);
     $order_id=mysqli_insert_id($conn);

    //  order_details
     foreach($_SESSION['cart'] as $key=>$val)
        {
        
        $sql="SELECT * FROM products Where p_id='$key'";
        $res=mysqli_query($conn,$sql);
        $price=$row['price'];$qty=$val['qty'];
        $total=$qty*$price;
        $total_cart1=$total+$total_cart1;
        

        $sql_det="INSERT INTO order_details(order_id,product_id,qty,price)
        VALUES('$order_id','$key','$qty','$price')";
        mysqli_query($conn,$sql_det);

        }


        unset($_SESSION['cart']);
        echo "<script>window.location.href='thankyou.php'</script>";
        
    
}

?>


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="#">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <form action="" method='post'>
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" placeholder="John" name="fname">
                        </div>
                        <!-- <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" placeholder="Doe">
                        </div> -->
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="email" placeholder="example@email.com" name="email">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="tel" placeholder="+123 456 789" name="phone">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line </label>
                            <input class="form-control" type="text" placeholder="123 Street" name="address">
                        </div>
                        <!-- <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input class="form-control" type="text" placeholder="123 Street">
                        </div> -->
                        <!-- <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select">
                                <option selected>United States</option>
                                <option>Afghanistan</option>
                                <option>Albania</option>
                                <option>Algeria</option>
                            </select>
                        </div> -->
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" placeholder="New York" name="city">
                        </div>
                        
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" type="text" placeholder="123" name="zip">
                        </div>
                       
                       
                    </div>
                </div>
                <!-- <div class="collapse mb-4" id="shipping-address">
                    <h4 class="font-weight-semi-bold mb-4">Shipping Address</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" placeholder="John">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" placeholder="Doe">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" placeholder="+123 456 789">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input class="form-control" type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select">
                                <option selected>United States</option>
                                <option>Afghanistan</option>
                                <option>Albania</option>
                                <option>Algeria</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" placeholder="New York">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control" type="text" placeholder="New York">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" type="text" placeholder="123">
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products</h5>
                        <?php 
                      
                        foreach($_SESSION['cart'] as $key=>$val)
{
 
   $sql="SELECT * FROM products Where p_id='$key'";
   $res=mysqli_query($conn,$sql);
   $count=mysqli_num_rows($res);
   $row=mysqli_fetch_assoc($res);
   $pname=$row['p_name'];
   
   $price=$row['price'];
 
   $qty=$val['qty'];
   $total=$qty*$price;
   $total_cart=$total+$total_cart;

   
  
 ?>
                        <div class="d-flex justify-content-between">
                            <p><?php echo $pname ?></p>
                            <p><?php echo $price;  ?></p>
                          
                        </div>
                     

                        <?php    } ?>
                        <hr class="mt-0">
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
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal" value="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck" value="directcheck">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer" value="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3" name="submit">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- Checkout End -->


<?php  

require_once('footer.php');

?>