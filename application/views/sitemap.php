<?php $page='sitemap'; ?>
<?php include('includes/header.php') ?>

<div class="sitemap subpage">
<div class="subpage-title">
<h1 class="h1 page-title text-center">Sitemap</h1>
</div>

<section class="section-fluid introduction">
<div class="container-fluid">
<div class="sitemap-list">
<ul>
<li class=""><a href="<?=base_url();?>">Home</a></li>
<li class=""><a href="<?=base_url();?>about-us">About Us</a></li>
<li class="hassubmenu"><a href="<?=base_url();?>courses">Courses</a><span class="trigger"></span>

<ul class="submenu" >
<?php foreach ($categorys as $Category) {?>
    <li class="hassubmenu"><a href="<?=base_url();?><?= $Category->category_slug; ?>"><?= $Category->category_name;?></a><span class="trigger"></span>
<ul class="submenu" >
<?php 
    $Subcategorys = $this->mainmodel->Subcatgoryforcourses($Category->category_id);
    $Categoryid=$Category->category_id;
    foreach ($Subcategorys as $Subcategory) {
    ?>
    	<li class="hassubmenu"><a href="<?=base_url();?><?= $Subcategory->subcategory_slug; ?>"><?= $Subcategory->subcategory_name; ?><span class="trigger"></span>
  <ul class="submenu" >
  <?php 
    $courses = $this->mainmodel->coursesforcourses($Categoryid,$Subcategory->subcategory_id);
    foreach ($courses as $course) {
    ?>

	<li><a href="<?=base_url();?><?= $course->course_slug; ?>"><?= $course->course_name;?></a>
	
  <?php } ?>
      </ul>
	</li>
    <?php }?>
    </ul>
    	
</li>
<?php }?>
</ul>
<li class="active"><a href="<?=base_url();?>corporate-training">Corporate Training</a>
</li>
<li class=""><a href="<?=base_url();?>accreditations">Accreditations</a></li>
<li class=""><a href="<?=base_url();?>testimonials">Testimonials</a></li>
<li class="hassubmenu"><a href="<?=base_url();?>study-hub">Study Hub</a><span class="trigger"></span>
<ul class="submenu" >
<?php foreach ($studyhubs as $studyhub) {
    ?>

	<li><a href="<?=base_url();?><?= $studyhub->slug; ?>"><?= $studyhub->Tittle;?></a></li>
	
  <?php } ?>
</ul>
</li>
<li class=""><a href="<?=base_url();?>gallery">Gallery</a></li>
<li class="hassubmenu"><a href="<?=base_url();?>our-resources">Resources</a><span class="trigger"></span>
<ul class="submenu">
<li class=""><a href="<?=base_url();?>brochures">Brochures</a></li>
<li class="hassubmenu"><a href="<?=base_url();?>Whitepaper">Whitepaper<span class="trigger"></span>
<ul class="submenu">
<?php foreach ($whitepapers as $whitepaper) {
    ?>

	<li><a href="<?=base_url();?><?= $whitepaper->slug; ?>"><?= $whitepaper->Whitepaper_name;?></a></li>
	
  <?php } ?>
</ul>

</li>
<li class="hassubmenu"><a href="<?=base_url();?>case-studies">Case study<span class="trigger"></span>
<ul class="submenu">
<?php foreach ($casestudies as $casestudy) {
    ?>

	<li><a href="<?=base_url();?><?= $casestudy->slug; ?>"><?= $casestudy->CompanyName;?></a></li>
	
  <?php } ?>
</ul>

</li>
</ul>

</li>
<li class=""><a href="<?=base_url();?>contact-us">Contact Us</a></li>
</ul>
</div>
</div>
</section>


</div>


<?php include('includes/footer.php') ?>