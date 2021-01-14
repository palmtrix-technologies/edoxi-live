<form class="request-callback-form" action="<?=base_url();?>send-attachment" method="post">
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
<input type="hidden" id="Id" name="Id" value="<?=$id;?>"  />
<input type="hidden" id="typename" name="typename" value="<?=$type;?>"  />

<input type="hidden" id="actual_link" name="actual_link" value="<?=$actual_link;?>"  />

<p class="btn-wrapper"><input type="submit"  value="Submit" id="rcsubmit" class="btn yellow-bg"></p>
</form>




