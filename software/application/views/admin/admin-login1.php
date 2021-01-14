   

  <head>

    

    <title>- Micro Group -</title>

    <!-- Bootstrap core CSS -->

     <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900" rel="stylesheet">

     <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">


    <link href="<?php echo base_url()?>design/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>design/css/login_style.css" rel="stylesheet">
    <link href="<?php echo base_url()?>design/font-awesome/css/font-awesome.min.css" rel="stylesheet">
   <link href="<?php echo base_url()?>design/css/style_developer.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url()?>design/css/animate.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>design/css/stle_developer.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url()?>design/js/jquery-1.12.3.min.js"></script>
    <script src="<?php echo base_url()?>design/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>design/js/fancybox.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>design/js/main.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>design/js/wow.js" type="text/javascript"></script>

  </head>

 
  
  

   <div class="inner-panel-full">
   <div class="bride-groom">
   <div class="container">
    <div class="col-md-6 col-sm-8 col-xs-12 col-md-offset-3">

<?php
if($this->session->flashdata('msg'))
{ ?>
  <div id="msg" style="font-size: large; color: #8a3777;"><?php echo $this->session->flashdata('msg'); ?></div>

<?php } ?>


      <div class="login-div login-div-admin">

        <span class="login-head">Admin Login</span>

        <div class="col-md-12">
          <form action="<?php echo site_url('admin/product/home_page'); ?>" method="post">
            <input type="text" name="admin_username" class="form-control inpt1" placeholder="Username">
            <input type="password" name="admin_password" class="form-control inpt1" placeholder="Password">

            <input type="submit" name="" class="btn btn-danger pull-right" value="Login">
            <div class="admin-login-valid">
                    <?php if(!empty($login_status)){
            echo "Enter valid Username and Password";
        }?>         </div>
          </form>
        </div>


       <!--  <div class="col-md-1">
          <span class="or">Or</span>
        </div> -->

       <!--  <div class="col-md-4">
          <span class="fb"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</span>
        </div> -->

      </div>
    </div>



   </div> 
   </div> 
   </div><!-- inner-panel-full -->




 




  <style type="text/css">
    .login-div{    float: left;
    width: 100%;
    border: 1px solid rgba(204, 204, 204, 0.62);
    background: #fff;
    box-shadow: 0px -1px 25px 0px #ccc; padding-bottom: 20px;}
    .login-div .login-head{float: left;
    width: 100%;
    font-size: 21px;
    color: #928e8e;
    padding: 12px 19px;
    border-bottom: 1px solid #ccc;
    margin-bottom: 25px;}
    .login-div .inpt1{ float:left; width:100%; margin-bottom:10px;padding:22px 15px; }
    .login-div .forgot{ float: left; margin-top:10px; }
    .login-div .btn{    margin-top: 25px;
    padding: 10px 35px;
    background: #047dc3;
    border: none; }
    .or{ float: left;
    width: 100%;
    margin-top: 65px;
    color: #888585;
    font-weight: bold;
    font-size: 20px; }

    .fb{ float: left; width:100%; background:#000; padding:10px 0px; color:#fff; font-size:15px; }

    .why-div { float: left; width:100%; border:1px solid #ccc; padding:25px; background:#fff; }
    .why-div .why-head{     float: left;
    width: 100%;
    color: #dc02e8;
    font-size: 25px;
    margin-bottom: 0px;
    font-weight: bold;}
    .why-div .why-head2{float: left;
    width: 100%;
    color: #8a3777;
    font-size: 16px;
    border-bottom: 1px dashed #ccc;
    padding-bottom: 15px;
    margin-bottom: 15px;
    font-weight: normal; }
    .why-div ul{ margin: 0px; padding: 0px; }
    .why-div ul li{     list-style: none;
    line-height: 26px;
    color: #777;
    font-size: 14px;
    float: left;
    margin-bottom: 10px; }
    .why-div ul li i{    color: #ff0200;
    font-size: 17px;}

    .reg{ float: left; width:100%; text-align: center; margin-top: 20px; }
    .reg .reg1{     font-size: 14px;
    color: #fff;
    text-transform: capitalize;
    text-decoration: none;
    border: none;
    padding: 10px 40px;
    background: #8a3777;}

    .bride-groom{ background:url(images/bride-groom.png) no-repeat right; }

    .forgot-div{     float: left;
    background: rgba(0, 0, 0, 0.44);
    position: fixed;
    width: 100%;
    height: 100%;
    left: 0px;
    top: 0px;
    z-index: 999; }

    .forgot-panel{     float: left;
    width: 500px;
    background: #fff;
    position: absolute;
    top: 150px;
    left: 36%;
    padding: 10px 20px 25px; }
    .forgot-panel .name1{ float: left;
    width: 100%;
    color: #f00;
    font-size: 18px;
    padding: 14px 0px;
    margin-bottom: 14px;
    border-bottom: 1px solid #ccc; }
    .forgot-panel p{ float: left; width:100%; font-size:14px; margin-bottom: 10px; }
    .forgot-panel .inpt1{    padding: 10px 15px;
    background: none;
    border: 1px solid #440235;
    width: 69%;}
    .forgot-panel .sub1{     float: right;
    background: #8a3777;
    border: none;
    padding: 11px 20px;
    color: #fff;}

    .close3{ float: right; background:none; border: none; font-size:15px; color:#777; }


    .inner-panel-full
    {
        float: left;
        width: 100%;
        padding: 30px 0px;
        background-size: 100%;
        background-attachment: fixed;
        background: rgba(204, 204, 204, 0.31);
        position: relative;
        height: 100%;
    }
    .login-div-admin
    {
        margin-top: 100px;
    }

  </style>
  


  </body>
</html>
