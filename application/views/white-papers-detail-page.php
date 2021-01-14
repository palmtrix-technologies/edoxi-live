<?php $page='white-papers'; ?>
<?php include('includes/header.php') ?>
<div class="white-papers-detail-page subpage">
<div class="subpage-banner detailed">
<div class="wrapper">
<div class="contents" data-aos="fade-up" data-aos-duration="700">
<h1 class="h1 page-title text-left">White Papers</h1>
<p class="caption"><?=$whitepaper->Whitepaper_name;?></p>
<div class="accreditation-brands">
<?php include('includes/accreditation-logos.php'); ?>
</div>
</div>
</div>
<img src="<?=FILE_URL."whitpaper/".$whitepaper->Banner_image;?>" width="1370" height="370" alt="case-studies" class="subpage-banner-image"/>
</div>

<div class="container">
<div class="breadcrumbs">
<ul>
<li><a href="<?=base_url();?>">Home</a></li>
<li><a href="corporate-training">Corporate Training</a></li>
<li><a href="our-resources">Our Resources</a></li>
<li>White paper</li>
</ul>
</div>
</div>

<section class="section introduction" data-aos="fade-up" data-aos-duration="700">
	<div class="container">
<h2 class="h2 text-center"><?=$whitepaper->Tittle;?></h2>
<p class="p caption text-center"><?=$whitepaper->Sub_tittle;?></p>

	</div>
</section>


<section class="section main-content">
<div class="container two-column-layout">
<div class="col1">
<?=$whitepaper->Content;?>
<h2 class="h2">Download this Whitepaper to learn how to: </h2>
<div class="bullet-box-with-bg">
<?=$whitepaper->Advantage;?>
</div>
<div class="btn-wrapper">
<a class="btn orange-bg modal-open"><img src="<?=base_url();?>assets/images/download-white-icon.svg" width="32" height="23" alt="download-icon" class="img">Download Now</a>
<div class="modal-container">
							<div class="modal-window" style="opacity: 0">
							<div class="modal-content request-a-callback">
							<h2 class="h2 title">Leave your Details, and Get the White Papers in your Inbox</h2>
							<div class="modal-close"><span></span><span></span></div>
							<?php $id=$whitepaper->ci_witepaperID; $type="whitepaper"; $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; include('includes/request-download-form.php') ?>
							</div>
							</div>
							</div>
</div>
</div>

<div class="col2 sidebar">

<div class="resource-navigation">
<?php include('includes/case-studies-sidebar-navigation.php') ?>
</div>

<div class="course-enquiry-box corporate-enquiry-box">
<p class="p title">Request a Corporate Consultation</p>
<?php include('includes/corporate-sidebar-form.php'); ?>
</div>

<div class="sidebar-links1">
<div class="corporate-ad">
<a class="corporate-query modal-open">
<p class="title">Corporate Training Solution</p>
<p class="description">Want to close the skills gap that threatens your team's ability to compete?</p>
<span class="btn orange-bg">Learn How</span>
</a>
<div class="modal-container">
<div class="modal-window" style="opacity: 0">
<div class="modal-content request-a-callback">
<h3 class="h3 title">Leave your Details, we'll get back to You!</h3>
<div class="modal-close"><span></span><span></span></div>
<?php include('includes/corporate-book-form.php') ?>
</div>
</div>
</div>
</div>
</div>
</div>

</div>
</section>
</div>


<?php include('includes/footer.php') ?>