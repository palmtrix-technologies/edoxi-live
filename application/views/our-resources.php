<?php $page='our-resources'; ?>
<?php include('includes/header.php') ?>

<div class="our-resouces subpage">
<div class="subpage-banner detailed">
<div class="wrapper">
<div class="contents" data-aos="fade-up" data-aos-duration="700">
<h1 class="h1 page-title text-left">Our Resources</h1>
<p class="caption">Gain insight into the power of Corporate Training and access the latest updates, research and trends. </p>
<p class="description">Case Studies, Interviews, Whitepapaers, Guides, Brochures, and more to help you grow.</p>
<div class="accreditation-brands">
<?php include('includes/accreditation-logos.php'); ?>
</div>
</div>
</div>
<img src="assets/images/our-resouces-banner.webp" width="1370" height="370" alt="our-resources" class="subpage-banner-image"/>
</div>

<div class="container-fluid">
<div class="breadcrumbs">
<ul>
<li><a href="<?=base_url();?>">Home</a></li>
<li><a href="corporate-training">Corporate Training</a></li>
<li>Our Resources</li>
</ul>
</div>
</div>

<section class="section-fluid">
<div class="container-fluid">
<div class="our-resources-contents list-block xs1 sm2">
<a href="case-studies" class="items">
<img src="assets/images/case-studies-thumbnail.webp" width="195" height="195" alt="case-studies-thumbnail" class="subpage-banner"/>
<p class="p">Case Studies</p>
</a>
<a href="white-papers" class="items">
<img src="assets/images/white-papers-thumbnail.webp" width="195" height="195" alt="white-papers-thumbnail" class="subpage-banner"/>
<p class="p">White Papers</p>
</a>
<a href="brochures" class="items">
<img src="assets/images/brochures-thumbnail.webp" width="195" height="195" alt="brochures-thumbnail" class="subpage-banner"/>
<p class="p">Brochures</p>
</a>
</div>


</div>
</section>
</div>


<?php include('includes/footer.php') ?>