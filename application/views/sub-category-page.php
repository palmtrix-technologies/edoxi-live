<?php $page='courses'; ?>
<?php include('includes/header.php') ?>

<div class="sub-category-page subpage">
<div class="subpage-banner detailed">
<div class="wrapper">
<div class="contents" data-aos="fade-up" data-aos-duration="700">
<h1 class="h1 page-title text-left"><?php echo str_replace(' in ','<span class="yellow-text"> in ',$subcategoryimage->Banner_caption)."</span>";?></h1>
<p class="description"><?= $subcategoryimage->Banner_description;?> </p>
<div class="lists">
<?= $subcategoryimage->BannerData;?>
</div>
<div class="accreditation-brands">
<?php include('includes/accreditation-logos.php'); ?>
</div>
</div>
</div>
<img src="<?=FILE_URL.$subcategoryimage->ImagePath;?>" width="1370" height="300" alt="<?=$subcategoryimage->Image_alt_text;?>" class="subpage-banner-image"/>
</div>

<div class="container-fluid">
<div class="breadcrumbs">
<ul>
<li><a href="<?=base_url();?>">Home</a></li>
<li><a href="<?=base_url();?>/courses">Courses</a></li>
<li> <?=$subCategorydata->subcategory_name;?></li>
</ul>
</div>
</div>

<section class="section-fluid">
<div class="container-fluid two-column-layout" data-aos="fade-up" data-aos-duration="700">
<div class="col1">

<?php foreach($subcategorysections as $sections){

if($sections->Classname!="Normal")
{
?>
<div class="<?= $sections->Classname;?>">
<?= $sections->Content;?>

</div>

<?php } else { ?>
   
    <?= $sections->Content;?>
   
<?php }  } ?>


<!-- 
<h2 class="h2 title-left-bordered">Web Development Courses to Get you Started</h2>

<div class="bullet-box most-popular">

<div class="lists">
<h3 class="h3 heading orange-text">Most Popular</h3>
<ul>
<li><a href="#">HTML & CSS Training in Dubai   </a></li>
<li><a href="#">PHP Training Courses in Dubai</a></li>
<li><a href="#">Python Training Courses in Dubai</a></li>
<li><a href="#">Wordpress Development Courses in Dubai</a></li>
<li><a href="#">ASP.NET Training Courses in Dubai</a></li>
</ul>
</div>
</div>


<div class="bullet-box our-features">
<h3 class="h3 heading orange-text">Our Features</h3>
<div class="lists">
<ul>
<li>
<h4 class="h4 heading">Gain in-depth knowledge</h4>
<p class="p">Learning to code means more than just memorizing syntax. Instead, we help you think like 
a real programmer.</p>
</li>
<li>
<h4 class="h4 heading">Get a helpful career roadmap</h4>
<p class="p">Like a career advisor, we guide you through each step. You’ll learn the right thing at the 
right time, all in one place.</p>
</li>
<li>
<h4 class="h4 heading">Get job ready</h4>
<p class="p">Gain practical experience as you go by creating portfolio-worthy projects that will help you 
land your next job.</p>
</li>
</ul>
</div>
</div>




<h2 class="h2">Web Development Training in Dubai</h2>
<div class="highlight-box">Learn to create fast, reliable and interactive web applications</div>
<p class="p">Get familiar with the basics of web development and learn to create fast, reliable and interactive web applications using basic to advanced technologies.</p>
<p class="p">At Edoxi Training Institute, Dubai we’ll give you the training to build quick, modern web applications and responsive websites to ensure your organization remains at the forefront.  </p>
<p class="p">Whether you're looking to add web development skills to the belt because your teams’ role is changing, or you want to master a specific technology, like AngularJS or Node.js, or learn a new markup language like HTML or XML, our suite of web development courses will help you or your organization to remain current in the digital transformation.</p>
 

<div class="bullet-box advantages">

<div class="lists">
<h3 class="h3 heading">Here are just a few things you’ll be able to do after taking our 
web development courses.</h3>
<ul>
<li>
<h4 class="h4 heading">Understand Full Stack</h4>
<p class="p">From HTML to React and more, you'll master the tools that front-end developers use every day. </p>
</li>
<li>
<h4 class="h4 heading">Learn to Build a Web App</h4>
<p class="p">More than learning to build a landing page, you'll be able to build the back-end of a web application and even create your own API.</p>
</li>
<li>
<h4 class="h4 heading">Show Off your Skills</h4>
<p class="p">Build portfolio-worthy projects while you learn, so you can show recruiters your skills and 
kick-start your career as a web developer.</p>
</li>
</ul>
</div>
</div> -->


<!--<div class="highlight-box">Let’s help you to put yourself in the elite panel of web developers. </div>-->

<div class="all-courses">
<h3 class="h3 heading highlighted">Ready to kick-start your career?</h3>
<p class="p">Browse through our <?=$subCategorydata->subcategory_name;?> Courses and choose the one to fit your skill level. </p>
<div class="lists">
<?php foreach($relatedcourses as $courses){?>
<a href="<?= base_url().$courses->course_slug;?>">
<div class="course-name"><?= $courses->course_name;?> Courses in Dubai</div>
<div class="course-rating">
<img src="assets/images/rating-star-full.svg" alt="rating1" width="16" height="14">
<img src="assets/images/rating-star-full.svg" alt="rating2" width="16" height="14">
<img src="assets/images/rating-star-full.svg" alt="rating3" width="16" height="14">
<img src="assets/images/rating-star-full.svg" alt="rating4" width="16" height="14">
<img src="assets/images/rating-star-half.svg" alt="rating5" width="16" height="14">
</div>
</a>
<?php }?>

</div>
</div>



</div>


<div class="col2 sidebar">
<div class="course-enquiry-box">
<p class="p title">Request Course Information</p>
<?php include('includes/enquiry-form.php'); ?>
</div>

<div class="sidebar-links1">
<div class="corporate-ad">
<a class="corporate-query" href="corporate-training">
<p class="title">Corporate Training Solution</p>
<p class="description">Want to close the skills gap that threatens your team's ability to compete?</p>
<span class="btn orange-bg">Learn How</span>
</a>
</div>
</div>
</div>






</div>
</section>
</div>


<?php include('includes/footer.php') ?>