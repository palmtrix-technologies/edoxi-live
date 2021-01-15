<?php $page='courses'; ?>
<?php include('includes/header.php') ?>
<style>.hidden{display:none;}</style>
<div class="courses subpage">
<div class="subpage-banner">
<h1 class="h1 page-title text-center">Professional Courses in Dubai</h1>
<img src="assets/images/courses-banner.webp" width="1370" height="300" alt="about-us" class="subpage-banner-image"/>
</div>

<!--
<div class="container-fluid">
<div class="breadcrumbs">
<ul>
<li>Courses</li>
</ul>
</div>
</div>
-->

<section class="section-fluid courses-wrapper">
<div class="container-fluid">


<ul id="test" class="hidden">
<?php
 	if (isset($categorys)) {
                
		foreach ($categorys as $Category) {?>
<li class="parent">
<div class="course-category-box">
<h2 class="h2 course-category-title"><a href="<?=base_url();?><?= $Category->category_slug; ?>"><?= $Category->category_name;?></a></h2>

<ul class="course-category-lists">
<?php 
    $Subcategorys = $this->mainmodel->Subcatgoryforcourses($Category->category_id);
    $Categoryid=$Category->category_id;
    foreach ($Subcategorys as $Subcategory) {
    ?>
<li>
		<div class="course-sub-category-box">
		<h3 class="h3 course-sub-category-title"><a href="<?=base_url();?><?= $Subcategory->subcategory_slug; ?>"><?= $Subcategory->subcategory_name; ?></a></h3>

				<ul class="course-sub-category-lists">

				<?php 
    $courses = $this->mainmodel->coursesforcourses($Categoryid,$Subcategory->subcategory_id);
    foreach ($courses as $course) {
    ?>

	<li><a href="<?=base_url();?><?= $course->course_slug; ?>"><?= $course->course_name;?></a>
	
  <?php } ?>

				</ul>

		</div>
</li>
<?php }?>
</ul>
</div>


</li>
<?php }}?>

</ul>



<div class="course-lists" >
	<ul id="ul0">
	</ul>
</div>

<div class="course-lists" >
	<ul id="ul1">
	</ul>
</div>

<div class="course-lists" >
	<ul id="ul2">
	</ul>
</div>


</div>
</section>


<section class="section-fluid courses-description">
<div class="container-fluid">
<p>Are you looking for professional advancement in your career? In today’s highly competitive job market, discovering your career path to scale you up professionally can be really challenging. Validate your skills with in-demand professional courses to acquire workplace skills. At Edoxi Training Institute, we offer you professional courses in Dubai to meet the educational requirements of every industry and prove your workplace competency. </p>
<p class="p">Professional course graduates are always in-demand and easily hired by corporates as well as government organisations. Start off your education with professional courses to reach and attract employers. Stand apart from others and set your career goals with professional courses such as Engineering & CAD Courses, Designing Courses, Microsoft Courses, Language Courses, Programming Courses etc. Every professional course is designed, developed, monitored and managed by a group of experts comprising industry-leading trainers, thought leaders and professionals.</p>
<p class="p">Edoxi Training Institute is an accredited/approved training provider for a large number of courses in the domains of Administration, Financial Management, Project Management, Business Analysis and more. These professional training courses in Dubai can build your creativity and get acknowledged with the ongoing trends. </p>
<p class="p">The professional courses we offer are very intensive, specific and subject-oriented. Edoxi Training Institute’s selection of professional training courses in Dubai is for short term and long term.  Let’s help you to start off your career journey with our globally recognised professional courses. </p>
</div>
</section>


<section class="section-fluid students-review">
<div class="container-fluid" data-aos="fade-up" data-aos-duration="700">
<h2 class="h2 text-center">Students Review</h2>
<div class="swiper-container students-review-slider">
<div class="swiper-wrapper">

<?php foreach($Testimonials as $Testimonial){?>
<div class="swiper-slide">
<div class="students-review-box">
<div class="message"><?=$Testimonial->testimonial_review;?></div>
<div class="details">
	<p class="name"><?=$Testimonial->testimonial_name;?></p>
	<p class="company"><?=$Testimonial->course_name;?></p>
	<p class="designation"><?=$Testimonial->Designation;?></p>
</div>
</div>
</div>
<?php } ?>

</div>	
</div>	
<div class="students-review-slider-pagination"></div>
</div>
	<p class="btn-wrapper text-center"><a href="testimonials" class="btn blue-bg">View All Testimonials</a></p>
</section>
</div>

<script>

var lis = document.getElementById("test").getElementsByClassName("parent");

var listdata=lis;
var j;
var mode;
var length=listdata.length;
for (j = 0; j <length ; j++) {
 mode=(j%3);
 
 document.getElementById("ul"+mode).appendChild(listdata[0]); 
}

</script>
<?php include('includes/footer.php') ?>