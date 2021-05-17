function confirmSignup()
{
	var firstName = document.getElementById('firstName');
	// var middleName = document.getElementById('middleName');
	var surname = document.getElementById('surname');
	var emailAddress = document.getElementById('emailAddress');
	var password = document.getElementById('password');
	var confirmPassword = document.getElementById('confirmPassword');
	var userFrom = document.getElementById('userFrom');

	firstName.addEventListener('input', function(){
		document.getElementById('firstNameValidation').style.display = "none";
	});

	surname.addEventListener('input', function(){
		document.getElementById('surnameValidation').style.display = "none";
	});

	emailAddress.addEventListener('input', function(){
		document.getElementById('emailAddressValidation').style.display = "none";
	});

	password.addEventListener('input', function(){
		document.getElementById('passwordValidation').style.display = "none";
	});

	confirmPassword.addEventListener('input', function(){
		document.getElementById('confirmPasswordValidation').style.display = "none";
	});

	userFrom.addEventListener('click', function(){
		document.getElementById('userFromValidation').style.display = "none";
	});

	userFrom.addEventListener('focus', function(){
		document.getElementById('userFromValidation').style.display = "none";
	});

	if (firstName.value==="")
	{
		var target = document.getElementById('firstNameValidation');

		target.style.display = "block";
		target.style.color = "#F5564E";
		target.innerHTML = "<em> Please enter a valid first name. </em>";
		event.preventDefault();
	}

	if (surname.value==="")
	{
		var target = document.getElementById('surnameValidation');

		target.style.display = "block";
		target.style.color = "#F5564E";
		target.innerHTML = "<em> Please enter a valid last name. </em>";
		event.preventDefault();
	}

	if (emailAddress.value==="")
	{
		var target = document.getElementById('emailAddressValidation');

		target.style.display = "block";
		target.style.color = "#F5564E";
		target.innerHTML = "<em> Please enter a valid email address. </em>";
		event.preventDefault();
	}

	var targetValidation = document.getElementById('passwordValidation');
	var isAlphanumeric = false;

	if (password.value==="")
	{
		targetValidation.style.display = "block";
		targetValidation.style.color = "#F5564E";
		targetValidation.innerHTML = "<em> Please enter a valid password. </em>";
	}

	if (password.value!=="")
	{
		if (password.value.length < 8)
		{
			targetValidation.style.display = "block";
			targetValidation.style.color = "#F5564E";
			targetValidation.innerHTML = "<em> Please enter a password with at least 8 characters. </em>";
			event.preventDefault();
		}
		
		if (password.value.length >= 8)
		{
			var numberPattern = /\d/g;
			var matches = password.value.match(numberPattern);

			if (matches != null)
			{
				isAlphanumeric = true;
			}

			else
			{
				targetValidation.innerHTML = "<em> Please have an alphanumeric password. </em>";
				targetValidation.style.display = "block";
				targetValidation.style.color = "#F5564E";
				event.preventDefault();
			}
		}
	}

	if (confirmPassword.value==="")
	{
		var target = document.getElementById('confirmPasswordValidation');

		target.style.display = "block";
		target.style.color = "#F5546E";
		target.innerHTML = "<em> Please confirm your password. </em>";
		event.preventDefault();
	}
	else
	{
		if (password.value!=="" && confirmPassword.value !== password.value)
		{
			var target = document.getElementById('confirmPasswordValidation');

			confirmPassword.value = "";

			target.style.display = "block";
			target.style.color = "#F5564E";
			target.innerHTML = "<em> Your passwords do not match with each other. </em>";
			event.preventDefault();
		}
	}

	if (userFrom.value==="default")
	{
		target = document.getElementById('userFromValidation');

		target.style.display = "block";
		target.style.color = "#F5564E";
		target.innerHTML = "<em> Please select a city. </em>";
		event.preventDefault();
	}
}

function loginTrapping()
{
	var emailAddress = document.getElementById('emailAddress');
	var password = document.getElementById('password');

	emailAddress.addEventListener('input', function(){
		document.getElementById('emailAddressValidation').style.display = "none";
	});

	password.addEventListener('input', function(){
		document.getElementById('passwordValidation').style.display = "block";
	});

	if (emailAddress.value==="")
	{
		var target = document.getElementById('emailAddressValidation');

		target.style.display = "block";
		target.style.color = "#F5564E";
		target.innerHTML = "<em> Please enter a valid email address. </em>";
		event.preventDefault();
	}

	if (password.value==="")
	{
		var target = document.getElementById('passwordValidation');

		target.style.display = "block";
		target.style.color = "#F5564E";
		target.innerHTML = "<em> Please enter your password. </em>";
		event.preventDefault();
	}
}

function confirmUserAction(action)
{
	var firstName = document.getElementById('firstName');
	var middleName = document.getElementById('middleName');
	var surname = document.getElementById('surname');
	var password = document.getElementById('password');
	var confirmPassword = document.getElementById('confirmPassword');
	var displayPicture = document.getElementById('displayPicture');

	firstName.addEventListener('input', function(){
		document.getElementById('firstNameValidation').style.display = "none";
	});

	surname.addEventListener('input', function(){
		document.getElementById('surnameValidation').style.display = "none";
	});

	password.addEventListener('input', function(){
		document.getElementById('passwordValidation').style.display = "none";
	});

	confirmPassword.addEventListener('input', function(){
		document.getElementById('confirmPasswordValidation').style.display = "none";
	});

	displayPicture.addEventListener('click', function(){
		document.getElementById('displayPictureValidation').style.display = "none";
	});

	if (firstName.value==="")
	{
		var target = document.getElementById('firstNameValidation');

		target.style.display = "block";
		target.style.color = "#F5564E";
		target.innerHTML = "<em> Please enter a valid first name. </em>";
		event.preventDefault();
	}

	if (surname.value==="")
	{
		var target = document.getElementById('surnameValidation');

		target.style.display = "block";
		target.style.color = "#F5564E";
		target.innerHTML = "<em> Please enter a valid last name. </em>";
		event.preventDefault();
	}

	var targetValidation = document.getElementById('passwordValidation');
	targetValidation.style.display = "block";
	targetValidation.style.color = "#F5564E";

	if (password.value==="")
	{
		targetValidation.innerHTML = "<em> Please enter a valid password. </em>";
	}

	if (password.value!=="")
	{
		if (password.value.length < 8)
		{
			targetValidation.innerHTML = "<em> Please enter at least 8 characters for your password. </em>";
		}
	}

	if (confirmPassword.value==="")
	{
		var target = document.getElementById('confirmPasswordValidation');

		target.style.display = "block";
		target.style.color = "#F5546E";
		target.innerHTML = "<em> Please confirm your password. </em>";
		event.preventDefault();
	}

	if (firstName.value!=="" &&
		surname.value!=="" &&
		password.value!=="" &&
		confirmPassword.value!=="" &&
		(displayPicture.value!=="" || displayPicture==""))
	{
		if (action==="adding")
		{
			var confirmation = confirm("Are you sure you want to complete setup account of " + firstName.value + 
				" " + middleName.value + " " + surname.value + "?");

			if (confirmation===true)
			{
				alert("Successfully completed account setup for " + firstName.value +
				" " + middleName.value + " " + surname.value + ".");
			}
			else
			{
				event.preventDefault();
			}
		}
		else
		{
			var confirmation = confirm("Are you sure you want to edit account of " + firstName.value +
				" " + middleName.value + " " + surname.value + ".");

			if (confirmation===true)
			{
				alert("Successfully edited account of " + firstName.value +
				" " + middleName.value + " " + surname.value + ".");
			}
			else
			{
				event.preventDefault();
			}
		}
	}
}

function confirmDeleteAccount(accountName)
{
	var confirmation = confirm("Are you sure you want to delete account of " + accountName + "?");

	if (confirmation===true)
	{
		alert("Successfully deleted account of " + accountName + ".");
	}
	else
	{
		event.preventDefault();
	}
}

function confirmApproveAccount(accountName)
{
	var confirmation = confirm("Are you sure you want to approve account request of " + accountName + "?");

	if (confirmation===true)
	{
		alert("Successfully approved account request of " + accountName + ".");
	}
	else
	{
		event.preventDefault();
	}
}