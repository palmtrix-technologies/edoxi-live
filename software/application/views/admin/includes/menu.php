  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url() ?>admin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Rose Grocery</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <!-- <b><a class="search_head" style="color: #fff; " href="<?php echo site_url('admin/search_regular'); ?>">SEARCH</a></b> -->

      <a class="logout" href="<?php echo site_url('admin/product/logout'); ?>" ><i class="fa fa-fw fa-power-off"></i>Sign out</a>

      
    </nav>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>assets/images/avatar.png" class="img-circle">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
      <li><?php echo anchor('admin/category/','MANAGE CATEGORY');?></li>
      <li><?php echo anchor('admin/product','MANAGE PRODUCT');?></li>
      <li><?php echo anchor('admin/order','ORDER LIST');?></li>
       <li><?php echo anchor('admin/order/delivery_address','DELIVERY ADDRESS');?></li>
      <li><?php echo anchor('admin/category/view_user','REGISTERED USER LIST');?></li>
      <li><?php echo anchor('admin/category/view_advertisement','ADVERTISEMENT LIST');?></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <style type="text/css">
    
  .search_head
  {
    float: left;
    margin-left: 358px;
    font-size: 18px;
    background-color: transparent;
    background-image: none;
    padding: 15px 15px;
  }

  .logout
  {
    float: right;
    color: #fff;
    background-image: none;
    padding: 15px 15px;
  }

  </style>