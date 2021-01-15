<style>
.validation {transition:all 0.3s linear 0s;position:relative;top:-3px;height:0;overflow:hidden;opacity: 0; color:#ffda23;font-size: 14px;}
.show {height: auto; opacity: 1; top: 0;margin-bottom: 0; margin-top: .5rem;}
</style>


<form id="course-enquiry-form" action="<?=base_url();?>send-enquiry" method="post" name="myform" class="form-container" onsubmit="validation(); return false" novalidate>
<div class="input-container">
<input type="text" name="name" placeholder="Name" id="name" class="input">
<div class='validation'>Please enter the Name</div>
<div class='validation'>Numbers not allowed in Name Field</div>
</div>
<div class="input-container">
<input type="email" name="email" placeholder="E-mail" id="email" class="input">
<div class='validation'>Please enter E-mail</div>
<div class='validation'>Please enter a Valid E-mail</div>
</div>
<div class="input-container phone">
<input type="text" name="countrycode" placeholder="+971" class="phone-number">
<input type="text" name="phone" placeholder="Phone Number" class="phone-number">
</div>
<div class="input-container">
<input type="hidden" name="interest"  id="interest">
<input type="hidden" name="companyname" id="companyname">

<input type="hidden" name="eng_type" value="contact">
<textarea name="message" id="" cols="30" rows="5" placeholder="Message"></textarea>
<div id="validation" class='validation'>Please enter Message</div>
</div>
<p class="btn-wrapper"><input type="submit" name="efsubmit" value="Submit" id="submit" class="btn yellow-bg"></p>									
</form>

<script>
function validation() {

// checking all fields are null
let inputs = document.getElementsByClassName('input');
for(i=0;i<inputs.length;i++) {
if(inputs[i].value===''){
inputs[i].nextElementSibling.classList.add('show');
}	
	else {
	inputs[i].nextElementSibling.classList.remove('show');
	}
}

// validation for name
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

// Validatin for Email
let emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i // regexp to check email
let checkemail=emailfilter.test(document.myform.email.value); // setting the email field to validate

let email = document.getElementById('email');
let emailvalue = email.value;
if (emailvalue === "" ) {
email.nextElementSibling.classList.add('show');
email.nextElementSibling.nextElementSibling.classList.remove('show');
document.myform.email.focus();
return false;
}
else if(checkemail==false )
{
email.nextElementSibling.nextElementSibling.classList.add('show');
email.nextElementSibling.classList.remove('show');
document.myform.email.focus();
return false;
}	
else {
email.nextElementSibling.classList.remove('show');  
email.nextElementSibling.nextElementSibling.classList.remove('show');  
}

// validation for phone number
let phonenumber = document.getElementById('phonenumber');
let phonenumbervalue = phonenumber.value;
if (phonenumbervalue=='') {
    phonenumber.nextElementSibling.classList.add('show');
				phonenumber.nextElementSibling.nextElementSibling.classList.remove('show');
				phonenumber.nextElementSibling.nextElementSibling.nextElementSibling.classList.remove('show');	
				document.myform.phonenumber.focus();
    return false;
  }
  else if (isNaN(phonenumbervalue)) {
    phonenumber.nextElementSibling.nextElementSibling.classList.add('show');
  		phonenumber.nextElementSibling.nextElementSibling.nextElementSibling.classList.remove('show');
    phonenumber.nextElementSibling.classList.remove('show');
				document.myform.phonenumber.focus();
			return false;
  }
  else if (phonenumbervalue.length<6) {
    phonenumber.nextElementSibling.nextElementSibling.nextElementSibling.classList.add('show');
    phonenumber.nextElementSibling.nextElementSibling.classList.remove('show');     phonenumber.nextElementSibling.classList.remove('show');		
				document.myform.phonenumber.focus();
				return false;
  }  
  else {
				phonenumber.nextElementSibling.nextElementSibling.nextElementSibling.classList.remove('show');
    phonenumber.nextElementSibling.nextElementSibling.classList.remove('show'); 
				phonenumber.nextElementSibling.classList.remove('show');	
  }	

// Ajax starts here



}


</script>