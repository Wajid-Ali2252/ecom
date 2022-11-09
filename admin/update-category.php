<?php
require_once('include/connection.inc.php');
require_once('include/function.inc.php');
require_once('include/header.php');

if(isset($_POST['submit']))
{
 $id=$_GET['id'];
 $cat=get_safe_value($conn,$_POST['cat']);
 $sql="UPDATE catagory SET cat_name='$cat' WHERE cat_id='$id' ";
 mysqli_query($conn,$sql);
 echo "<script>window.location.href='category.php'</script>";
}

$cid=$_GET['id'];
$sql1="SELECT * FROM catagory WHERE cat_id='$cid'";
$res=mysqli_query($conn,$sql1);

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
                  <h3 class="box-title">Update Category</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post">
                  <div class="box-body">
                  <?php         
                   if(mysqli_num_rows($res)>0)
                   {
                    while($row=mysqli_fetch_assoc($res))
                    {

                   
                   ?>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $row['cat_name'];?>" placeholder="Enter Category Name" name="cat" required>
                      <input type="submit" class="btn btn-primary cat_btn" name="submit">
                    </div>
                    <?php 
                     }
                    } 
                    ?>
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