<?php $page='testimonials'; ?>
<?php include('includes/header.php') ?>

<!-- need change -->
<style>
.hidden{display:none;}
</style>
<div class="testimonials subpage">
<div class="subpage-banner detailed">
<h1 class="h1 page-title text-center">Testimonials</h1>
<img src="assets/images/testimonials-banner.webp" width="1370" height="300" alt="accreditations-banner" class="subpage-banner-image"/>
</div>

<!--
<div class="container">
<div class="breadcrumbs">
<ul>
<li>Testimonials</li>
</ul>
</div>
</div>
-->

<section class="section-fluid">
<div class="container-fluid" data-aos="fade-up" data-aos-duration="700">


<div class="select-course">
<input type="text" id="txt_coursesearch" autocomplete="off" placeholder="Search Testimonials for a Course" name="search" class="search-field search-input3">
<ul id="autocomplete-results3" class="autocomplete-results">
</ul>

</div>

<div class="testimonials-lists">
<?php
$count=0;
$hiddenclass="";
foreach($testimonials as $testimonial){ if($count<60){$hiddenclass="";} else{$hiddenclass="hidden";} $count++;?>
<div class="box boxval <?=$hiddenclass?>"  data-id="<?=$testimonial->course_name;?>">
<div class="message"> <img src="assets/images/testimonials-quote.svg" width="19" height="17" alt="testimonials-quote" class="img quote"/>
<p class="p"><?=$testimonial->testimonial_review;?></p>
</div>
<div class="details-link">
<div class="details">
<div class="name"><?=$testimonial->testimonial_name;?></div>
<div class="course orange-text"><?=$testimonial->course_name;?></div>
</div>
<div class="link">
  <a href="">

    <?php if($testimonial->testimonial_sourse=="laimoon"){ ?>

    <img src="assets/images/testimonials-list-laimoon.svg" width="30" height="30" alt="testimonials-quote" class="img"/>
    <?php } else if($testimonial->testimonial_sourse=="glassdoor"){ ?>
      <img src="assets/images/testimonials-list-glassdoor.svg" width="30" height="30" alt="testimonials-quote" class="img"/>
      <?php } else if($testimonial->testimonial_sourse=="facebook"){ ?>
        <img src="assets/images/testimonials-list-faceboook.svg" width="30" height="30" alt="testimonials-quote" class="img"/>
        <?php } else if($testimonial->testimonial_sourse=="edarabia"){ ?>
          <img src="assets/images/testimonials-list-edarabia.svg" width="30" height="30" alt="testimonials-quote" class="img"/>
      <?php } else if($testimonial->testimonial_sourse=="goodfirms"){ ?>
        <img src="assets/images/testimonials-list-goodfirms.svg" width="30" height="30" alt="testimonials-quote" class="img"/>
        <?php } else{ ?>
          <img src="assets/images/testimonials-list-google.svg" width="30" height="30" alt="testimonials-quote" class="img"/>
      <?php }  ?>


  </a>
</div>
</div>
</div>
<?php } ?>
</div>
<div class="btn-wrapper text-center">
<button id="loadmorebtn" class="btn blue-bg" onClick="Loadmore();">Load More</button>
</div>
</div>
</section>


</div>

<script>
function chnagemycourse()
{
  var course = document.getElementById("txt_coursesearch").value;
  var x=document.getElementsByClassName("boxval");
  var i;
  for (i = 0; i < x.length; i++) {
    x[i].className+= " hidden" ;
  }
  var y=document.querySelectorAll('[data-id="'+course+'"]');
  
  var j;
  if(y.length<60)
  {
    for (j = 0; j < y.length; j++) {
    y[j].className="box boxval";
    }
  
  }
  else{
    for (j = 0; j < 60; j++) {
    y[j].className="box boxval";
    }
    document.getElementById("loadmorebtn").className="btn blue-bg";

  }

  

  


}

function Loadmore()
{
  var course = document.getElementById("txt_coursesearch").value;
  if(course.length>0)
  {
  var x=document.getElementsByClassName("boxval");
  var i;
  for (i = 0; i < x.length; i++) {
    x[i].className+= " hidden" ;
  }
  var y=document.querySelectorAll('[data-id="'+course+'"]');
  
  var j;
  for (j = 0; j < y.length; j++) {
    y[j].className="box boxval";

  
  }

  }
  else{
    var x=document.getElementsByClassName("boxval");
    var i;
  for (i = 0; i < x.length; i++) {
    x[i].className= " box boxval" ;
  }

  }
  

  document.getElementById("loadmorebtn").className="btn blue-bg hidden";
}
</script>

<?php include('includes/footer.php') ?>
