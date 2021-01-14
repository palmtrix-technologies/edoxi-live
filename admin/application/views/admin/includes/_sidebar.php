<?php 
$cur_tab = $this->uri->segment(2)==''?'dashboard': $this->uri->segment(2);  
?>  


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">


  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= ucwords($this->session->userdata('username')); ?></a>
      </div>
    </div>
<!-- Brand Logo -->
<a href="<?= base_url('admin'); ?>" class="brand-link">
<img src="<?= base_url(); ?>/assets/dist/img/edoxi-logo.svg" alt="Logo" class="brand-image">
<!--    <span class="brand-text font-weight-light"><?= $this->general_settings['application_name']; ?></span>-->
  </a>
    <!-- Sidebar Menu -->
    <nav class="mt-0">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <?php 
          $menu = get_sidebar_menu(); 

          foreach ($menu as $nav):

            $sub_menu = get_sidebar_sub_menu($nav['module_id']);

            $has_submenu = (count($sub_menu) > 0) ? true : false;
        ?>

        <?php if($this->rbac->check_module_permission($nav['controller_name'])): ?> 

        <li style="display:none;" id="<?= ($nav['controller_name']) ?>" class="nav-item <?= ($has_submenu) ? 'has-treeview' : '' ?> has-treeview">

          <a href="<?= base_url('admin/'.$nav['controller_name']) ?>" class="nav-link">
            <i class="nav-icon fa <?= $nav['fa_icon'] ?>"></i>
            <p>
              <?= trans($nav['module_name']) ?>
              <?= ($has_submenu) ? '<i class="right fa fa-angle-left"></i>' : '' ?>
            </p>
          </a>

          <!-- sub-menu -->
          <?php 
            if($has_submenu): 
          ?>
          <ul class="nav nav-treeview">

            <?php foreach($sub_menu as $sub_nav): ?>

            <li class="nav-item">
              <a href="<?= base_url('admin/'.$nav['controller_name'].'/'.$sub_nav['link']); ?>" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p><?= trans($sub_nav['name']) ?></p>
              </a>
            </li>

            <?php endforeach; ?>
           
          </ul>
          <?php endif; ?>
          <!-- /sub-menu -->
        </li>

        <?php endif; ?>

        <?php endforeach; ?>
        <li id="Category" class="nav-item has-treeview ">

        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-user"></i>
          <p>
            Category Management              <i class="right fa fa-angle-left"></i>            </p>
        </a>

<!-- sub-menu -->
          <ul class="nav nav-treeview" >

  
  <li class="nav-item">
    <a href="<?= base_url('') ?>Category" class="nav-link">
      <i class="fa fa-circle-o nav-icon"></i>
      <p>Category List</p>
    </a>
  </li>

  
  <li class="nav-item">
    <a href="<?= base_url('') ?>add-category" class="nav-link">
      <i class="fa fa-circle-o nav-icon"></i>
      <p>Add Category</p>
    </a>
  </li>

             
</ul>
          <!-- /sub-menu -->
</li>

<li id="subCategory" class="nav-item has-treeview ">
   <a href="#" class="nav-link">
      <i class="nav-icon fa fa-user"></i>
      <p>
        Sub Category Management              <i class="right fa fa-angle-left"></i>            
      </p>
   </a>
   <!-- sub-menu -->
   <ul class="nav nav-treeview" >
      <li class="nav-item">
         <a href="<?= base_url('') ?>subCategory" class="nav-link">
            <i class="fa fa-circle-o nav-icon"></i>
            <p>sub Category List</p>
         </a>
      </li>
      <li class="nav-item">
         <a href="<?= base_url('') ?>add-subcategory" class="nav-link">
            <i class="fa fa-circle-o nav-icon"></i>
            <p>Add sub Category</p>
         </a>
      </li>
   </ul>
   <!-- /sub-menu -->
</li>

<li id="subCategory" class="nav-item has-treeview ">
   <a href="#" class="nav-link">
      <i class="nav-icon fa fa-user"></i>
      <p>
       Course Management              <i class="right fa fa-angle-left"></i>            
      </p>
   </a>
   <!-- sub-menu -->
   <ul class="nav nav-treeview" >
      <li class="nav-item">
         <a href="<?= base_url('') ?>courses" class="nav-link">
            <i class="fa fa-circle-o nav-icon"></i>
            <p>Course List</p>
         </a>
      </li>
      <li class="nav-item">
         <a href="<?= base_url('') ?>add-course" class="nav-link">
            <i class="fa fa-circle-o nav-icon"></i>
            <p>add course</p>
         </a>
      </li>
   </ul>
   <!-- /sub-menu -->
</li>

<li id="subCategory" class="nav-item has-treeview ">
   <a href="#" class="nav-link">
      <i class="nav-icon fa fa-user"></i>
      <p>
       Case Study Management              <i class="right fa fa-angle-left"></i>            
      </p>
   </a>
   <!-- sub-menu -->
   <ul class="nav nav-treeview" >
      <li class="nav-item">
         <a href="<?= base_url('') ?>Casestudy" class="nav-link">
            <i class="fa fa-circle-o nav-icon"></i>
            <p>Case study List</p>
         </a>
      </li>
      <li class="nav-item">
         <a href="<?= base_url('') ?>add-casestudy" class="nav-link">
            <i class="fa fa-circle-o nav-icon"></i>
            <p>add Case study</p>
         </a>
      </li>
   </ul>
   <!-- /sub-menu -->
</li>

<li id="subCategory" class="nav-item has-treeview ">
   <a href="#" class="nav-link">
      <i class="nav-icon fa fa-user"></i>
      <p>
       White Paper Management              <i class="right fa fa-angle-left"></i>            
      </p>
   </a>
   <!-- sub-menu -->
   <ul class="nav nav-treeview" >
      <li class="nav-item">
         <a href="<?= base_url('') ?>whitepaper" class="nav-link">
            <i class="fa fa-circle-o nav-icon"></i>
            <p>White paper List</p>
         </a>
      </li>
      <li class="nav-item">
         <a href="<?= base_url('') ?>add-whitepaper" class="nav-link">
            <i class="fa fa-circle-o nav-icon"></i>
            <p>add white paper</p>
         </a>
      </li>
   </ul>
   <!-- /sub-menu -->
</li>

<li class="nav-item"><a href="<?= base_url('') ?>home-upcoming" class="nav-link">
      <i class="nav-icon fa fa-user"></i>
      <p>
      Home Upcoming Courses          
      </p>
   </a></li>

   <li id="subCategory" class="nav-item has-treeview ">
   <a href="#" class="nav-link">
      <i class="nav-icon fa fa-user"></i>
      <p>
       Testimonial Management <i class="right fa fa-angle-left"></i>            
      </p>
   </a>
   <!-- sub-menu -->
   <ul class="nav nav-treeview" >
      <li class="nav-item">
         <a href="<?= base_url('') ?>Testimonials" class="nav-link">
            <i class="fa fa-circle-o nav-icon"></i>
            <p>Manage Testimonial</p>
         </a>
      </li>
      <li class="nav-item">
         <a href="<?= base_url('') ?>home-testimonials" class="nav-link">
            <i class="fa fa-circle-o nav-icon"></i>
            <p>Home Testimonial</p>
         </a>
      </li>
      <li class="nav-item">
         <a href="<?= base_url('') ?>corporate-testimonials" class="nav-link">
            <i class="fa fa-circle-o nav-icon"></i>
            <p>Corporate Testimonial</p>
         </a>
      </li>
      <li class="nav-item">
         <a href="<?= base_url('') ?>course-testimonials" class="nav-link">
            <i class="fa fa-circle-o nav-icon"></i>
            <p>Course Testimonial</p>
         </a>
      </li>
      
      
     
   </ul>
   <!-- /sub-menu -->
</li>

<li id="studyhub" class="nav-item has-treeview ">
   <a href="#" class="nav-link">
      <i class="nav-icon fa fa-user"></i>
      <p>
      Study hub Management              <i class="right fa fa-angle-left"></i>            
      </p>
   </a>
   <!-- sub-menu -->
   <ul class="nav nav-treeview" >
   <li class="nav-item">
         <a href="<?= base_url('') ?>authormanagement" class="nav-link">
            <i class="fa fa-circle-o nav-icon"></i>
            <p>Manage Author</p>
         </a>
      </li>
      <li class="nav-item">
         <a href="<?= base_url('') ?>studyhub" class="nav-link">
            <i class="fa fa-circle-o nav-icon"></i>
            <p>Study hub list</p>
         </a>
      </li>
      <li class="nav-item">
         <a href="<?= base_url('') ?>add-studyhub" class="nav-link">
            <i class="fa fa-circle-o nav-icon"></i>
            <p>add Article</p>
         </a>
      </li>
      <li class="nav-item">
         <a href="<?= base_url('') ?>studyhub-home" class="nav-link">
            <i class="fa fa-circle-o nav-icon"></i>
            <p>Manage study hub home</p>
         </a>
      </li>
   </ul>
   <!-- /sub-menu -->
</li>
<li class="nav-item"><a href="<?= base_url('') ?>Accreditations" class="nav-link">
      <i class="nav-icon fa fa-user"></i>
      <p>
      Accrediations         
      </p>
   </a></li>
   <li class="nav-item"><a href="<?= base_url('') ?>enquiry" class="nav-link">
      <i class="nav-icon fa fa-user"></i>
      <p>
      Enquiry         
      </p>
   </a></li>
   

<li class="nav-item"><a href="<?= base_url('') ?>gallery" class="nav-link">
      <i class="nav-icon fa fa-user"></i>
      <p>
      Gallery Management         
      </p>
   </a></li>

  
   <li id="subCategory" class="nav-item has-treeview ">
   <a href="#" class="nav-link">
      <i class="nav-icon fa fa-user"></i>
      <p>
      Menu Management               <i class="right fa fa-angle-left"></i>            
      </p>
   </a>
   <!-- sub-menu -->
   <ul class="nav nav-treeview" >
      <li class="nav-item">
         <a href="<?= base_url('') ?>header-menu" class="nav-link">
            <i class="fa fa-circle-o nav-icon"></i>
            <p>Header Menu</p>
         </a>
      </li>
      <li class="nav-item">
         <a href="<?= base_url('') ?>footer-menu" class="nav-link">
            <i class="fa fa-circle-o nav-icon"></i>
            <p>Footer Menu</p>
         </a>
      </li>
   </ul>
   <!-- /sub-menu -->
</li>

   

        <li class="nav-header hidden"><?= trans('miscellaneous') ?></li>
        <li class="nav-item hidden">
          <a href="https://adminlte.io/docs" class="nav-link">
            <i class="nav-icon fa fa-file"></i>
            <p><?= trans('documentation') ?></p>
          </a>
        </li>
        <li class="nav-header hidden"><?= trans('labels') ?></li>
        <li class="nav-item hidden">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-circle-o text-danger"></i>
            <p class="text"><?= trans('important') ?></p>
          </a>
        </li>
        <li class="nav-item hidden">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-circle-o text-warning"></i>
            <p><?= trans('warning') ?></p>
          </a>
        </li>
        <li class="nav-item hidden">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-circle-o text-info"></i>
            <p><?= trans('informational') ?></p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<script>
  $("#<?= $cur_tab ?>").addClass('menu-open');
  $("#<?= $cur_tab ?> > a").addClass('active');
</script>