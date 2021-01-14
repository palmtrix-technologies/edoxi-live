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
<div class="input-container">
<input type="text" name="companyname" placeholder="Company Name" id="companyname" required="required">
</div>
<div class="input-container">
<input type="hidden" name="eng_type" value="corporate-sidebar">
<input type="hidden" name="interest"  id="interest">
<textarea name="message" id="message" cols="30" rows="10" placeholder="Message/Course"></textarea>
</div>
<p class="btn-wrapper"><input type="submit" name="efsubmit" value="Submit" id="submit" class="btn orange-bg"></p>	</form>