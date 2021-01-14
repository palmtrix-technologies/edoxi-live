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
                                <h4 class="m-b-0 text-white" style="text-align:  center;">Create User</h4>
                            </div>
                                <form method="post" action="<?php echo site_url('admin/home/register_add'); ?>">
                                         <div class="form-group">
                                        <label>Institute</label>
                                        <select class="form-control" name="institute" required>
                                        <option value="">Select your institute</option>
                                        <option value="Edoxi Training">Edoxi Training</option>
                                        <option value="Time Training">Time Training</option>
                                        <option value="Time Master">Time Master</option>
                                        <option value="Times Education">Times Education</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>User Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="User Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
										<input type="checkbox"> Agree the terms and policy
									</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                                    <div class="register-link m-t-15 text-center">
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