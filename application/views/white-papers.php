<?php $page='white-papers'; ?>
<?php include('includes/header.php') ?>

<div class="white-papers subpage">
<div class="subpage-banner detailed">
<div class="wrapper">
<div class="contents" data-aos="fade-up" data-aos-duration="700">
<h1 class="h1 page-title text-left">White Papers</h1>
<p class="caption">Dive into the most trending topics in the field of skill development and technical training. </p>
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
<li>Whie Papers</li>
</ul>
</div>
</div>

<section class="section-fluid">
<div class="container-fluid two-column-layout">
<div class="col1">
<h3 class="h3 label">Click here to download from our collection of most informative Whitepapers that provides a solution to your training and course related problems and queries. </h3>

<div class="white-papers-block">
<div class="lists">

<?php foreach($whitepapers as $whitepaper){ ?>
<a href="white-papers/<?=$whitepaper->slug;?>">
<div class="course-name"><?=$whitepaper->Tittle?><?=$whitepaper->Sub_tittle?></div>
<div class="learn-more">Learn More<img src="<?=base_url()?>assets/images/anchor-link-more-icon.svg" width="8" height="13" alt="learn-more" class="learn-more-icon" /></div>
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