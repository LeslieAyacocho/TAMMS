/*
confirmLandmarkAction() function
Accepts an action('adding', 'editing') as a parameter
Gets all input elements by their ID
Adds event listeners to every input elements in order to change its validation message 'display style' into 'none'
Checks all user input if they are valid and correct
If all user input are valid and correct, the page will ask to confirm the action, whether to add or edit
Confirming will insert all user input or will update the landmark to the database
Cancelling will prevent such actions and retain the current page
*/
function confirmLandmarkAction(action)
{
	//Gets all input elements
	var landmarkName = document.getElementById('landmarkName');
	var address = document.getElementById('address');
	var managingOffice = document.getElementById('managingOffice');
	var location = document.getElementById('location');
	var landmarkImage = document.getElementById('landmarkImage');
	var retainImage = "";

	/*
	ignoreNoImage variable (boolean) is used to check whether the user wants to update a landmark without replacing
	or uploading new landmark image
	If false, the page will ask the user to select an image to be uploaded
	Else, ignores having an empty landmarkImage input element value and executes following codes
	*/
	var ignoreNoImage = false;

	//Adding event listeners to input elements, setting their 'display style' to 'none'
	landmarkName.addEventListener('input', function(){
		document.getElementById('landmarkNameValidation').style.display = "none";
	});

	address.addEventListener('input', function(){
		document.getElementById('addressValidation').style.display = "none";
	});

	managingOffice.addEventListener('input', function(){
		document.getElementById('managingOfficeValidation').style.display = "none";
	});

	location.addEventListener('click', function(){
		document.getElementById('locationValidation').style.display = "none";
	});

	location.addEventListener('focus', function(){
		document.getElementById('locationValidation').style.display = "none";
	})

	landmarkImage.addEventListener('click', function(){
		document.getElementById('landmarkImageValidation').style.display = "none";
	});

	/*
	If the value of the 'action' argument passed is equal to "editing",
	Get the 'retainImage' checkbox input element and add an event listener
	Will be used to identify the value of 'ignoreNoImage' boolean variable
	*/
	if (action==="editing")
	{
		retainImage = document.getElementById('retainImage');
		retainImage.addEventListener('click', function(){
			document.getElementById('landmarkImageValidation').style.display = "none";
		});
	}

	/*
	Check whether landmarkName input element value is an empty string
	If true, displays a validation message and prevents form action
	*/
	if (landmarkName.value==="")
	{
		var target = document.getElementById('landmarkNameValidation');

		target.style.display = "block";
		target.style.color = "#F5564E";
		target.innerHTML = "<em> Please enter a valid landmark name. </em>";
		event.preventDefault();
	}

	/*
	Check whether address input element value is an empty string
	If true, displays a validation message and prevents form action
	*/
	if (address.value==="")
	{
		var target = document.getElementById('addressValidation');

		target.style.display = "block";
		target.style.color = "#F5564E";
		target.innerHTML = "<em> Please enter a valid address. </em>";
		event.preventDefault();
	}

	/*
	Check whether managingOffice input element value is an empty string
	If true, displays a validation message and prevents form action
	*/
	if (managingOffice.value==="")
	{
		var target = document.getElementById('managingOfficeValidation');

		target.style.display = "block";
		target.style.color = "#F5564E";
		target.innerHTML = "<em> Please enter a valid managing office. </em>";
		event.preventDefault();
	}

	/*Check whether location dropdown value is in its default option
	If true, displays a validation message and prevents form action
	*/
	if (location.value==="default")
	{
		var target = document.getElementById('locationValidation');

		target.style.display = "block";
		target.style.color = "#F5564E";
		target.innerHTML = "<em> Please select a city. </em>";
		event.preventDefault();
	}

	//Check whether landmarkImage input element value is an empty string
	if (landmarkImage.value==="")
	{	
		if (action==='adding')
		{
			var target = document.getElementById('landmarkImageValidation');

			target.style.display = "block";
			target.style.color = "#F5564E";
			target.innerHTML = "<em> Please select a landmark image. </em>";
			event.preventDefault();
		}
		else
		{
			/*
			If the value of argument passed to 'action' parameter is equal to "editing",
			check whether 'retainImage' checkbox is checked
			If false, displays a validation message and prevents form action
			Else, sets ignoreNoImage to true
			*/
			if (retainImage.checked != true)
			{
				var target = document.getElementById('landmarkImageValidation');

				target.style.display = "block";
				target.style.color = "#F5564E";
				target.innerHTML = "<em> Please select a landmark image. </em>";
				event.preventDefault();
			}
			else
			{
				ignoreNoImage = true;
			}
		}
	}

	/*
	If all input elements value are validated, ask the user to confirm action 
	Confirming will insert all user input or will update the landmark to the database
	Cancelling will prevent such actions and retain the current page
	*/
	if (action==="adding")
	{
		if (landmarkName.value!=="" && address.value!=="" && managingOffice.value!=="" && location.value!=="default" 
			&& landmarkImage.value!=="")
		{
			var confirmation = confirm("Are you sure you want to add " + landmarkName.value + " as a landmark?");

			if (confirmation===true)
			{
				alert("Successfully added " + landmarkName.value + ".");
			}
			else
			{
				event.preventDefault();
			}
		}
	}
	else
	{
		/*
		If the value of argument passed to 'action' parameter is equal to "editing",
		also check if ignoreNoImage is equal to true
		If it is true, ask a confirmation whether to continue updating or cancel
		Confirming will update the landmark in the database
		Cancelling will prevent such actions and retain the current page
		*/
		if (landmarkName.value!=="" && address.value!=="" && managingOffice.value!=="" && location.value!=="default" 
			&& (landmarkImage.value!=="" || ignoreNoImage == true))
		{
			var confirmation = confirm("Are you sure you want to edit " + landmarkName.value + "?");

			if (confirmation===true)
			{
				alert("Successfully edited " + landmarkName.value + ".");
			}
			else
			{
				event.preventDefault();
			}
		}
	}	
}
//end confirmLandmarkAction() FUNCTION

/*
confirmDeleteLandmark() function
Accepts a landmark name as a parameter
Will ask the user to confirm whether to delete or not a landmark
Confirming will delete the seleceted landmark from the database
Cancelling will prevent such action and will retain the current page
*/
function confirmDeleteLandmark(landmarkName)
{
	var confirmation = confirm("Are you sure you want to delete " + landmarkName + "?");

	if (confirmation===true)
	{
		alert("Successfully deleted " + landmarkName + ".");
	}
	else
	{
		event.preventDefault();
	}
}
//End confirmDeleteAction() function

/*
NOTHING FOLLOWS
*/