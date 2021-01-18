<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=0"/>
<!-- <meta name="robots" content="noindex"> -->

<?php if(isset($seo)){ ?>
  <title><?= $seo->tittle;?></title>
<meta name="description" content="<?=$seo->descriptions;?>">
<meta property=og:site_name content="Edoxi Training"/>
<meta property="og:title" content="<?= $seo->tittle;?>" />
<meta property="og:url" content="<?=(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" />
<meta property="og:type" content="website" />
<meta property="og:description" content="<?=$seo->descriptions;?>" />
<meta property="og:image" content="https://www.edoxitraining.com/assets/images/logo-regular.svg" />

<?php } else {?>
  <title>Accredited Professional Training Center in Dubai | Edoxi Training</title>
<meta name="description" content="Leading educational training institute in Dubai offering extensive career-orientated courses including Computer, Accounting, Language and Management Courses for individuals and corporates by highly experienced trainers. Call us at 043801666  to join our courses.">
<meta property=og:site_name content="Edoxi Training"/>
<meta property="og:title" content="Edoxi Training" />
<meta property="og:url" content="https://www.edoxitraining.com" />
<meta property="og:type" content="website" />
<meta property="og:description" content="Accredited Professional Training Center in Dubai | Edoxi Training" />
<meta property="og:image" content="https://www.edoxitraining.com/assets/images/logo-regular.svg" />

<?php }?>

<link href="<?=base_url();?>favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link rel="canonical" href="https://www.edoxitraining.com/" />

<!-- need a change  -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-115799470-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-115799470-1');
</script>



<?php 
if(isset($page_type))
{
$pagename =  $page_type;
}
else
{
$pagename='';
}

if(isset($_SERVER['HTTPS']))
{
         if($pagename == "home") {
          echo '<link href="'.base_url().'assets/css/home.min.css" type="text/css" rel="stylesheet" />';
          }
          else if($pagename == "courses") {
            echo '<link href="'.base_url().'assets/css/courses.min.css" type="text/css" rel="stylesheet" />
            <link href="'.base_url().'assets/css/subpages.min.css" type="text/css" rel="stylesheet" />'; 
          }
          else if($pagename == "corporate-training") {
            echo '<link href="'.base_url().'assets/css/corporate-training.min.css" type="text/css" rel="stylesheet" />
            <link href="'.base_url().'assets/css/subpages.min.css" type="text/css" rel="stylesheet" />'; 
          }
          else {
            echo '<link href="'.base_url().'assets/css/subpages.min.css" type="text/css" rel="stylesheet" />'; 
          }
          echo '<link href="'.base_url().'assets/css/globals.min.css" type="text/css" rel="stylesheet" />'; 
         
}
else{
          if($pagename == "home") {
            echo '<link href="'.base_url().'assets/css/home.css" type="text/css" rel="stylesheet" />';
            }
            else if($pagename == "courses") {
              echo '<link href="'.base_url().'assets/css/courses.css" type="text/css" rel="stylesheet" />
              <link href="'.base_url().'assets/css/subpages.css" type="text/css" rel="stylesheet" />'; 
            }
            else if($pagename == "corporate-training") {
              echo '<link href="'.base_url().'assets/css/corporate-training.css" type="text/css" rel="stylesheet" />
              <link href="'.base_url().'assets/css/subpages.css" type="text/css" rel="stylesheet" />'; 
            }
            else {
              echo '<link href="'.base_url().'assets/css/subpages.css" type="text/css" rel="stylesheet" />'; 
            }
            echo '<link href="'.base_url().'assets/css/globals.css" type="text/css" rel="stylesheet" />'; 
}

?>

<script type="text/javascript">
var courses1 = <?php echo json_encode($Searchdata); ?>;
</script>

<!-- Font Preload -->
<link rel="preload" href="assets/fonts/roboto-bold.woff2" as="font" crossorigin="anonymous" />
<link rel="preload" href="assets/fonts/roboto-regular.woff2" as="font" crossorigin="anonymous" />
<link rel="preload" href="assets/fonts/roboto-semibold.woff2" as="font" crossorigin="anonymous" />
<link rel="preload" href="assets/fonts/roboto-black.woff2" as="font" crossorigin="anonymous" />
</head>

<body class="<?php /* add body class based on page name  echo $page;*/ ?><?php
if(isset($_SERVER['HTTPS'])){if($page=='home'){ echo $page;/* add space between classes */ echo ' '; /* add preloader class only for home page */ echo  'enable-preloader';  }}?>">

<div class="preloader"><div class="preloader-wrapper"><div class="preloader-content"></div></div></div> 

<!--Site Header-->
<header class="site-header">
<div class="container-fluid">
<div class="block1 fluid">
<a href="<?=base_url();?>" class="header-logo-wrapper">
<img src="<?=base_url();?>assets/images/logo-regular.svg" width="150" height="52" alt="Edoxi Header Logo" class="header-logo"/></a>
<!-- Request a Call Back and Phone -->
<div class="request-callback-phone">
<a class="request-callback modal-open">Request a Call Back</a>
<!--modal window for request call back-->
<div class="modal-container">
<div class="modal-window" style="opacity: 0">
<div class="modal-content request-a-callback">
<h2 class="h2 title">Leave your Details, we will get back to You!</h2>
<div class="modal-close"><span></span><span></span></div>
<?php include('request-callback-form.php') ?>
</div>
</div>
</div>

<a href="tel:+97143801666" class="phone">
<img src="<?=base_url();?>assets/images/phone-icon-white.svg" width="16" height="16" alt="Header Phone" class="header-phone"/><span>+97143801666</span>
</a>
</div>
<!-- Search Box -->
<div class="search-container <?php if($page=='about-us'){echo 'gray-filled-searchbox';}?>">
<form class="form" action="<?=base_url();?>search" method="post">
<input type="text" autocomplete="off" placeholder="Search for a Course" name="search" class="search-field search-input1">
<button type="submit" class="search-button"><img src="<?=base_url();?>assets/images/search-icon-blue.svg" width="22" height="23" alt="SearchIcon" class="search-icon"/></button>
<ul id="autocomplete-results1" class="autocomplete-results">
</ul>
</form>
</div>
</div>
<div class="block2">
<!-- Navigation -->
<div class="navigation">
<!-- Navigation Trigger -->
<div class="navigation-trigger navigation-trigger-slider-r">
<div class="navigation-trigger-box">
<div class="navigation-trigger-inner"></div>
</div>
</div>
<nav class="dropdownmenu">
<ul>

<li class="<?php if($page=='home'){echo 'active';}?>"><a href="<?=base_url();?>">Home</a></li>
<li class="<?php if($page=='about-us'){echo 'active';}?>"><a href="<?=base_url();?>about-us">About Us</a></li>
<li class="<?php if($page=='courses'){echo 'active';}?>"><a href="<?=base_url();?>courses">Courses</a>

<ul>
<?php
if (isset($header_menus)) {              
foreach ($header_menus as $Category) {?>
<li><a href="<?=base_url();?><?= $Category->category_slug; ?>"><?= $Category->category_name;?></a>
<ul>
    <?php 
    $Subcategorys = $this->mainmodel->Subcatgorybycategoryid($Category->category_id);
    $Categoryid=$Category->category_id;
    foreach ($Subcategorys as $Subcategory) {
    ?>
	<li><a href="<?=base_url();?><?= $Subcategory->subcategory_slug; ?>"><?= $Subcategory->subcategory_name; ?></a>
  <ul>
  <?php 
    $courses = $this->mainmodel->coursesmenubyid($Categoryid,$Subcategory->subcategory_id);
    foreach ($courses as $course) {
    ?>
	<li><a href="<?=base_url();?><?= $course->course_slug; ?>"><?= $course->course_name;?></a>
  <?php } ?>
  </ul>
	</li>
    <?php } ?>
    </ul>
</li>
<?php } 
}	?>
</ul>

</li>
<li class="<?php if($page=='corporate-training'){echo 'active';}?>"><a href="<?=base_url();?>corporate-training">Corporate Training</a>
</li>
<li class="<?php if($page=='accreditations'){echo 'active';}?>"><a href="<?=base_url();?>accreditations">Accreditations</a></li>
<li class="<?php if($page=='testimonials'){echo 'active';}?>"><a href="<?=base_url();?>testimonials">Testimonials</a></li>
<li class="<?php if($page=='study-hub'){echo 'active';}?>"><a href="<?=base_url();?>study-hub">Study Hub</a></li>
<li class="<?php if($page=='gallery'){echo 'active';}?>"><a href="<?=base_url();?>gallery">Gallery</a></li>
<li class="<?php if($page=='our-resources'){echo 'active';}?>"><a href="<?=base_url();?>our-resources">Resources</a></li>
<li class="<?php if($page=='contact-us'){echo 'active';}?>"><a href="<?=base_url();?>contact-us">Contact Us</a></li>
</ul>
</nav>
</div>
</div>

</div>
</header>