<?php $page ='case-studies'; ?>
<?php include('includes/header.php') ?>

<div class="case-studies subpage">
<div class="subpage-banner detailed">
<div class="wrapper">
<div class="contents" data-aos="fade-up" data-aos-duration="700">
<h1 class="h1 page-title text-left">Case Studies</h1>
<p class="caption">We work with some of the UAE's biggest companies and brands. Here are some practical examples of how businesses use Edoxi's Corporate Training Solutions to improve their performance.</p>
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
<li>Case Studies</li>
</ul>
</div>
</div>

<section class="section-fluid">
<div class="container-fluid two-column-layout" >
<div class="col1">
<h3 class="h3 achievements">50+ Brands and Businesses Converted with Edoxi</h3>

<div class="case-study-block">
<h2 class="h2">View our Case Studies</h2>
<div class="lists">
<?php foreach($casestudies as $casestudy)
{?>
<a href="case-studies/<?=$casestudy->slug;?>">
<div class="course-name"><?=$casestudy->Training_used;?> Training</div>
<div class="course-details"><?=$casestudy->Casestudy_shortDesc;?></div>
</a>
<?php }?>

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
<h2 class="h2 title">Leave your Details, we'll get back to You!</h2>
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