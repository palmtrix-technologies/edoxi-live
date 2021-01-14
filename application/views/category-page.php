<?php $page='courses'; ?>
<?php include('includes/header.php') ?>

<div class="category-page subpage">
<div class="subpage-banner detailed">
<div class="wrapper">
<div class="contents" data-aos="fade-up" data-aos-duration="700">
<h1 class="h1 page-title text-left"><?php echo str_replace(' in ','<span class="yellow-text"> in ',$categoryimage->Banner_caption)."</span>";?></h1>

<p class="description"><?= $categoryimage->Banner_description;?> </p>
<div class="lists">
<?= $categoryimage->BannerData;?>
</div>
<div class="accreditation-brands">
<?php include('includes/accreditation-logos.php'); ?>
</div>
</div>
</div>
<img src="<?=FILE_URL. $categoryimage->ImagePath;?>" width="1370" height="300" alt="<?=$categoryimage->Image_alt_text;?>" class="subpage-banner-image"/>
</div>

<div class="container-fluid">
<div class="breadcrumbs">
<ul>
<li><a href="<?=base_url();?>">Home</a></li>
<li><a href="<?=base_url();?>courses">Courses</a></li>
<li><?=$Categorydata->category_name?> Courses</li>
</ul>
</div>
</div>

<section class="section-fluid">
<div class="container-fluid two-column-layout" data-aos="fade-up" data-aos-duration="700">
<div class="col1">
<?php foreach($categorysections as $sections){

if($sections->Classname!="Normal")
{
?>
<div class="<?= $sections->Classname;?>">
<?= $sections->Content;?>

</div>

<?php } else { ?>
   
    <?= $sections->Content;?>
   
<?php }  } ?>





<p class="btn-wrapper"><div class="highlighted">Enroll in a Specialization to master a specific career skill</div></p>
<div class="all-courses">
<h3 class="h3 heading browse">Browse through all our <?=$Categorydata->category_name?> Courses in Dubai and Choose the best course that suits your needs. </h3>
<div class="lists">
<?php foreach($subcategories as $subcategory){ ?>
<a href="<?=base_url().$subcategory->subcategory_slug?>">
<div class="course-name"><?= $subcategory->subcategory_name;?> Courses in Dubai</div>
<div class="course-numbers"><?=$subcategory->counts;?> Courses</div>
</a>
<?php } ?>
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