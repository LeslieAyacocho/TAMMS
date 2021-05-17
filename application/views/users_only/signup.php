<script src="<?php echo base_url();?>javascripts/users_crud.js"/> </script>

<?php
echo"<div class=\"signup-wrapper \">\n";
	
	echo "<h3 class=\"text-center\"> SIGNUP </h3>\n";
	
	echo form_open(base_url().'usersc/signup')."\n";

	echo"<div class=\"login-forms\">\n";
		echo form_label("FIRST NAME:", 'firstName')."\n";
		$firstNameAttrib = array(
			'id'=>'firstName',
			'name'=>'firstName',
			'class'=>'form-control',//insert input class
			'placeholder'=>"Enter your first name"
		);
		echo form_input($firstNameAttrib);
		echo "<p id='firstNameValidation' style='display:display'> </p>\n";
	echo"</div>\n";

	echo"<div class=\"login-forms\">\n";
		echo form_label("MIDDLE NAME:", 'middleName')."\n";
		$middleNameAttrib = array(
			'id'=>'middleName',
			'name'=>'middleName',
			'class'=>'form-control',//insert input class
			'placeholder'=>"Enter your middle name"
		);
		echo form_input($middleNameAttrib);
		echo "<em> Leave blank if none. </em>\n";
	echo"</div>\n";

	echo"<div class=\"login-forms\" style=\"margin-top:-2%; \">\n";
		echo form_label("SURNAME:", 'surname')."\n";
		$surnameAtttrib = array(
			'id'=>'surname',
			'name'=>'surname',
			'class'=>'form-control',//insert input class
			'placeholder'=>"Enter your surname"
		);
		echo form_input($surnameAtttrib);
		echo "<p id='surnameValidation' style='display: none'> </p>\n";
	echo"</div>\n";

	echo"<div style=\"border-top: solid #F5564E; width:50%; margin: 3% 0% 3% 25%;\">\n";
	echo"</div>\n";

	echo"<div class=\"login-forms\" >\n";
		echo form_label("EMAIL ADDRESS:", 'emailAddress')."\n";
		$emailAttrib = array(
			'id'=>'emailAddress',
			'name'=>'emailAddress',
			'class'=>'form-control',//insert input class
	        'placeholder'=>"yourEmail@gmail.com",
	        'type'=>"email"
		);
		echo form_input($emailAttrib);
		echo "<p id='emailAddressValidation' style='display: none'> </p>\n";
	echo"</div>\n";

	echo"<div class=\"login-forms\">\n";
		echo form_label("PASSWORD:", 'password')."\n";
		$passwordAttrib = array(
			'id'=>'password',
			'name'=>'password',
			'class'=>'form-control',//insert input class
			'placeholder'=>'Enter your password'
		);
		echo form_password($passwordAttrib);
		echo "<p id='passwordValidation' style='display: none'> </p>\n";
	echo"</div>";

	echo"<div class=\"login-forms\">\n";
		echo form_label("CONFIRM YOUR PASSWORD:", 'confirmPassword')."\n";
		$confirmPasswordAttrib = array(
			'id'=>'confirmPassword',
			'name'=>'confirmPassword',
			'class'=>'form-control',//insert input class
			'placeholder'=>'Confirm your password'
		);
		echo form_password($confirmPasswordAttrib);
		echo "<p id='confirmPasswordValidation' style='display: none'> </p>\n";
	echo"</div>\n";

	echo"<div class=\"login-forms\">\n";
		echo form_label("CITY:", 'cityForm')."\n";

		$userFromOptions = array();
		$userFromOptions['default'] = "--SELECT CITY--";

		foreach ($cities as $city)
		{
			$userFromOptions[$city['city_id']] = $city['city_name'];
		}

		$userFromAttrib = array(
			'id'=>'userFrom',
			'name'=>'userFrom',
			'class'=>'form-control',
		);
		echo form_dropdown('userFrom', $userFromOptions, 'default', $userFromAttrib);
		echo "<p id='userFromValidation' style='display: none'> </p>\n";
	echo"</div>\n";

	echo"<div class=\"login-forms text-center\">\n";
	$signupAttrib = array(
		'class'=>'btn signup-button ',
		'onclick'=>'confirmSignup()'
	);
	echo form_submit('signup', "SIGNUP", $signupAttrib)."\n";

	echo form_close()."\n";
	echo"</div>\n";
echo"</div>\n";
?>