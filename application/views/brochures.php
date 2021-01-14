<?php $page='brochures'; ?>
<?php include('includes/header.php') ?>

<?php

if($this->session->flashdata('Message')) {
$message = $this->session->flashdata('Message');
 echo "<script>alert('"+$message+"');</script>";
}
?>

<div class="brochures subpage">
<div class="subpage-banner detailed">
<div class="wrapper">
<div class="contents" data-aos="fade-up" data-aos-duration="700">
<h1 class="h1 page-title text-left">Our Courses &amp; Training Brochures </h1>
<p class="caption">The following is a list of some of our popular courses where you can download the brochure:</p>
<div class="accreditation-brands">
<?php include('includes/accreditation-logos.php'); ?>
</div>
</div>
</div>
<img src="assets/images/case-studies-banner.webp" width="1370" height="370" alt="case-studies" class="subpage-banner-image"/>
</div>

<div class="container-fluid">
<div class="breadcrumbs">
<ul>
<li><a href="<?=base_url();?>">Home</a></li>
<li><a href="corporate-training">Corporate Training</a></li>
<li><a href="our-resources">Our Resources</a></li>
<li>Brochures</li>
</ul>
</div>
</div>

<section class="section-fluid">
<div class="container-fluid two-column-layout">
<div class="col1">
<h3 class="h3 achievements">50+ Brands and Businesses Converted with Edoxi</h3>

<div class="brochures-block">
<p>Please select a brochure you would like to download</p>
<div class="lists">

<?php foreach($brouchers as $broucher){?>
<div>
<a class="request-download modal-open">
<div class="course-name"><?= $broucher->course_name; ?> Training Brochure</div>
<div class="download-icon"><img src="assets/images/download-brochure-icon.svg" width="25" height="25" alt="download-brochure-icon" class="img"/></div>
</a>
<div class="modal-container">
							<div class="modal-window" style="opacity: 0">
							<div class="modal-content request-a-callback">
							<h3 class="h3 title">Enter Your Details, and Get the Brochure in Your Inbox </h3>
							<div class="modal-close"><span></span><span></span></div>
							<?php  $id=$broucher->ci_course_broucherID; $type="broucher"; $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; include('includes/request-download-form.php') ?>
							</div>
							</div>
							</div>
</div>
<?php }?>

</div>
</div>
</div>

<div class="col2 sidebar">

<div class="resource-navigation">
<?php include('includes/case-studies-sidebar-navigation.php') ?>
</div>

<div class="course-enquiry-box corporate-enquiry-box">
<p class="p title">Request A Free Consultation</p>
<?php include('includes/corporate-sidebar-form.php'); ?>
</div>

</div>


</div>




</div>
</section>
</div>


<?php include('includes/footer.php') ?>