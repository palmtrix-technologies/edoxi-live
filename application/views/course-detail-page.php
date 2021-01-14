<?php $page='courses'; ?>

<?php include('includes/header.php') ?>



<div class="detail-page subpage">
<div class="subpage-banner detailed">
<div class="wrapper">
<div class="contents" data-aos="fade-up" data-aos-duration="700">
<h1 class="h1 page-title text-left"><?php echo str_replace('in ','<span class="yellow-text">in ',$categoryimage->Banner_caption)."</span>";?></h1>
<p class="description"><?= $categoryimage->Banner_description;?> </p>
<div class="lists">
<?= $categoryimage->BannerData;?>
</div>
<div class="accreditation-brands">
<?php foreach($courseaccrediations as $item){?>
    <a href="accreditations"><img src="<?=base_url();?>admin/assets/img/accreation/<?=$item->accreditation_logo_small;?>" width="30" height="28" alt="autodesk-logo" class="img"/></a>
<?php }?>


</div>
</div>
</div>
<img src="<?=FILE_URL.$categoryimage->ImagePath;?>" width="1370" height="300" alt="<?=$categoryimage->Image_alt_text;?>" class="subpage-banner-image"/>
</div>

<div class="container-fluid">
<div class="breadcrumbs">
<ul>
<li><a href="<?=base_url();?>">Home</a></li>
<li><a href="<?=base_url();?>/courses">Courses</a></li>
<li><?=$coursedata->course_name?> Training in Dubai</li>
</ul>
</div>
</div>

<section class="section-fluid">
<div class="container-fluid two-column-layout">
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

<div class="highlight-box">To enrol in our <?=$coursedata->course_name?> Training in Dubai <span class="call">Call us on <a href="callto:04 3801666">04 3801666</a></span> </div>
<h3 class="h3 booking">Book a <?=$coursedata->course_name?> Training Course today</h3>
<div class="btn-wrapper text-center">
<a class="btn orange-bg request-callback modal-open">Request a Call Back</a>
<div class="modal-container">
<div class="modal-window" style="opacity: 0">
<div class="modal-content request-a-callback">
<h2 class="h2 title">Leave your Details, we'll get back to You!</h2>
<div class="modal-close"><span></span><span></span></div>
<?php include('includes/request-callback-form.php') ?>
</div>
</div>
</div>
</div>


<?php if(isset($batches)&&count($batches)>0){?>
  

<div class="course-calender">
<h4 class="h4 heading">Upcoming <?=$coursedata->course_name?> Training Course in Dubai</h4>
<table class="table">
<?php foreach($batches as $batch){?>
<tr>
<td><?= $batch->formateddate;?></td>
<td><?= $batch->Batch_pattern;?></td>
<td><span class="filling-fast"><?= $batch->BatchfillingStatus;?></span><span class="timings">Timings: <?= $batch->Timeing;?></span>
</td>
</tr>
<?php }?>
</table>
</div>
<?php } ?>

<?php  if(isset($faq)&&count($faq)>0){ ?>
<div class="faq-box">
<h2 class="h2">FAQ</h2>
<div class="accordian">
<?php foreach($faq as $faqs){?>
<div class="accordion-trigger"><?=$faqs->faq_title;?></div>
<div class="accordion-panel">
<div class="content">
<?=$faqs->faq_description;?>
</div>
</div>
<?php }?>
</div>
</div>

<?php }?>

<?php if(isset($relatedcourses)&&count($relatedcourses)>0) {?>
<div class="all-courses">
<h3 class="h3 heading highlighted">Related Courses</h3>
<div class="lists">

<?php foreach($relatedcourses as $courses){?>
<a href="<?= $courses->course_slug;?>">
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
<?php }?>
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

<?php  if(isset($faq)&&count($faq)>0){ 
    echo '<script type="application/ld+json">
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [';
      foreach($faq as $faqs){
     $tittle=str_replace('"', "'", $faqs->faq_title);
     $desc=str_replace('"', "'", strip_tags($faqs->faq_description));
      echo '{
        "@type": "Question",
        "name": "'.$tittle.'",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "'.$desc.'"
        }
      },';
      }
      
      echo '] }
    </script>';
}
?>

<?php
$startd='';
$endd='';
if(isset($batches)&&count($batches)>0){

  foreach($batches as $batch){

    $startd=$batch->StartDate."09:00:00";
  $endd=$batch->EndDate."18:00:00";
    break;
  }

}
else{
  $startd=$dummydate->startdate;
  $endd=$dummydate->enddate;

}

echo '<script type="application/ld+json"> 
{
  "@context": "http://www.schema.org",
  "@type": "EducationEvent",
  "name": "'.$coursedata->course_name.'",
  "url": "'.base_url().$coursedata->course_slug.'",
  "description": "'.$coursedata->course_meta_description.'",
  "startDate": "'.$startd.'",
  "endDate": "'.$endd.'",
  "location": {
    "@type": "Place",
    "name": "Edoxi Training Institute ",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "Office 504, Bank Street Building Next to Burjuman Metro Station Exit 3 - Khalid Bin Al Waleed Rd ",
      "addressLocality": "Burjuman ",
      "addressRegion": "dubai",
      "postalCode": "122002",
      "addressCountry": "United Arab Emirates"
    }
  }
}
 </script>';?>

<?php include('includes/footer.php') ?>