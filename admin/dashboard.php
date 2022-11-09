<?php
require_once('include/connection.inc.php');
require_once('include/function.inc.php');
require_once("include/header.php");





?>
 <?php

require_once('include/sidebar.php');


?>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <?php 

                  $sql="SELECT * FROM products WHERE status=1";
                  $query=mysqli_query($conn,$sql);
                  $countproduct=mysqli_num_rows($query);
                  ?>
                  <h3><?php echo $countproduct;?></h3>
                  <p>Total Active Products</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
              
                <div class="inner">
                <?php 
                $sql1="SELECT * FROM catagory where status=1";
                $query1=mysqli_query($conn,$sql1);
                $countcategory=mysqli_num_rows($query1);
                ?>
                  <h3><?php echo $countcategory; ?><sup style="font-size: 20px"></sup></h3>
                  <p>Total Active Categories</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <?php
                $sql3="SELECT * FROM users";
                $query3=mysqli_query($conn,$sql3);
                $countusers=mysqli_num_rows($query3);
                ?>
                  <h3><?php  echo $countusers; ?></h3>
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                <?php
                $sql4="SELECT * FROM contact";
                $query4=mysqli_query($conn,$sql4);
                $countcontacts=mysqli_num_rows($query4);
                ?>
                  <h3><?php echo $countcontacts;  ?></h3>
                  <p>Contact Leads</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
         

        </section><!-- /.content -->
      
    </div><!-- /.content-wrapper -->
<?php
    require_once('include/footer.php');


?>