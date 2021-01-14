<!DOCTYPE html>
<html lang="en">

<head>
     <?php include('main-header.php');?>
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                              <div class="card-header" style="background-color:#5c4ac7;">
                                <h4 class="m-b-0 text-white" style="text-align:  center;">Edit User</h4>
                            </div>
                                <form method="post" action="<?php echo site_url('admin/home/user_edit_submit/'); ?><?php echo $details[0]->register_id?>">
                                         <div class="form-group">
                                        <label>Institute</label>
                                        <select class="form-control" name="institute" required>
                                        <option value="">Select your institute</option>
                                         <?php $val=$details[0]->register_institute?>
                                       ?>
                                        <option value="Edoxi Training" <?php if($val=='Edoxi Training') echo "selected"?>>Edoxi Training</option>
                                        <option value="Time Training" <?php if($val=='Time Training') echo "selected"?>>Time Training</option>
                                        <option value="Time Master" <?php if($val=='Time Master') echo "selected"?>>Time Master</option>
                                        <option value="Times Education" <?php if($val=='Times Education') echo "selected"?>>Times Education</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>User Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="User Name" required value="<?php echo $details[0]->register_username?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" required value="<?php echo $details[0]->register_email?>">
                                    </div>
                                    <!-- <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                                    </div> -->
                                    
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Edit</button>
                                    <div class="register-link m-t-15 text-center">
                                        <p>Reset Password <a href="<?php echo base_url();?>admin/home/reset_user_password/<?php echo $details[0]->register_id?>"> click here</a></p>
                                        <p>Back to home ? <a href="<?php echo base_url();?>admin/home/admin_dashboard"> click here</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="<?php echo base_url();?>/js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url();?>/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url();?>/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url();?>/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url();?>/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url();?>/js/custom.min.js"></script>

</body>

</html>