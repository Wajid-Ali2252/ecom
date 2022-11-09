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
$id=$_GET['id'];
$sql="UPDATE products SET p_name='$name',category_id='$category',mrp='$mrp',price='$price',qty='$qty',image='$file_name',short_desc='$short_desc',description='$desc',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$keyword' WHERE p_id='$id'"; 
$query=mysqli_query($conn,$sql);
  if($query)
  {
    echo "<script>window.location.href='category.php'</script>";
  }

  
}
$id1=$_GET['id'];
$sql3="SELECT * FROM products LEFT JOIN catagory ON products.category_id=catagory.cat_id WHERE p_id='$id1'";
  $res3=mysqli_query($conn,$sql3);

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
                  <h3 class="box-title">Update Product</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <form role=" " method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <?php
                   if(mysqli_num_rows($res3) > 0)
                   {
                    while($row=mysqli_fetch_assoc($res3))
                    {
                        
                    ?>
                    <div class="form-group">
                    <label for="Category">Category </label><br>
                    <select class="form-select form-select-sm form-control" name="category"    aria-label=".form-select-sm example">
                     <!-- <option selected>Category</option> -->
                    <option value="<?php echo $row['cat_id'] ?>"selected><?php echo $row['cat_name'];  ?></option>
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control"  placeholder="Enter Product Name" name="name" value="<?php echo $row['p_name']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Mrp</label>
                      <input type="text" class="form-control" placeholder="Enter MRP" name="mrp" value="<?php echo $row['mrp'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Price</label>
                      <input type="text" class="form-control"  placeholder="Enter Price" name="price" value="<?php echo $row['price']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Qty</label>
                      <input type="text" class="form-control" placeholder="Enter Qty" name="qty" value="<?php echo $row['qty'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Image</label>
                      <input type="File"  placeholder="Enter Qty" name="file" value="<?php echo $row['image']; ?>">
                    </div>

                     <div class="form-group">
                      <label for="exampleInputEmail1">Short desc</label>
                      <textarea col="10" rows-="10" class="form-control" placeholder="Short Description" name="short_desc" ><?php echo $row['short_desc'];?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                      <textarea col="10" rows-="10" class="form-control"  placeholder="Description" name="desc" ><?php echo $row['description']; ?></textarea>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Meta Title</label>
                      <textarea col="10" rows-="10" class="form-control" placeholder="Meta Title" name="meta_title"><?php echo $row['meta_title'] ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Meta desc</label>
                      <textarea col="10" rows-="10" class="form-control"  placeholder="Meta Description" name="meta_desc"><?php echo $row['meta_desc'];?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Keyword</label>
                      <input type="text" class="form-control"  placeholder="Enter Keyword" name="keyword" value="<?php echo $row['meta_keyword'];?>">
                    </div>
                    <?php 
                  
                }
            }
                    ?>
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