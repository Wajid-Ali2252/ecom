<?php
require_once('include/connection.inc.php');
require_once('include/function.inc.php');
require_once('include/header.php');

$sql="SELECT * FROM contact";
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
            Contact Us Leads
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
                  <table class="table table-hover">
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile No</th>
                      <th>Query</th>
                      <th>Date</th>
                      <th>Delete</th>
                    </tr>
                    <?php
                    if(mysqli_num_rows($res)> 0)
                    {

                    
                    while($row=mysqli_fetch_assoc($res))
                    {

                    


                    ?>
                    <tr>
                      <td><?php echo $row['id'];  ?></td>
                      <td><?php echo $row['name'];?></td>
                      <td><?php echo $row['email'];?></td>
                      <td><?php echo $row['phone'];?></td>
                      <td><?php echo $row['query'];?></td>
                      <td><?php echo $row['added_on']; ?></td>
                      <td><a href="delete-contact.php?id=<?php  echo $row['id']; ?>"><i class="fa fa-trash"></i></td>
                    </tr>
                    <?php
                    }
                  }
                    ?>
                 
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