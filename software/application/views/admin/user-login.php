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
                                <h4>User Login</h4>
                                <form action="<?php echo site_url('admin/home/user_home_page'); ?>" method="post">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" placeholder="Email" name="email" required value="<?php echo set_value('email');?>">
                                    </div>
                                     <?php echo form_error('email');?>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password" name="password" required value="<?php echo set_value('password');?>">
                                    </div>
                                     <?php echo form_error('password');?>
                                      <div class="admin-login-valid">
            <?php if(!empty($login_status)){
               echo '<span style="color:red !important;">Enter valid username and password</span>';
            }?>
            </div>
                                    <div class="checkbox">
                                        <label>
                                                <input type="checkbox"> Remember Me
                                            </label>
                                        <label class="pull-right">
                                                <a href="#">Forgotten Password?</a>
                                            </label>

                                    </div>
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
                                    <!-- <div class="register-link m-t-15 text-center">
                                        <p>Don't have account ? <a href="#"> Sign Up Here</a></p>
                                    </div> -->
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
    <script src="<?php echo base_url()?>js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url()?>js/lib/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url()?>js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url()?>js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url()?>js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url()?>js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url()?>js/custom.min.js"></script>

</body>

</html>