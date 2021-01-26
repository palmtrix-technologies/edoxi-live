<div class="form-btn-wrapper">
<form id="course-enquiry-form" action="<?=base_url();?>send-enquiry" method="post" class="form-container corporate-query-form">
<div class="input-container"><input type="text" class="cqinput" name="name" placeholder="Name" id="cqname" required="required">
<div class='validation'>Please enter the Name</div>
<div class='validation'>Numbers not allowed in Name Field</div>
</div>
<div class="input-container">
<input type="email" name="email" placeholder="E-mail" class="cqinput" id="cqemail" required="required">
<div class='validation'>Please enter the Email</div>
<div class='validation'>Please enter a valid email address</div>
</div>
<div class="input-container phone">
<input type="text" name="countrycode" placeholder="+971" class="phone-number">
<input type="text" name="phone" id="cqphonenumber" placeholder="Phone Number" class="phone-number cqinput">
<div class='validation'>Please enter the Phone number</div>
<div class='validation'>Please enter a valid Phone number</div>
<div class='validation'>Please enter a valid Phone number</div>
</div>
<div class="input-container">
<input type="text" name="companyname"  class="cqinput" placeholder="Company Name" id="companyname" required="required">
<div class='validation'>Please enter your company name  </div>
</div>
<div class="input-container">

<input type="hidden" name="interest"  id="interest">
<input type="hidden" name="eng_type" value="corporate-query">
<textarea name="message" id="message" class="cqinput" cols="30" rows="10" placeholder="Message/Course"></textarea>
<div class='validation'>Please enter your queries  </div>
</div>
</form>
<p class="btn-wrapper"><input type="submit" onClick="validationcq();" name="efsubmit" value="Submit" id="submit" class="btn orange-bg"></p>
</div>
<script>
function validationcq() {

// checking all fields are null
let inputs = document.getElementsByClassName('cqinput');
for(i=0;i<inputs.length;i++) {
if(inputs[i].value===''){
inputs[i].nextElementSibling.classList.add('show');
}	
	else {
	inputs[i].nextElementSibling.classList.remove('show');
	}
}


// validation for name
var name = document.getElementById('cqname');
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

let email = document.getElementById('cqemail');
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
email.focus();
return false;
}	
else {
email.nextElementSibling.classList.remove('show');  
email.nextElementSibling.nextElementSibling.classList.remove('show');  
}

// validation for phone number
let phonenumber = document.getElementById('cqphonenumber');
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
 document.getElementById("course-enquiry-form").submit();


}


</script>