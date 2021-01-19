<?php $page='courses'; ?>

<?php include('header.php') ?>



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
<?php include('request-callback-form.php') ?>
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
<?php include('enquiry-form.php'); ?>
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

<?php if(isset($Testimonials)){?>
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
<?php }?>

</div>

<?php  if(isset($faq)&&count($faq)>0){ 
    echo '<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [';
      $count=0;
      foreach($faq as $faqs){
       if($count!=0)
       {
         echo ',';
       }
     $tittle=str_replace('"', "'", $faqs->faq_title);
     $desc=str_replace('"', "'", strip_tags($faqs->faq_description));
      echo '{
        "@type": "Question",
        "name": "'.$tittle.'",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "'.$desc.'"
        }
      }';
      $count++;
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

    $startd=$batch->StartDate."T09:00:00+04:00";
  $endd=$batch->EndDate."T18:00:00+04:00";
  echo '<script type="application/ld+json"> 
  {
    "@context": "http://www.schema.org",
    "@type": "EducationEvent",
    "name": "'.$coursedata->course_name.' Training Course",
    "url": "'.base_url().$coursedata->course_slug.'",
    "eventStatus": "https://schema.org/EventScheduled",
    "eventAttendanceMode": "https://schema.org/MixedEventAttendanceMode",
    "description": "'.$coursedata->course_meta_description.'",
    "startDate": "'.$startd.'",
    "endDate": "'.$endd.'",
    "location": {
      "@type": "Place",
      "name": "Edoxi Training Institute ",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Office 504, Bank Street Building Next to Burjuman Metro Station Exit 3 - Khalid Bin Al Waleed Rd ",
        "addressLocality": "Burjuman",
        "addressRegion": "dubai",
        "postalCode": "122002",
        "addressCountry": "United Arab Emirates"
      }
    }
  }
   </script>';
  }

}
else{

  $startd=$dummydate->startdate."T09:00:00+04:00";
  $endd=$dummydate->enddate."T18:00:00+04:00";
  echo '<script type="application/ld+json"> 
{
  "@context": "http://www.schema.org",
  "@type": "EducationEvent",
  "name": "'.$coursedata->course_name.' course",
  "url": "'.base_url().$coursedata->course_slug.'",
  "eventStatus": "https://schema.org/EventScheduled",
"eventAttendanceMode": "https://schema.org/MixedEventAttendanceMode",
  "description": "'.$coursedata->course_meta_description.'",
  "startDate": "'.$startd.'",
  "endDate": "'.$endd.'",
  "location": {
    "@type": "Place",
    "name": "Edoxi Training Institute ",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "Office 504, Bank Street Building Next to Burjuman Metro Station Exit 3 - Khalid Bin Al Waleed Rd ",
      "addressLocality": "Burjuman",
      "addressRegion": "dubai",
      "postalCode": "122002",
      "addressCountry": "United Arab Emirates"
    }
  }
}
 </script>';

}

?>
<?php if($temp==1)
{?>
<script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Review",
            "name": "Python Training and Courses in Dubai | Python Programming",
            "url": "https://www.edoxitraining.com/python-training-course-in-dubai",
            "image": "https://www.edoxitraining.com/assets/images/logo-regular.svg",
            "author":{"@type":"Person",
            "name":"Hiten kapdi"},
            "reviewBody": "I enrolled for Python Beginner's course. It was really a great learning experience with Mr. Jon BV. He is an amazing teacher. With his vast knowledge and easy to teach practice i was able to learn properly and easily. He understands student's requirement and teach accordingly. He gives proper time to each topic and revisits topics if he feels that student was not able to learn properly. The exercises given by him to complete during class and at home helped me a lot in learning. Would surely recommend Mr. Jon BV for Python. Also the staff at Edoxi is friendly, helpful and professional.",
            "reviewRating": {
                "@type": "Rating",
                "ratingValue": "5"
            },
            "itemReviewed": {
                "@type": "LocalBusiness",
                "name": "Python Training and Courses in Dubai | Python Programming",
                "image": "https://www.edoxitraining.com/assets/images/logo-regular.svg",
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": "Office 504, Bank Street Building Next to Burjuman Metro Station Exit 3 - Khalid Bin Al Waleed Rd ",
                    "addressLocality": "Burjuman",
                    "addressRegion": "dubai",
                    "postalCode": "122002",
                    "telephone": "+97143801666",
                    "addressCountry": {
                        "@type": "Country",
                        "name": "United Arab Emirates"
                    }
                }
            }
        }
    </script>
<?php } else if($temp==2){?>
  <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Product",

    "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.9/5",
    "reviewCount": "485"
  },

  "description": "Learn AutoCAD 2D Course to create 2D designs from concept to construction with our expert-led training from our Authorised Autodesk Training Centre in Dubai.",
  "name": "AutoCAD 2D Training in Dubai",
  "image": "https://www.edoxitraining.com/assets/images/logo-regular.svg",
  
  "review": [
    {
      "@type": "Review",
      "author":{"@type":"Person",
            "name":"Danish"},
      "datePublished": "2020-04-21",
      "reviewBody": "The first course I took at Edoxi Institute was AutoCAD 2D, and because of the quality of training provided, i decided to take the Revit Architecture training there it self. The instructor Mr. Shaheen is very knowledgeable and always prepared to help even with material outside the scope of this course. Overall, I had a great experience in both AutoCAD and Revit and it vastly improved my skills using both of these programs in a short time of training.",
      "name": "quality of training provided",
      "reviewRating": {
        "@type": "Rating",
        "bestRating": "5",
        "ratingValue": "5",
        "worstRating": "1"
      }
    },
    {
      "@type": "Review",
      "author":{"@type":"Person",
            "name":""Reesa Babu"},
      "datePublished": "2020-03-25",
      "reviewBody": " did a refreshing AutoCAD course ( civil) under Mr.Sujith and had a good learning experience. He was very supportive, helpful and friendly. Timings of the classes are flexible too. I Highly recommend this institute.",
      "name": "good learning experience",
      "reviewRating": {
        "@type": "Rating",
        "bestRating": "5",
        "ratingValue": "4.5",
        "worstRating": "1"
      }
    }
  ]
}
</script>
<?php } else{?>

  <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "address": {
                    "@type": "PostalAddress",
                    "streetAddress": "Office 504, Bank Street Building Next to Burjuman Metro Station Exit 3 - Khalid Bin Al Waleed Rd ",
                    "addressLocality": "Burjuman",
                    "addressRegion": "dubai",
                    "postalCode": "122002",
                    "telephone": "+97143801666",
                    "addressCountry": {
                        "@type": "Country",
                        "name": "United Arab Emirates"
                    }
  },
  "description": "Leading educational training institute in Dubai offering extensive career-orientated courses including Computer, Accounting, Language and Management Courses for individuals and corporates by highly experienced trainers. Call us at 043801666  to join our courses.",
  "name": "Edoxi Training Institute",
  "telephone": "+97143801666",
  "products":{
  "@type": "Product",
    "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.9/5",
    "reviewCount": "485"
     },

  "description": "Learn AutoCAD 2D Course to create 2D designs from concept to construction with our expert-led training from our Authorised Autodesk Training Centre in Dubai.",
  "name": "AutoCAD 2D Training in Dubai",
  "image": "https://www.edoxitraining.com/assets/images/logo-regular.svg",
  
  "review": [
    {
      "@type": "Review",
      "author":{"@type":"Person",
            "name":"Abdul Hadi"},
      "datePublished": "2020-04-21",
      "reviewBody": "The 3D MAX course here along with PG in Adob Photoshop was great experience and teaching methods are really good. Given a lot of time to work and study and the faculties are polite. Definitely worth with it, taught me 3D MAX in 30 hr. thank you so much Mr. Sujith for your guidance.",
      "reviewRating": {
        "@type": "Rating",
        "bestRating": "5",
        "ratingValue": "5",
        "worstRating": "1"
      }
    },
    {
      "@type": "Review",
      "author":{"@type":"Person",
            "name":"Swathi Prathap"},
      "datePublished": "2020-03-25",
      "reviewBody": "The 3D Max course here along with Post Production in Adobe Photoshop was a great experience and the teaching methods are really good. Given a lot of time to work and study and the faculties are very polite. Definitely worth it, taught me 3Ds MAX in 30 hours. Thank you so much Mr. Sujith for your guidance",
      "name": "3D Max course here along with Post Production",
      "reviewRating": {
        "@type": "Rating",
        "bestRating": "5",
        "ratingValue": "4.5",
        "worstRating": "1"
      }
    }
    ,
    {
      "@type": "Review",
      "author":{"@type":"Person",
            "name":"Shraddha Kargutkar"},
      "datePublished": "2020-03-25",
      "reviewBody": "I did my Auto cad 2d , 3D and 3D max course in Edoxi institute. Training with designed exercises made the entire courses easy to learn. Mr. Sujith Sir explained all concepts nicely. I would recommend this institute for leaning the Designing software.",
      "name": "Training with designed exercises",
      "reviewRating": {
        "@type": "Rating",
        "bestRating": "5",
        "ratingValue": "4.5",
        "worstRating": "1"
      }
    }
    ,
    {
      "@type": "Review",
      "author":{"@type":"Person",
            "name":"Sajin Mathew"},
      "datePublished": "2020-03-25",
      "reviewBody": "Edoxi Training Institute  is the best with highly experienced teachers. I studied 3ds max under Mr. Sujith Sir , he have a good knowledge in 3ds max and other softwares too. He makes sure that his students clear all the doubt before the end of the course. Thanks Sujith Sir .",
      "name": "highly experienced teachers",
      "reviewRating": {
        "@type": "Rating",
        "bestRating": "5",
        "ratingValue": "4.5",
        "worstRating": "1"
      }
    }
  ]
  }
}
</script>
<?php }?>
<?php include('footer.php') ?>