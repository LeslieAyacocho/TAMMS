<script src="<?php echo base_url();?>javascripts/functions.js"></script>
<script src="<?php echo base_url();?>javascripts/users_crud.js"></script>
<div class="login-wrap">
<?php

echo "<div class=\"login-wrapper \">\n";
	echo "<h3 class=\"text-center\"> LOGIN </h3>\n";

	echo form_open(base_url().'usersc/login');

	echo"<div class=\"login-forms\">\n";
		echo form_label("EMAIL ADDRESS:", 'emailAddress')."\n";
	
		$emailAttrib = array(
			'id'=>'emailAddress',
			'name'=>'emailAddress',
			'type'=>'email',
			'class'=>'form-control',//insert input class
	        'placeholder'=>"yourEmail@gmail.com",
		);
		echo form_input($emailAttrib);
		echo "<p id='emailAddressValidation' style='display: none'></p>\n";
    echo"</div>\n";

	echo"<div class=\"login-forms\">\n";
		echo form_label("PASSWORD:", 'password')."\n";
		$passwordAttrib = array(
			'id'=>'password',
			'name'=>'password',
			'class'=>'form-control',//insert input class
	        'placeholder'=>'Enter your password',
		);
		echo form_password($passwordAttrib);

	    echo"<div class=\"form-check form-check-inline\">\n";	
		    $showPasswordAttrib = array(
		    	'id'=>'showPassword',
		    	'class'=>'form-check-input',
				'onclick'=>'togglePassword(\'password\')'
		    );
		    echo form_checkbox($showPasswordAttrib, 'showPassword', FALSE);
		    echo form_label('Show Password', 'showPassword', "class='form-check-label'");
		echo"</div>\n";

		echo "<p id='passwordValidation' style='display: none'></p>\n";
	echo"</div>\n";
	
	echo"<div class=\"login-forms text-center\">\n";
	$signupAttrib = array(
		'class'=>'btn login-button',
		'onclick'=>'loginTrapping()'
	);
	echo form_submit('login', "LOGIN", $signupAttrib)."\n";

	echo "<br>\n";
	echo "<div class=\"form-check form-check-inline\">\n";
		$rememberMeAttrib = array(
			'id'=>'rememberMe',
			'class'=>'form-check-input',
		);
		echo form_checkbox($rememberMeAttrib, 'rememberMe', FALSE);
		echo form_label('Remember Me', 'rememberMe', "class='form-check-label'");
	echo "</div>\n";

    echo form_close();
    
	echo"<p>Don't have an account yet? <a href=\"".base_url()	."usersc/signup\">Signup Here.</a></p>\n";
	echo"</div>\n";
echo"</div>\n";
?>

</div>