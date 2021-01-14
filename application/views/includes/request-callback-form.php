<style>
 .validation {transition:all 0.3s linear 0s;position:relative;top:-3px;height:0;overflow:hidden;opacity: 0; color:#FD6F01;font-size: 14px;}   
 .show {height:auto;opacity:1;top:0;margin-bottom: 15px}
</style>

<form class="request-callback-form" action="<?=base_url();?>send-enquiry" method="post"  onsubmit="validation(); return false" novalidate>
<div class="input-container">
<input type="text" name="name" placeholder="Name" id="rcname" >
<div class='validation'>Please enter the Name</div>
<div class='validation'>Numbers not allowed in Name Field</div>
</div>
<div class="input-container">
<input type="email" name="email" placeholder="E-mail" id="rcemail" required="required">
</div>
<div class="input-container phone">
<input type="text" name="countrycode" placeholder="+971" class="phone-number">
<input type="text" name="phone" placeholder="Phone Number" class="phone-number">
</div>
<div class="input-container">
<input type="text" name="interest" placeholder="Interested In" id="interest" required="required">
<input type="hidden" name="message"   id="message">
<input type="hidden" name="companyname" id="companyname">
<input type="hidden" name="eng_type" value="call-back">	
</div>
<p class="btn-wrapper"><input type="submit"  value="Submit" id="rcsubmit" class="btn yellow-bg"></p>
</form>

<script>
function validation() {
var name = document.getElementById('name');
var namevalue = name.value;
if (name.value=='') {
    name.nextElementSibling.classList.add('show');
	name.nextElementSibling.nextElementSibling.classList.remove('show');
	document.myform.name.focus();
    return false;
  }
  else if (!isNaN(namevalue)) {
    name.nextElementSibling.nextElementSibling.classList.add('show');
    name.nextElementSibling.classList.remove('show');	
	document.myform.name.focus();
    return false;	
  }  
  else {
    name.nextElementSibling.nextElementSibling.classList.remove('show'); 
	name.nextElementSibling.classList.remove('show');	
  }	 
alert("hi")

}   
</script>