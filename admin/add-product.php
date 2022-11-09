<?php
require_once('include/connection.inc.php');
require_once('include/function.inc.php');
require_once('include/header.php');
$error=array();


if(isset($_POST['submit']))
{
  
  $name=get_safe_value($conn,$_POST['name']);
  $category=get_safe_value($conn,$_POST['category']);
  $mrp=get_safe_value($conn,$_POST['mrp']);
  $price=get_safe_value($conn,$_POST['price']);
  $qty=get_safe_value($conn,$_POST['qty']);
  $short_desc=get_safe_value($conn,$_POST['short_desc']);
  $desc=get_safe_value($conn,$_POST['desc']);
  $meta_title=get_safe_value($conn,$_POST['meta_title']);
  $meta_desc=get_safe_value($conn,$_POST['meta_desc']);
  $keyword=get_safe_value($conn,$_POST['keyword']);
  if(isset($_FILES['file']))
{
  $file_name=$_FILES['file']['name'];
  $file_size=$_FILES['file']['size'];
  $file_tmp=$_FILES['file']['tmp_name'];
  $file_type=$_FILES['file']['type'];
  $tem=explode('.',$file_name);
  $file_ext=end($tem);
  $extension=array('jpeg','jpg','png');
  if(in_array($file_ext,$extension)===false)
  {
      $error[]="This extension file is not allowed, please choose JPG or PNG";
  }
  if(empty($error)==true)
  {
    move_uploaded_file($file_tmp,"upload/".$file_name);
  }
}

 $sql="INSERT INTO products(p_name,category_id,mrp,price,qty,image,short_desc,description,meta_title,meta_desc,meta_keyword,status)
        VALUES('$name','$category','$mrp','$price','$qty','$file_name','$short_desc','$desc','$meta_title','$meta_desc','$keyword','1')";
  $res=mysqli_query($conn,$sql);
  if($res)
  {
   echo "<script>window.location.href='products.php'</script>";
  }

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
            Products
            <small>advanced tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Products</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Add  Product</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <form role=" " method="post" enctype="multipart/form-data">
                  <div class="box-body">
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
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control"  placeholder="Enter Product Name" name="name" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Mrp</label>
                      <input type="text" class="form-control" placeholder="Enter MRP" name="mrp" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Price</label>
                      <input type="text" class="form-control"  placeholder="Enter Price" name="price" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Qty</label>
                      <input type="text" class="form-control" placeholder="Enter Qty" name="qty" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Image</label>
                      <input type="File"  placeholder="Enter Qty" name="file" required>
                    </div>

                     <div class="form-group">
                      <label for="exampleInputEmail1">Short desc</label>
                      <textarea col="10" rows-="10" class="form-control" placeholder="Short Description" name="short_desc" ></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                      <textarea col="10" rows-="10" class="form-control"  placeholder="Description" name="desc" ></textarea>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Meta Title</label>
                      <textarea col="10" rows-="10" class="form-control" placeholder="Meta Title" name="meta_title" ></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Meta desc</label>
                      <textarea col="10" rows-="10" class="form-control"  placeholder="Meta Description" name="meta_desc" ></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Keyword</label>
                      <input type="text" class="form-control"  placeholder="Enter Keyword" name="keyword" >
                    </div>
                    <input type="submit" class="btn btn-primary cat_btn" name="submit">
                  </div><!-- /.box-body -->
                 </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>
  </div><!-- /.content -->









        <?php
require_once('include/footer.php')
?>