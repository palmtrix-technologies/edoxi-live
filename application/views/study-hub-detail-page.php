<?php $page='study-hub'; ?>
<?php include('includes/header.php') ?>

<div class="study-hub subpage">
<div class="subpage-title">
<!-- <p class="p page-title">Study Hub</p> -->
</div>

<div class="container">
<div class="breadcrumbs">
<ul>
<li><a href="<?=base_url();?>">Home</a></li>
<li><a href="<?=base_url();?>study-hub">Study Hub</a></li>
<li><?=$studyhub->Tittle;?></li>
</ul>
</div>
</div>

<div class="container search" style="display:none">
<div class="search-box">
<form action="" class="form">
  <input type="text" placeholder="Search here" name="search" class="search-field">
  <button type="submit" class="search-button"><img src="../assets/images/search-icon-blue.svg" width="22" height="24" alt="Search Icon" class="search-icon"/></button>
</form>
</div>
</div>

<section class="section">
<div class="container two-column-layout">
<div class="col1">
<div class="main-article-detailed">
<div class="details">
<p class="month"><?=$studyhub->Createddatetime;?></p>
<p class="p writer"><img src="../assets/images/user-icon-orange.svg" alt="article1" width="10" height="14"><?=$studyhub->Author_name;?></p>
</div>
<h1 class="h1 heading"><?=$studyhub->Tittle;?></h1>
<img src="<?=base_url().'admin/assets/img/studyhub/'.$studyhub->image;?>" alt="article1" width="550" height="300" class="img">
<div class="content">
<?php foreach($sectionsdata as $sections){

if($sections->Classname!="Normal")
{
?>
<div class="<?= $sections->Classname;?>">
<?= $sections->Content;?>

</div>

<?php } else { ?>
   
    <?= $sections->Content;?>
   
<?php }  } ?>
<div class="tag-and-name" >
<div class="tags" >
<img src="../assets/images/tag-orange.svg" alt="article1" width="12" height="12" />
<div class="tags-list">
<a href="#">Autodesk Revit Architecture,</a>
<a href="#">Revit Structure</a>
</div>
</div>
<p class="name"><img src="../assets/images/user-icon-orange.svg" alt="article1" width="10" height="14"><a href="../studyhub/author/<?=$studyhub->author_slug;?>"><?=$studyhub->Author_name;?></a></p>
</div>
<div class="writer-details">
<img src="<?=base_url().'admin/assets/img/studyhub/'.$studyhub->profile_image;?>" alt="article1" width="140" height="150">
<div class="name-description">
<p class="name"><?=$studyhub->Author_name;?></p>
<p class="description"><?=$studyhub->profile;?></p>
</div>
</div>
</div>

</div>
</div>
<div class="col2">
<div class="sidebar-box">
<h3 class="h3 heading orange-bg">Related Posts</h3>
<div class="lists">
<ul>
<?php foreach($related as $data){?>
	<li><a href="../studyhub-detail/<?=$data->slug?>"><?=$data->Tittle;?></a></li>
<?php }?>
</ul>
</div>
</div>
<div class="sidebar-box">
<h3 class="h3 heading blue-bg">Recent Posts</h3>
<div class="lists">
<ul>

<?php foreach($recent as $data){?>
	<li><a href="../studyhub-detail/<?=$data->slug?>"><?=$data->Tittle;?></a></li>
<?php }?>
</ul>
</div>
</div>
</div>

</div>
</section>

<section class="section reply-form">
<div class="container">
<div class="form-box">
<h4 class="h4 heading">Leave a Reply</h4>
<form action="" class="form-container">
<div class="input-group block sm2">
<div class="input-container"><input type="text" name="name" placeholder="Name" id="name" required="required">
</div>
<div class="input-container">
<input type="email" name="email" placeholder="E-mail" id="email" required="required">
</div>
</div>

<div class="input-group block sm2">
<div class="input-container">
<input type="contactnumber" placeholder="Contact Number" id="contactnumber" name="contactnumber">
</div>
<div class="input-container">
<input type="text" name="city" placeholder="City" id="name" required="required">
</div>
</div>


<div class="input-container">
<textarea name="comment" id="comment" cols="30" rows="5"></textarea>
</div>
<p class="btn-wrapper"><input type="submit" name="" value="Post Comment" id="submit" class="btn orange-bg"></p>
</form>
</div>
</div>
</section>






</div>


<?php include('includes/footer.php') ?>