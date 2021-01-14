<form id="course-enquiry-form" action="<?=base_url();?>send-enquiry" method="post" class="form-container">
<div class="input-container"><input type="text" name="name" placeholder="Name" id="name" required="required">
</div>
<div class="input-container">
<input type="email" name="email" placeholder="E-mail" id="email" required="required">
</div>
<div class="input-container phone">
<input type="text" name="countrycode" placeholder="+971" class="phone-number">
<input type="text" name="phone" placeholder="Phone Number" class="phone-number">
</div>
<div class="input-container course-search-box">
<input type="text" placeholder="Search for a Course" name="interest" class="search-field search-input2">
<ul id="autocomplete-results2" class="autocomplete-results">
</ul>
</div>		
<input type="hidden" name="message"   id="message">
<input type="hidden" name="companyname" id="companyname">	

<input type="hidden" name="eng_type" value="course-enquiry">					
<p class="btn-wrapper"><input type="submit" name="efsubmit" value="Submit" id="submit" class="btn yellow-bg"></p>									
</form>

