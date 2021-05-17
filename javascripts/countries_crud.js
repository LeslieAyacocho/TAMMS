function confirmCountryAction(action)
{
	var countryCode = document.getElementById('countryCode');
	var countryName = document.getElementById('countryName');
	var continent = document.getElementById('continent');

	countryCode.addEventListener('input', function(){
		document.getElementById('countryCodeValidation').style.display = "none";
	});

	countryName.addEventListener('input', function(){
		document.getElementById('countryNameValidation').style.display = "none";
	});

	continent.addEventListener('click', function(){
		document.getElementById('continentValidation').style.display = "none";
	});

	continent.addEventListener('focust', function(){
		document.getElementById('continentValidation').style.display = "none";
	});

	if (countryCode.value==="" || 
		countryCode.value.length > 3 || 
		countryCode.value.length < 3)
	{
		var target = document.getElementById('countryCodeValidation');
		target.style.display = "block";
		target.style.color =" #F5564E";
		target.innerHTML = "<em> Please enter a valid 3-letter country code. </em>";
		event.preventDefault();
	}

	if (countryName.value==="")
	{
		var target = document.getElementById('countryNameValidation');
		target.style.display = "block";
		target.style.color = "#F5564E";
		target.innerHTML = "<em> Please enter valid country name. </em>";
		event.preventDefault();
	}

	if (continent.value==="default")
	{
		var target = document.getElementById('continentValidation');
		target.style.display = "block";
		target.style.color = "#F5564E";
		target.innerHTML = "<em> Please select a continent. </em>";
		event.preventDefault();
	}

	if (countryCode.value!=="" && countryCode.value.length == 3 && countryName.value!=="")
	{
		var confirmation = confirm("Are you sure you want to add " + countryName.value + "?");

		if (confirmation === true)
		{
			if (action==="adding")
			{
				alert("Successfully added " + countryName.value + ".");
			}
			else
			{
				alert("Successfully edited " + countryName.value + ".");
			}
		}
		else
		{
			event.preventDefault();
		}
	}
}
//END confirmAddCountry() FUNCTION


function confirmDeleteCountry(countryName)
{
	var confirmation = confirm("Are you sure you want to delete the country, " + countryName + "?");

	if (confirmation===true)
	{
		alert("Successfully deleted " + countryName + ".");
	}
	else
	{
		event.preventDefault();
	}
}
//END confirmDeleteCountry() FUNCTION