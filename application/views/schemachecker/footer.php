<footer class="site-footer">
<div class="block1 fluid">
<div class="container-fluid"  data-aos="fade-up" data-aos-duration="700">
<div class="logo"><img src="<?=base_url();?>assets/images/logo-reverse.svg" width="186" height="65" alt="address-icon" class="footer-logo"/></div>
<div class="address">
<img src="<?=base_url();?>assets/images/address-icon-yellow.svg" width="15" height="25" alt="address-icon" class="footer-logo"/>
<p>Office 504, Bank Street Building<br>
Next to Burjuman Metro Station Exit 3<br>
Khalid Bin Al Waleed Rd<br>
Dubai United Arab Emirates</p></div>
<div class="contacts">
<div class="phone">
<div class="numbers"> 
<img src="<?=base_url();?>assets/images/phone-icon-yellow.svg" width="20" height="25" alt="Edoxi Header Logo" class="footer-logo"/><a href="tel:043801666">04 380 1666</a>
</div>
<div class="numbers">
<img src="<?=base_url();?>assets/images/whatsapp-icon-yellow.svg" width="20" height="25" alt="Edoxi Header Logo" class="footer-logo"/><a href="tel:0581236600">058 123 6600</a>
</div>
</div>
<div class="email">
<img src="<?=base_url();?>assets/images/email-icon-yellow.svg" width="21" height="21" alt="Edoxi Header Logo" class="footer-logo"/>
<div class="email-box"><a href="mailto:info@edoxitraining.com" class="email">info@edoxitraining.com</a></div>
</div>

</div>
<div class="social-medias">
<a href="https://twitter.com/EdoxiTraining" target="_blank"><img src="<?=base_url();?>assets/images/twitter-icon-white.svg" width="28" height="30" alt="twitter" class="img"/></a>
<a href="https://edoxitraining.tumblr.com/" target="_blank"><img src="<?=base_url();?>assets/images/tumbler-icon-white.svg" width="17" height="30" alt="tumbler" class="img"/></a>
<a href="https://www.facebook.com/edoxitraining/" target="_blank"><img src="<?=base_url();?>assets/images/facebook-icon-white.svg" width="17" height="30" alt="facebook" class="img"/></a>
<a href="https://www.linkedin.com/company/edoxi-traning-institution-dubai/" target="_blank"><img src="<?=base_url();?>assets/images/linkedin-icon-white.svg" width="27" height="32" alt="linkedin" class="img"/></a>
</div>
</div>
</div>

<div class="block2" data-aos="fade-up" data-aos-duration="700">
<div class="footer-links">
<div class="links-box">
<h3 class="h3">Quick<br> Links</h3>
<ul>
<li><a href='<?=base_url();?>'>Home</a></li>
<li><a href='<?=base_url();?>about-us'>About Us</a></li>
<li><a href='<?=base_url();?>courses'>Courses</a></li>
<li><a href='<?=base_url();?>accreditations'>Accreditations</a></li>
<li><a href='<?=base_url();?>case-studies'>Case Studies</a></li>
<li><a href='<?=base_url();?>study-hub'>Study Hub</a></li>
<li><a href='<?=base_url();?>contact-us'>Contact Us</a></li>
<li><a href='<?=base_url();?>sitemap'>Sitemap</a></li>
</ul>
</div>


<?php foreach($footer_menus as $subcat ){
    $subject=$subcat->subcategory_name;
    $result = preg_replace('%^([^ ]+?)( )(.*)$%', '\1</br>\3', $subject);
    if (!strpos($result, 'Course')) { 
       
        // $result=$result." courses";
         }
    ?>
    <div class="links-box
    ">
<h3 class="h3"><?=$result;?></h3>
<ul>
<?php 
    $courses = $this->mainmodel->get_footer_course($subcat->subcategory_id);
    foreach ($courses as $course) {
        $subject1=$course->course_name;
    // $result1 = preg_replace('%^([^ ]+?)( )(.*)$%', '\1</br>\5', $subject1);
    // var_dump($result1);
    ?>
<li><a href='<?=$course->course_slug?>'><?=$course->course_name?></a></li>
    <?php }?>
</ul>
</div>
<?php }?>


</div>
</div>
<div class="block3">
<p class="p copyright">©<span id="copyright_year"></span>. All rights reserved by Edoxi Training Institute</p> 
</div>
</footer>
<a class="back-to-top" onclick='window.scrollTo({top: 0, behavior: "smooth"});'><img src="<?=base_url();?>assets/images/arrow-top.svg" alt="back-to-top" class="arrow-top"/></a>

<!-- script loading condition for local and remote-->

<?php
$url =  $_SERVER['SERVER_NAME'];

if(isset($page_type))
{
$pagename =  $page_type;
}
else
{
    $pagename='';
}
if(isset($_SERVER['HTTPS']))
{
if($pagename == "home") {
    echo '<script src="'.base_url().'assets/js/home.min.js" async></script>
    <script src="'.base_url().'assets/js/globals.min.js" async></script>
    '; 
    }
    else if($pagename == "gallery") {
    echo '<script src="'.base_url().'assets/js/gallery.min.js" async></script>
    <script src="'.base_url().'assets/js/globals.min.js" async></script>'; 
    }
    else if($pagename == "courses") {
    echo '<script src="'.base_url().'assets/js/globals.min.js" async></script>
    <script src="'.base_url().'assets/js/courses.min.js" async></script>'; 
    }
    else if($pagename == "course-detail-page") {
    echo '<script src="'.base_url().'assets/js/globals.min.js" async></script>
    <script src="'.base_url().'assets/js/courses.min.js" async></script>'; 
    }
    else if($pagename == "corporate-training") {
    echo '<script src="'.base_url().'assets/js/globals.min.js" async></script>
    <script src="'.base_url().'assets/js/corporate-training.min.js" async></script>'; 
    }
    else {
    echo '<script src="'.base_url().'assets/js/globals.min.js" async></script>'; 
    }
}
else{
    if($pagename == "home") {
        echo '<script src="'.base_url().'assets/js/home.js" async></script>
        <script src="'.base_url().'assets/js/globals.js" async></script>
        '; 
        }
        else if($pagename == "gallery") {
        echo '<script src="'.base_url().'assets/js/gallery.js" async></script>
        <script src="'.base_url().'assets/js/globals.js" async></script>'; 
        }
        else if($pagename == "courses") {
        echo '<script src="'.base_url().'assets/js/globals.js" async></script>
        <script src="'.base_url().'assets/js/courses.js" async></script>'; 
        }
        else if($pagename == "course-detail-page") {
            echo '<script src="'.base_url().'assets/js/globals.min.js" async></script>
            <script src="'.base_url().'assets/js/courses.min.js" async></script>'; 
        }
        else if($pagename == "corporate-training") {
        echo '<script src="'.base_url().'assets/js/globals.js" async></script>
        <script src="'.base_url().'assets/js/corporate-training.js" async></script>'; 
        }
        else {
        echo '<script src="'.base_url().'assets/js/globals.js" async></script>'; 
        }
}

?>
<script src="<?=base_url()?>assets/js/courses.js" async></script>
<!-- 
<script type='application/ld+json'>
{"@context":"http://www.schema.org",
"@type":"product","brand":"Edoxi Training Institute Dubai","name":"Edoxi Training Institute Dubai",
"aggregateRating":{"@type":"aggregateRating","url":"https://www.google.com.au/search?biw=1366&bih=621&ei=sWzfXfrpNsj1rQH6nYHgAQ&q=edoxi+training+institute&oq=edoxi+tra&gs_l=psy-ab.3.0.0l9.85873.87997..89463...0.0..0.336.2808.0j1j9j1......0....1..gws-wiz.......0i67j0i10j0i131i273j0i131j0i273j0i3.3dO_3oc9bHQ#lrd=0x3e5f43a3936c24bb:0x71a3463c8e4c9b63,1,,,",
"ratingValue":"4.9/5","reviewCount":"485"}}
</script> -->

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '2888493188088859');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=2888493188088859&ev=PageView&noscript=1"
/></noscript>
<!-- tidio -->
<script src="//code.tidio.co/lvtupatdowbgjx5su5cnvbnxhot0xgde.js" async></script>



</body>
</html>