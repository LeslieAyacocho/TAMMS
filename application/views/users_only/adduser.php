<script src="<?php echo base_url();?>javascripts/functions.js"></script>
<script src="<?php echo base_url();?>javascripts/users_crud.js"></script>

<?php
echo"<div class=\"signup-wrapper \">\n";
	echo"<div class=\"signup-title text-center\">\n";
		echo "<h3> SETTING UP YOUR ACCOUNT </h3>\n";
		echo "<p> You may change your account credentials except your email address and 
			the city you are working from. </p>\n";
	echo"</div>\n";

	echo form_open_multipart(base_url().'usersc/adduser')."\n";
	
	echo form_hidden('tempUserID', $tempUser['temp_user_id']);
	echo form_hidden('emailAddress', $tempUser['email_address']);
	echo form_hidden('userFrom', $tempUser['user_from']);

	echo"<div class=\"login-forms\">\n";
		echo form_label("FIRST NAME:", 'firstName')."\n";
		$firstNameAttrib = array(
			'id'=>'firstName',
			'name'=>'firstName',
			'class'=>'form-control',//insert input class
			'value'=>$tempUser['first_name']
		);
		echo form_input($firstNameAttrib);
		echo "<p id='firstNameValidation' style='display: none'> </p>\n";
	echo"</div>\n";

	echo"<div class=\"login-forms\">\n";
		echo form_label("MIDDLE NAME:", 'middleName')."\n";
		$middleNameAttrib = array(
			'id'=>'middleName',
			'name'=>'middleName',
			'class'=>'form-control',//insert input class
			'value'=>$tempUser['middle_name']
		);
		echo form_input($middleNameAttrib);
		echo " <em > Leave blank if none. </em>\n";
	echo"</div>\n";

	echo"<div class=\"login-forms\">\n";
		echo form_label("SURNAME:", 'surname');
		$surnameAtttrib = array(
			'id'=>'surname',
			'name'=>'surname',
			'class'=>'form-control',
			'value'=>$tempUser['surname']
		);
		echo form_input($surnameAtttrib);
		echo "<p id='surnameValidation' style='display: none'> </p>\n";
	echo"</div>\n";

	echo"<div class=\"login-forms\" >\n";
		echo form_label("PASSWORD:", 'password')."\n";
		$passwordAttrib = array(
			'id'=>'password',
			'name'=>'password',
			'class'=>'form-control',//insert input class
			'placeholder'=>'Enter your password'
		);
		echo form_password($passwordAttrib);

		echo"<div class=\"form-check form-check-inline\">\n";
				$showPasswordAttrib = array(
				'id'=>'showPassword',
				'class'=>'form-check-input',
				'onclick'=>'togglePassword(\'password\')'
			);
			echo form_checkbox($showPasswordAttrib, 'showPassword', FALSE);
			echo form_label("Show Password", 'showPassword', "class='form-check-label'")."\n";
		echo"</div>\n";

		echo "<p id='passwordValidation' style='display: none'> </p>\n";
		echo"</div>\n";

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
		echo form_label("DISPLAY PICTURE:", 'displayPicture')."\n";
		$displayPictureAttrib = array(
			'id'=>'displayPicture',
			'name'=>'displayPicture',
			'class'=>''
		);
		echo form_upload($displayPictureAttrib);
		echo "<br>\n <em> Leave blank to skip. </em>";
	echo"</div>\n";

	echo"<div class=\"login-forms text-center\">\n";
	$addUserAttrib = array(
		'class'=>'btn signup-button mh-200',//insert button class
		'onclick'=>'confirmUserAction(\'adding\')'
	);

	echo form_submit('addUser', "ENTER", $addUserAttrib);

	echo form_close()."\n";
	echo"</div>\n";
	echo"</div>\n";
?>