<?php $page='accreditations'; ?>
<?php include('includes/header.php') ?>

<div class="accreditations subpage">
<div class="subpage-banner detailed">
<h1 class="h1 page-title text-center">Accreditations</h1>
<img src="assets/images/accreditations-banner.webp" width="1370" height="300" alt="accreditations-banner" class="subpage-banner-image"/>
</div>

<!--
<div class="container">
<div class="breadcrumbs">
<ul>

<li>Accreditations</li>
</ul>
</div>
</div>
-->

<section class="section-fluid">
<div class="container-fluid" data-aos="fade-up" data-aos-duration="700">
<div class="accreditations-page-items">
<?php foreach($accreditations as $accreditation){?>
<div class="box">
<div class="col1"><img src="<?=base_url();?>admin/assets/img/accreation/<?=$accreditation->accreditation_logo_big;?>" width="150" height="78" alt="dubai-knowledge" class="img"/>
</div>
<div class="col2">
<h3 class="h3 heading"><?=$accreditation->accreditation_name;?></h3>
<p class="p"><?=$accreditation->accreditation_description;?></p>
</div>
</div>
<?php }?>

</div>






</div>
</section>


</div>


<?php include('includes/footer.php') ?>