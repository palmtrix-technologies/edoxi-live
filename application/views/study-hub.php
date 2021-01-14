<?php $page='study-hub'; ?>
<?php include('includes/header.php') ?>
<style>
.hidden{display:none;}
</style>
<script type="text/javascript">
	var s_hub = <?php echo json_encode($std_search); ?>;
	
</script>
<div class="study-hub subpage">
<!--<div class="subpage-title">
<h1 class="h1 page-title">Study Hub</h1>
<p class="caption">Top Study Secrets, Expert Tips, Information, Event Updates and more</p>
</div> -->

<!--
<div class="container">
<div class="breadcrumbs">
<ul>
<li>Study Hub</li>
</ul>
</div>
</div>
-->

<div class="subpage-banner detailed">
<div class="wrapper">
<div class="contents">
<h1 class="h1 page-title text-center">Study Hub</h1>
<p class="caption text-center">Top Study Secrets, Expert Tips, Information, Event Updates and more</p>
</div>
</div>
<img src="assets/images/study-hub-banner.webp" width="1370" height="300" alt="accreditations-banner" class="subpage-banner-image"/>
</div>

<section class="section-fluid main-recommended-article">
<div class="container two-column-layout" data-aos="fade-up" data-aos-duration="700">
<div class="col1">
<div class="main-article">
<a href="studyhub-detail/<?=$main->slug?>">
<img src="<?=base_url().'admin/assets/img/studyhub/'.$main->image;?>" alt="<?=$main->image_alt?>" width="550" height="300" class="img">
<div class="details">
<h3 class="h3 heading"><?=$main->Tittle;?></h3>
<p class="p writer"><img src="assets/images/user-icon-orange.svg" alt="article1" width="10" height="14"><?=$main->Author_name;?></p>
<p class="description"><?=$main->ShortDescription?></p>
</div>
</a>
</div>
</div>
<div class="col2">
<div class="search-box">
<form action="" class="form">
<input type="text" placeholder="Search here" required="required" name="search" class="search-field search-input_s_hub">
<ul id="autocomplete-results_s_hub" class="autocomplete-results">
</ul>
<a href="#" id="search-btn" class="search-button"><img src="assets/images/search-icon-blue.svg" width="22" height="24" alt="Search Icon" class="search-icon"/></a>
</form>
</div>
<div class="sidebar-box recommended-articles">
<h3 class="h3 heading orange-bg">Recommended Articles</h3>
<div class="lists">
<ul>
<?php foreach($recomment as $data){ ?>
	<li><a href="studyhub-detail/<?=$data->slug?>"><?=$data->Tittle?></a></li>
<?php }?>
	

</ul>
</div>
</div>
</div>

</div>
</section>

<section class="section-fluid most-popular-recent">
<div class="container" data-aos="fade-up" data-aos-duration="700">
<div class="article-lists">
<h2 class="h2 heading">Most Popular</h2>
<div class="lists">
<?php foreach($popular as $populars){ ?>
<div class="box">
<a href="studyhub-detail/<?=$populars->slug?>">
<img src="<?=base_url().'admin/assets/img/studyhub/'.$populars->smallimg;?>" class="img" alt="<?=$populars->image_alt?>" width="380" height="195">
<div class="details-block">
<p class="writer"><img src="assets/images/user-icon-orange.svg" alt="article1" width="10" height="14"><?=$populars->Author_name?></p>
<h3 class="h3 heading"><?=$populars->Tittle?></h3>
<p class="p"><?=$populars->ShortDescription?></p>
</div>
</a>
</div>
<?php }?>
</div>
</div>

<div class="article-lists" data-aos="fade-up" data-aos-duration="700">
<h2 class="h2 heading">Recent</h2>
<div class="lists">

<?php $count=0; $classname=""; foreach($recent as $data){ if($count>=9){$classname="hidden";} else{$classname="";} $count++; ?>
<div class="box <?=$classname?>">
<a href="studyhub-detail/<?=$data->slug?>">
<img src="<?=base_url().'admin/assets/img/studyhub/'.$data->smallimg;?>" class="img" alt="article1" width="380" height="195">
<div class="details-block">
<p class="writer"><img src="assets/images/user-icon-orange.svg" alt="article1" width="10" height="14"><?=$data->Author_name?></p>
<h3 class="h3 heading"><?=$data->Tittle?></h3>
<p class="p"><?=$data->ShortDescription?></p>
</div>
</a>
</div>
<?php }?>

</div>
<div class="btn-wrapper text-center">
<button id="loadmorebtn" class="btn blue-bg" onClick="Loadmore();">Load More</button>
</div>
</div>
</div>
</section>



</div>

<script>
	function Loadmore()
{
 
  var x=document.getElementsByClassName("box hidden");
  var i;
  if(x.length<9)
  {
	for (i = 0; i < x.length; i++) {
		x[i].className= " box" ;
	}
	document.getElementById("loadmorebtn").className="btn blue-bg hidden";
  }
  else{
	for (i = 0; i < 9; i++) {
		x[i].className= " box" ;
	} 
  }
  

  
}

// variables
var search_input_s_hub = document.querySelector(".search-input_s_hub");
var results_s_hub, s_hub_show = [];
var autocomplete_results_s_hub = document.getElementById("autocomplete-results_s_hub");
var input_val_s_hub;


// functions

function autocomplete_s_hub(val1) {
  var s_hub_returned1 = [];


  for (i = 0; i < s_hub.length; i++) {

    if(s_hub[i].Tittle.toLowerCase().includes(val1))
    {
      s_hub_returned1.push(s_hub[i]);
    }

  }
  return s_hub_returned1;
}

// events

if(Boolean(search_input_s_hub)) { // This Boolean is important. Its Removes console error if the element is not in other the pages
  search_input_s_hub.onkeyup = function(e) {
    input_val_s_hub = this.value.toLowerCase();
 
  if (input_val_s_hub .length > 0) {
    autocomplete_results_s_hub.innerHTML = "";
    s_hub_show = autocomplete_s_hub(input_val_s_hub);

    for (i = 0; i < s_hub_show.length; i++) {
      autocomplete_results_s_hub.innerHTML +=
        "<li id=" +
        s_hub_show[i].slug +
        ' class="list-item">' +
        s_hub_show[i].Tittle +
        "</li>";
    }
    autocomplete_results_s_hub.style.display = "block";
  } else {
    s_hub_show = [];
    autocomplete_results_s_hub.innerHTML = "";
  }
};

// Get the element, add a click listener...
document.getElementById("autocomplete-results_s_hub").addEventListener("click", function(e) {
    // e.target is the clicked element!
    // If it was a list item
    if (e.target && e.target.nodeName == "LI") {
      // List item found!  Output the value!
      console.log(e.target.innerHTML);
	  search_input_s_hub.value = e.target.innerHTML;
	  document.getElementById("search-btn").href="studyhub-detail/"+e.target.id; 
      autocomplete_results_s_hub.innerHTML = null; //empty the value
    }
  });
}

</script>
<?php include('includes/footer.php') ?>