<style>
.sidebar-menu {
    background-color: #000000;
}
</style>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">

        </div>
        <!-- search form -->
        <!--
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
           <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </form>
	  -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php 
      if($_SESSION['adminType']=='admin'){
    ?>
        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Home</span></a></li>
            <li><a href="change-banner.php"><i class="fa fa-cart-plus"></i> Change Home Page Banner 1</a></li>
            <li><a href="sales-addnp.php"><i class="fa fa-cart-plus"></i> Sales no Print</a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cubes"></i>
                    <span>Product</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="product-add.php"><i class="fa fa-plus-circle"></i> Add New Product</a></li>
                    <li><a href="product-list.php"><i class="fa fa-list"></i> Product List</a></li>
                    <li><a href="product-category.php"><i class="fa fa-newspaper-o"></i> Product Category</a></li>
                    <li><a href="product-category-add.php"><i class="fa fa-plus-circle"></i> Add Category</a></li>
                    <li><a href="product-sub-category-add.php"><i class="fa fa-plus-circle"></i>Add Sub Catgory</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-audio-description"></i>
                    <span> Advertisement Info</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="ad-info-add.php"><i class="fa fa-plus-circle"></i> Add New Info</a></li>
                    <li><a href="ad-info-list.php"><i class="fa fa-list"></i> All Ad-List</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-audio-description"></i>
                    <span> Footer Image</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="footer-image-add.php"><i class="fa fa-plus-circle"></i> Add New Image</a></li>
                    <li><a href="footer-image-list.php"><i class="fa fa-list"></i> All Image-List</a></li>
                </ul>
            </li>
            <!--
      <li><a href="barcode.php"><i class="fa fa-barcode"></i> <span>Barcode print 2 Column</span></a></li>  
      <li><a href="barcode2.php"><i class="fa fa-barcode"></i> <span>Barcode print 3 Column</span></a></li>    
		  <li><a href="clients.php"><i class="fa fa-users"></i> <span>Client</span></a></li>
      <li><a href="suppliers.php"><i class="fa fa-handshake-o"></i> <span>Supplier</span></a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-money"></i>
          <span>Expense</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="purchase-rawmaeetrial.php"><i class="fa fa-plus-circle"></i> Purchase Raw Material</a></li> 
          <li><a href="raw-product-list.php"><i class="fa fa-plus-circle"></i> Raw Material print</a></li>    
          <li><a href="barcode_raw.php"><i class="fa fa-plus-circle"></i> Raw Material Barcode</a></li>               
          <li><a href="expense-add.php"><i class="fa fa-plus-circle"></i> Add Expense</a></li>            
          <li><a href="expense.php"><i class="fa fa-money"></i> Expense List</a></li>
          <li><a href="wastage.php"><i class="fa fa-money"></i> Damage Product List</a></li>
          <li><a href="expense-category.php"><i class="fa fa-list"></i> expense category</a></li>
          <li><a href="expense-category-add.php"><i class="fa fa-plus-circle"></i>  Add expense cateogry </a></li>
        </ul>
      </li> 
      <li class="treeview">
        <a href="#">
          <i class="fa fa-newspaper-o"></i>
          <span>Report</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="sales.php"><i class="fa fa-shopping-cart"></i> All Sales Report</a></li>
          <li><a href="product-sold-list.php"><i class="fa fa-list"></i>Sold Item</a></li> 
          <li><a href="sales-reporting-list.php"><i class="fa fa-list"></i>Sale Report</a></li> 		  
          <li><a href="product-current-stock-list.php"><i class="fa fa-cube"></i>Current Stock</a></li>
          <li><a href="reporting.php"><i class="fa fa-list"></i>Income and Expense</a></li>
          <li><a href="income_expense_date_search.php"><i class="fa fa-list"></i> Income & Expense</a></li>
        </ul>
      </li>    
		  <li><a href="staff.php"><i class="fa fa-user-circle-o"></i> <span>Staff</span></a></li>
		  <li><a href="settings.php"><i class="fa fa-wrench"></i> <span>Settings</span></a></li>
		  <li><a href="profile.php"><i class="fa fa-user"></i> <span>Profile</span></a></li>   -->
            <li><a href="db/db_export.php" target="_blank"><i class="fa fa-download"></i> <span>Backup</span></a></li>
        </ul>
        <?php } ?>

        <?php 
      if($_SESSION['adminType']=='sales')
      {
    ?>
        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Home</span></a></li>
            <li><a href="sales-add.php"><i class="fa fa-cart-plus"></i> Sale</a></li>
            <li><a href="barcode.php"><i class="fa fa-barcode"></i> <span>Barcode Print 2 col</span></a></li>
            <li><a href="barcode2.php"><i class="fa fa-barcode"></i> <span>Barcode Print 3 col</span></a></li>
            <li><a href="db/db_export.php" target="_blank"><i class="fa fa-download"></i> <span>Backup</span></a></li>
        </ul>
        <?php } ?>
    </section>
    <!-- /.sidebar -->
</aside>