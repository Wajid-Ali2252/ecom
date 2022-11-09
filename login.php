<?php
require_once('header.php');
require_once('connection.inc.php');
$msg="";
$message="";
$thankyou="";

if(isset($_POST['register']))
{
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $phone=mysqli_real_escape_string($conn,$_POST['phone']);
    $pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
    $date=date('Y-m-d');

    $check_mail="SELECT * FROM users WHERE email='$email'";
    $emailres=mysqli_query($conn,$check_mail) or die("Query Failed");
    if(mysqli_num_rows($emailres) >0)
    {
        $msg="Email is Already Exits";
    }
    else{
        $sql="INSERT INTO users(name,password,email,mobile,added_on) VALUES('$name','$pwd','$email','$phone','$date')";
        mysqli_query($conn,$sql) or die('insert Failed');
        echo $thankyou="Thank You For Registration";
    }

}


//  login

if(isset($_POST['login']))
{
    $email_login=mysqli_real_escape_string($conn,$_POST['email_login']);
    $pwd=mysqli_real_escape_string($conn,$_POST['pwd_login']);

    $login_sql="SELECT * FROM users WHERE email='$email_login' AND password='$pwd'";
    $res=mysqli_query($conn,$login_sql);
    if(mysqli_num_rows($res) > 0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            $_SESSION['login_done']="Login SuccessFully";
            $_SESSION['user_id']=$row['id'];
            $_SESSION['email']=$row['email'];
        }
        echo "<script>window.location.href='checkout.php'</script>";
    }
    else{
        $message="Enter The Correct Login";
    }
}


?>



<div class="container-fluid">

    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Login/Register here</span></h2>
        </div>
        <div class="row px-xl-5">
        <div class="col-lg-6 mb-5">
                <div class="contact-form login">
                    <div id="success"></div>
                    <form  id="contactForm1" method="POST">
                        
                        <div class="control-group">
                            <input type="email" class="form-control" id="email" name="email_login" placeholder="Your Email"
                                required autocomplete="off"/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="password" class="form-control" id="password" name="pwd_login" placeholder="Your Name"
                                required autocomplete="off"/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit"  name="login" > Login</button>
                        </div>
                        <div class="login_error help-block text-danger mailmsg"><?php echo $message; ?></div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 mb-5">
                <div class="contact-form register">
                    <div id="success"></div>
                    <form  id="contactForm1" method="POST">
                        <div class="control-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name"
                                required/>
                                <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required />
                            <p class="help-block text-danger mailmsg"> <?php echo $msg; ?></p>
                        </div>
                        <div class="control-group">
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Your Phone"
                                required/>
                                <p class="help-block text-danger"></p>
                            
                        </div>
                        <div class="control-group">
                            <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Your Password"
                                required/>
                                <p class="help-block text-danger"></p>
                             </div>
                       
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit"  name="register" >Register</button>
                        </div>
                        <div class="help-block thkyou_msg"><?php echo $thankyou; ?></div>
                    </form>
                </div>
            </div>
     </div>
</div>


<?php

require_once('footer.php');

?>