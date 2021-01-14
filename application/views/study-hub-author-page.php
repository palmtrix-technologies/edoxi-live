<?php $page='study-hub'; ?>
<?php include('includes/header.php') ?>

<div class="study-hub subpage">
<div class="subpage-title">
<h1 class="h1 page-title">Study Hub</h1>
</div>

<div class="container">
<div class="breadcrumbs">
<ul>
<li><a href="<?=base_url();?>">Home</a></li>
<li><a href="<?=base_url();?>study-hub">Study Hub</a></li>
<li><?=$author->Author_name;?></li>
</ul>
</div>
</div>

<div class="container search">
<div class="search-box">
<form action="" class="form">
  <input type="text" placeholder="Search here" name="search" class="search-field">
  <button type="submit" class="search-button"><img src="../../assets/images/search-icon.svg" width="22" height="24" alt="Search Icon" class="search-icon"/></button>
</form>
</div>
</div>



<section>
<div class="container">
<div class="article-lists">
<h2 class="h2 heading author-name"><?=$author->Author_name;?></h2>
<div class="lists">


<?php foreach($author_articles as $populars){ ?>
<div class="box">
<a href="<?=base_url().'studyhub-detail/'.$populars->slug?>">
<img src="<?=base_url().'admin/assets/img/studyhub/'.$populars->image;?>" class="img" alt="<?=$populars->image_alt?>" width="380" height="195">
<div class="details-block">
<p class="writer"><img src="../../assets/images/user-icon-orange.svg" alt="article1" width="10" height="14"><?=$populars->Author_name?></p>
<h3 class="h3 heading"><?=$populars->Tittle?></h3>
<p class="p"><?=$populars->ShortDescription?></p>
</div>
</a>
</div>
<?php }?>

</div>
</div>

</div>
</section>



</div>


<?php include('includes/footer.php') ?>