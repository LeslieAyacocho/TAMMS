function confirmCityAction(action)
{
	var cityName = document.getElementById('cityName');
	var cityLogo = document.getElementById('cityLogo');

	cityName.addEventListener('input', function(){
		document.getElementById('cityNameValidation').style.display = "none";
	});

	cityLogo.addEventListener('click', function(){
		document.getElementById('cityLogoValidation').style.display = "none";
	});

	if (cityName.value==="")
	{
		var target = document.getElementById('cityNameValidation');

		target.style.display = "block";
		target.style.color = "#F5564E";
		target.innerHTML = "<em> Please enter a valid city name. </em>";
		event.preventDefault();
	}

	if (cityLogo.value==="")
	{
		var target = document.getElementById('cityLogoValidation');

		target.style.display = "block";
		target.style.color = "#F5564E";
		target.innerHTML = "<em> Please select a city logo. </em>";
		event.preventDefault();
	}

	if (cityName.value!=="" && cityLogo.value!=="")
	{
		if (action==="adding")
		{
			var confirmation = confirm("Are you sure you want to add " + cityName.value + "?");

			if (confirmation===true)
			{
				alert("Successfully added " + cityName.value + ".");
			}
			else
			{
				event.preventDefault();
			}
		}
		else
		{
			var confirmation = confirm("Are you sure you want to edit " + cityName.value + "?");

			if (confirmation===true)
			{
				alert("Successfully edited " + cityName.value + ".");
			}
			else
			{
				event.preventDefault();
			}
		}
	}
}
//END confirmCityAction() FUNCTION

function confirmDeleteCity(cityName)
{
	var confirmation = confirm("Are you sure you want to delete " + cityName + "?");

	if (confirmation===true)
	{
		alert("Successfully deleted " + cityName + ".");
	}
	else
	{
		event.preventDefault();
	}
}