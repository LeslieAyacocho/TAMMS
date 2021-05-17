<div class="signup-text">
<div class="signup">
<h2 class="text-center"> VERIFY YOUR ACCOUNT </h2>
<p class="text-center"> Please enter the given verification code sent to your email account. </p>

<?php
	echo form_open(base_url().'usersc/verifyNewAccount');


echo"<div class=\"login-forms\">\n";
	echo form_label("REQUEST ID", 'requestID')."\n";
	$requestIDAttrib = array(
		'id'=>'requestID',
		'name'=>'requestID',
		'class'=>'form-control',
		'placeholder'=>'Enter request ID'
	);
	echo form_input($requestIDAttrib);
echo"</div>\n";

echo"<div class=\"login-forms\">\n";
	echo form_label("VERIFICATION CODE", 'verificationCode')."\n";
	$codeAttrib = array(
		'id'=>'verificationCode',
		'name'=>'verificationCode',
		'class'=>'form-control ',
		'placeholder'=>"Enter verification code"
	);
	echo form_input($codeAttrib);
echo"</div>\n";

echo"<div class=\"login-forms\">\n";

	$verifyAttrib = array(
		'class'=>'btn button',
		'onclick'=>''
	);
	echo form_submit('verifyAccount', "VERIFY MY ACCOUNT", $verifyAttrib);

	echo form_close();
	echo"</div>\n";
?>
</div>
</div>