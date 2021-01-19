<form id="rdfform" class="request-callback-form" action="<?=base_url();?>send-attachment" method="post">
<div class="input-container">
<input type="text" name="name" class="rdinput" placeholder="Name" id="rdname" required="required">
<div class='validation'>Please enter the Name</div>
<div class='validation'>Numbers not allowed in Name Field</div>
</div>
<div class="input-container">
<input type="email" name="email" class="rdinput" placeholder="E-mail" id="rdemail" required="required">
<div class='validation'>Please enter the Email</div>
<div class='validation'>Please enter a valid email address</div>
</div>
<div class="input-container phone">
<input type="text" name="countrycode" placeholder="+971" class="phone-number">
<input type="text" name="phone" id="rdphonenumber" placeholder="Phone Number" class="phone-number rdinput">
<div class='validation'>Please enter the Phone number</div>
<div class='validation'>Please enter a valid Phone number</div>
<div class='validation'>Please enter a valid Phone number</div>
</div>
<input type="hidden" id="Id" name="Id" value="<?=$id;?>"  />
<input type="hidden" id="typename" name="typename" value="<?=$type;?>"  />

<input type="hidden" id="actual_link" name="actual_link" value="<?=$actual_link;?>"  />


</form>
<p class="btn-wrapper"><input type="submit" onClick="validationrd();"  value="Submit" id="rcsubmit" class="btn yellow-bg"></p>
<script>
function validationrd() {

// checking all fields are null
let inputs = document.getElementsByClassName('rdinput');
for(i=0;i<inputs.length;i++) {
if(inputs[i].value===''){
inputs[i].nextElementSibling.classList.add('show');
}	
	else {
	inputs[i].nextElementSibling.classList.remove('show');
	}
}


// validation for name
var name = document.getElementById('rdname');
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

let email = document.getElementById('rdemail');
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
let phonenumber = document.getElementById('rdphonenumber');
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
 document.getElementById("rdfform").submit();


}


</script>



