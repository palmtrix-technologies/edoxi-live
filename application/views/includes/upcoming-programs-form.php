<form class="request-callback-form" action="<?=base_url();?>send-enquiry" method="post">
<div class="input-container">
<input type="text" name="name" placeholder="Name" id="rcname" required="required">
</div>
<div class="input-container">
<input type="email" name="email" placeholder="E-mail" id="rcemail" required="required">
</div>
<div class="input-container phone">
<input type="text" name="countrycode" placeholder="+971" class="phone-number">
<input type="text" name="phone" placeholder="Phone Number" class="phone-number">
</div>
<div class="input-container">
<textarea name="message" placeholder="" id="message" cols="30" rows="2">I would like to get more information about <?=$course;?> Course</textarea>

<input type="hidden" name="interest"  id="interest" value=" <?=$course;?>">
<input type="hidden" name="companyname" id="companyname">

<input type="hidden" name="eng_type" value="upcoming-course">
</div>
<p class="btn-wrapper"><input type="submit"  value="Get More Info" id="rcsubmit" class="btn yellow-bg"></p>
</form>