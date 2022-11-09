<?php
require_once('include/connection.inc.php');
require_once('include/function.inc.php');
require_once('include/header.php');
if(isset($_POST['submit']))
{
 $cat=get_safe_value($conn,$_POST['add_Cat']);
 $sql="INSERT INTO catagory(cat_name,status) VALUES('$cat','1')";
 $res=mysqli_query($conn,$sql);
 echo "<script>window.location.href='category.php'</script>";

}

?>

<?php
require_once('include/sidebar.php');
?>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Category
            <!-- <small>Preview</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <!-- <li class="active">General Elements</li> -->
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add Category</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Name" name="add_Cat" required>
                      <input type="submit" class="btn btn-primary cat_btn" name="submit">
                    </div>
                    
                  </div><!-- /.box-body -->
                 </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
</div>
<?php
require_once('include/footer.php');

?>