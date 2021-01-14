<?php $page='corporate-training'; ?>
<?php include('includes/header.php') ?>
<div class="case-studies-detail-page subpage">
<div class="subpage-banner detailed">
<div class="wrapper">
<div class="contents" data-aos="fade-up" data-aos-duration="700">
<h1 class="h1 page-title text-center">Case Studies</h1>
<img src="<?=FILE_URL."casestudy/Logo/".$casestudy->Logo;?>" width="119" height="37" alt="nia-limited" class="client-logo"/>
</div>
</div>
<img src="<?=FILE_URL."casestudy/Logo/".$casestudy->BannerImage;?>" width="1370" height="370" alt="our-resources" class="subpage-banner-image"/>
</div>

<div class="container">
<div class="breadcrumbs">
<ul>
<li><a href="<?=base_url();?>">Home</a></li>
<li><a href="corporate-training">Corporate Training</a></li>
<li><a href="our-resources">Our Resources</a></li>
<li><a href="case-studies">Case Studies</a></li>
<li><?=$casestudy->CompanyName;?></li>
</ul>
</div>
</div>

<section class="section main-content">
<div class="container" data-aos="fade-up" data-aos-duration="700">
<h2 class="h2 main-heading text-center"><?=$casestudy->Case_study_tittle;?></h2>
<p class="p text-center intro-description"><?=$casestudy->Casestudy_shortDesc;?></p>

<div class="training-details-box list-block xs1 md3">
<div class="items">
<img src="<?=base_url();?>assets/images/industry-icon.svg" width="45" height="45" alt="industry" class="img"/>
<div class="label">Industry</div>
<div class="description"><?=$casestudy->Industry;?></div>
</div>
<div class="items">
<img src="<?=base_url();?>assets/images/training-icon.svg" width="45" height="45" alt="training" class="img"/>
<div class="label">Training Used</div>
<div class="description"><?=$casestudy->Training_used;?></div>
</div>
<div class="items">
<img src="<?=base_url();?>assets/images/location-icon.svg" width="25" height="45" alt="location" class="img"/>
<div class="label">Region</div>
<div class="description"><?=$casestudy->Region;?></div>
</div>
</div>


<div class="ceo-message">
<div class="col1">
<img src="<?=FILE_URL."casestudy/Logo/".$casestudy->testi_Image;?>" width="25" height="45" alt="location" class="img"/>
</div>
<div class="col2">
<img src="<?=base_url();?>assets/images/quote-icon.svg" width="19" height="17" alt="quote" class="img"/>
<p class="message"><?=$casestudy->testi_message;?></p>
<p class="ceo-name"><?=$casestudy->testi_name;?></p>
<p class="ceo-designation"><?=$casestudy->testi_desig;?></p>
</div>
</div>


<div class="training-result-box list-block xs1 md3">
<div class="items">
<img src="<?=base_url();?>assets/images/goals-icon.svg" width="45" height="45" alt="industry" class="img"/>
<div class="label">Goal</div>
<div class="description"><?=$casestudy->Goal;?></div>
</div>
<div class="items">
<img src="<?=base_url();?>assets/images/obstacles-icon.svg" width="45" height="45" alt="training" class="img"/>
<div class="label">Obstacle</div>
<div class="description"><?=$casestudy->Obstacle;?></div>
</div>
<div class="items">
<img src="<?=base_url();?>assets/images/results-icon.svg" width="25" height="45" alt="location" class="img"/>
<div class="label">Result</div>
<div class="description"><?=$casestudy->Result_overview;?></div>
</div>
</div>
</div>

<div class="container two-column-layout">
<div class="col1">
<?=$casestudy->Sectiondata;?>
<div class="result-box">
<h2 class="h2 heading">Result</h2>
<div class="description">
<p class="p"> <?=$casestudy->result;?></p>
</div>
</div>
<div class="call-box">
<h2 class="h2 heading">Looking To Give Your Team Training in Advanced Excel? </h2>
<div class="number-box">
<div class="label">Give Us a Quick Call on</div>
<div class="number"><img src="<?=base_url();?>assets/images/callbox-icon.svg" width="25" height="25" alt="advanced-excel" class="img"/><a href="tel:043801666">043801666</a></div>
</div>
</div>
</div>
<div class="col2">
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

<?php if(isset($casestudies)){?>
<section class="section corporate-case-studies-slider">
<div class="container">
<h2 class="h2">View More Case Studies</h2>
<div class="swiper-container case-studies-slider">
<div class="swiper-wrapper">
<?php foreach($casestudies as $casestudyi){?>
<div class="swiper-slide">
<a href="<?=$casestudyi->slug;?>">
<div class="case-studies-box">
<img src="<?=FILE_URL."casestudy/Logo/".$casestudy->Logo;?>" width="172" height="25" alt="danway-icon" class="img">
<div class="label">View Case Study</div>
</div>
</a>
</div>
<?php }?>


</div>	
<div class="case-studies-slider-pagination"></div>
<!-- Add Arrows -->
<div class="case-studies-slider-button-next1"></div>
<div class="case-studies-slider-button-prev1"></div>
</div>
</div>
</section>
<?php }?>
</div>




<?php include('includes/footer.php') ?>