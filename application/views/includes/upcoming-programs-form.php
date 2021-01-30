<form id="upform" class="request-callback-form" action="<?=base_url();?>send-enquiry" method="post">
<div class="input-container">
<input type="text" name="name" class="upinput" placeholder="Name" id="upname" required="required">
<div class='validation'>Please enter the Name</div>
<div class='validation'>Numbers not allowed in Name Field</div>
</div>
<div class="input-container">
<input type="email" name="email" class="upinput" placeholder="E-mail" id="upemail" required="required">
<div class='validation'>Please enter the Email</div>
<div class='validation'>Please enter a valid email address</div>
</div>
<div class="input-container phone">
<input type="text" name="countrycode" placeholder="+971" class="phone-number">
<input type="text" name="phone"  id="upphonenumber" placeholder="Phone Number" class="phone-number upinput">
<div class='validation'>Please enter the Phone number</div>
<div class='validation'>Please enter a valid Phone number</div>
<div class='validation'>Please enter a valid Phone number</div>
</div>
<div class="input-container">
<textarea name="message" class="upinput" placeholder="" id="message" cols="30" rows="2">I would like to get more information about <?=$course;?> Course</textarea>
<div class='validation'>Please enter your query</div>
<input type="hidden" name="interest"  id="interest" value=" <?=$course;?>">
<input type="hidden" name="companyname" id="companyname">

<input type="hidden" name="eng_type" value="upcoming-course">
</div>

</form>

<p class="btn-wrapper"><input type="submit" onClick="validationup();"  value="Get More Info" id="rcsubmit" class="btn yellow-bg"></p>
<script>
function validationup() {

// checking all fields are null
let inputs = document.getElementsByClassName('upinput');
for(i=0;i<inputs.length;i++) {
if(inputs[i].value===''){
inputs[i].nextElementSibling.classList.add('show');
return false;
}	

	else {
	inputs[i].nextElementSibling.classList.remove('show');
	}
}


// validation for name
var name = document.getElementById('upname');
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

let email = document.getElementById('upemail');
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
let phonenumber = document.getElementById('upphonenumber');
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
 document.getElementById("upform").submit();


}


</script>