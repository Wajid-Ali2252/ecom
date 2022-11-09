     <!-- Left side column. contains the logo and sidebar -->
     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p> <?php  echo $_SESSION['username']; ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              <a href="dashboard.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
                <!-- <i class="fa fa-angle-left pull-right"></i> -->
              </a>
    
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Products</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="products.php"><i class="fa fa-circle-o"></i>View Products</a></li>
                <li><a href="add-product.php"><i class="fa fa-circle-o"></i>Add Product</a></li>
                
              </ul>
            </li>
          
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Category</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="category.php"><i class="fa fa-circle-o"></i>View Category</a></li>
                <li><a href="add-category.php"><i class="fa fa-circle-o"></i>Add Category</a></li>

              </ul>
            </li>
            <li class="treeview">
              <a href="order_master.php">
                <i class="fa fa-shopping-cart"></i> <span>Order Master</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <!-- <ul class="treeview-menu">
                <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
              </ul> -->
            </li>
            <li class="treeview">
              <a href="users.php">
                <i class="fa fa-user"></i> <span>User Listing</span>
                <!-- <i class="fa fa-angle-left pull-right"></i> -->
              </a>
              <!-- <ul class="treeview-menu">
                <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
              </ul> -->
            </li>

             <li class="treeview">
              <a href="contact-us.php">
                <i class="fa fa-envelope"></i> <span>Contact Us</span>
                <!-- <i class="fa fa-angle-left pull-right"></i> -->
              </a>
              <!-- <ul class="treeview-menu">
                <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
              </ul> -->
            </li>
           
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Examples</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
              </ul>
            </li>
           
      
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>