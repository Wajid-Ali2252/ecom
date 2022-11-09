<?php
require_once('include/connection.inc.php');
require_once('include/function.inc.php');
require_once('include/header.php');
if(isset($_GET['type']) &&  $_GET['type']!='')
{ 

  $type=get_safe_value($conn,$_GET['type']);
  if($type=='status')
  {
    $operation=get_safe_value($conn,$_GET['operation']);
    $id=$_GET['id'];

    if($operation=="active")
    {
      $status="1";
    }else{
      $status="0";
    }
    
    $update_status="UPDATE catagory SET status='$status' WHERE cat_id='$id'";
    $query=mysqli_query($conn,$update_status) or die('failed');
  }
}
// QUERY CODE
$sql="SELECT * FROM catagory  ORDER BY `catagory`.`cat_id` ASC";
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
            Data Tables
            <small>advanced tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Categories</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">All Category</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th colspan="2">Action</th>
                    
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     if(mysqli_num_rows($res) > 0)
                     {
                       while($row=mysqli_fetch_assoc($res))
                       {
                         $catid=$row['cat_id'];
                      ?>
                      <tr>
                        <td><?php echo $row['cat_id'];  ?></td>
                        <td><?php echo $row['cat_name']; ?></td>
                        <td><?php 
                        if($row['status']==1)
                        {
                          echo " <span class='label label-success statusbtn' data-id={$row['cat_id']}><a href='?type=status&operation=deactive&id=".$row['cat_id']."'>Active</a></span";
                        }else{
                          echo " <span class='label label-warning statusbtn' data-id={$row['cat_id']}> <a href='?type=status&operation=active&id=".$row['cat_id']."'>Deactive</a></span>";
                        }
                          ?></td>
                        
                        <td><a href="update-category.php?id=<?php echo $row['cat_id']; ?>"><i class="fa fa-edit"></i></a></td>
                        <td class="dtcat" data-id=<?php echo $row['cat_id']; ?>><i class="fa fa-trash"></i></td>
                      </tr>
                      
                     <?php
                      }
                    }
                     ?>
                     
                     
                    </tbody>
                  
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
       </div> <!-- /.content-wrapper -->
<?php require_once('include/footer.php'); ?>