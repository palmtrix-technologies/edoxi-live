<style>
.validation {transition:all 0.3s linear 0s;position:relative;top:-3px;height:0;overflow:hidden;opacity: 0; color:#ffda23;font-size: 14px;}
.show {height: auto; opacity: 1; top: 0;margin-bottom: 0; margin-top: .5rem;}
</style>

<form id="form2" class="request-callback-form" action="<?=base_url();?>send-enquiry" method="post"> 
<div class="input-container">
<input type="text" name="name" placeholder="Name" id="cbname" required="required">
</div>
<div class="input-container">
<input type="email" name="email" placeholder="E-mail" id="cbemail" required="required">
</div>

<div class="input-container phone">
<input type="text" name="countrycode" placeholder="+971" class="phone-number">
<input type="text" name="phone" id="cbphonenumber" placeholder="Phone Number" class="phone-number">
</div>
<div class="input-container">
<input type="hidden" name="interest"  id="interest">
<input type="hidden" name="companyname" id="companyname">

<input type="hidden" name="eng_type" value="corporate-booking">
<textarea name="message" placeholder="" id="message" cols="30" rows="2">I would like to get more information about Corporate Training</textarea>
</div>

</form>
<p class="btn-wrapper"><input type="submit"  value="Submit" id="rcsubmit" class="btn yellow-bg"></p>



<script>
function validationrc() {

// checking all fields are null
let inputs = document.getElementsByClassName('cbinput'); 
for(i=0;i<inputs.length;i++) {
if(inputs[i].value===''){
inputs[i].nextElementSibling.classList.add('show');
}	
	else {
	inputs[i].nextElementSibling.classList.remove('show');
	}
}


// validation for name
var name = document.getElementById('rcname');
var namevalue = name.value;
if (name.value=='') {
    name.nextElementSibling.classList.add('show');
	name.nextElementSibling.nextElementSibling.classList.remove('show');
	name.focus();
    return false;
  }
  else if (!isNaN(namevalue)) {
    name.nextElementSibling.nextElementSibling.classList.add('show');
    name.nextElementSibling.classList.remove('show');	
	  name.focus();
    return false;	
  }  
  else {
    name.nextElementSibling.nextElementSibling.classList.remove('show'); 
	name.nextElementSibling.classList.remove('show');	
  }

// Validatin for Email
let emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i // regexp to check email

let email = document.getElementById('rcemail');
let emailvalue = email.value;

let checkemail=emailfilter.test(email.value); // setting the email field to validate
if (emailvalue === "" ) {

email.nextElementSibling.classList.add('show');
email.nextElementSibling.nextElementSibling.classList.remove('show');
email.focus();
return false;
}
else if(checkemail==false )
{
email.nextElementSibling.nextElementSibling.classList.add('show');
email.nextElementSibling.classList.remove('show');
 document.form1.email.focus();
return false;
}	
else {
email.nextElementSibling.classList.remove('show');  
email.nextElementSibling.nextElementSibling.classList.remove('show');  
}

// validation for phone number
let phonenumber = document.getElementById('rcphonenumber');
let phonenumbervalue = phonenumber.value;
if (phonenumbervalue=='') {
    phonenumber.nextElementSibling.classList.add('show');
				phonenumber.nextElementSibling.nextElementSibling.classList.remove('show');
				phonenumber.nextElementSibling.nextElementSibling.nextElementSibling.classList.remove('show');	
				phonenumber.focus();
    return false;
  }
  else if (isNaN(phonenumbervalue)) {
    phonenumber.nextElementSibling.nextElementSibling.classList.add('show');
  		phonenumber.nextElementSibling.nextElementSibling.nextElementSibling.classList.remove('show');
    phonenumber.nextElementSibling.classList.remove('show');
				phonenumber.focus();
			return false;
  }
  else if (phonenumbervalue.length<6) {
    phonenumber.nextElementSibling.nextElementSibling.nextElementSibling.classList.add('show');
    phonenumber.nextElementSibling.nextElementSibling.classList.remove('show');     phonenumber.nextElementSibling.classList.remove('show');		
				phonenumber.focus();
				return false;
  }  
  else {
				phonenumber.nextElementSibling.nextElementSibling.nextElementSibling.classList.remove('show');
    phonenumber.nextElementSibling.nextElementSibling.classList.remove('show'); 
				phonenumber.nextElementSibling.classList.remove('show');	
  }	

// Ajax starts here
 document.getElementById("form1").submit();


}


</script>