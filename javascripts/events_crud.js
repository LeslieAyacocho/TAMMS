function confirmEventAction(action)
{
	var eventName = document.getElementById('eventName');
	var startDate = document.getElementById('startDate');
	var endDate = document.getElementById('endDate');

	eventName.addEventListener('input', function(){
		document.getElementById('eventNameValidation').style.display = "none";
	});

	startDate.addEventListener('click', function(){
		document.getElementById('startDateValidation').style.display = "none";
	});

	endDate.addEventListener('click', function(){
		document.getElementById('endDateValidation').style.display = "none";
	});


	if (eventName.value=== "")
	{
		var target = document.getElementById('eventNameValidation');

		target.style.display = "block";
		target.style.color = "#F5564E";
		target.innerHTML = "<em> Please enter a valid event name. </em>";
		event.preventDefault();
	}

	if (!Date.parse(startDate.value))
	{
		var target = document.getElementById('startDateValidation');

		target.style.display = "block";
		target.style.color = "#F5564E";
		target.innerHTML = "<em> Please enter a valid start date. </em>";
		event.preventDefault();
	}

	if (!Date.parse(endDate.value))
	{
		var text = "<em> Please enter a valid date. </em>";
		var target = document.getElementById('endDateValidation');

		target.style.display = "block";
		target.style.color = "#F5564E";
		target.innerHTML = "<em> Please enter a valid date. </em>";
		event.preventDefault();
	}

	if (Date.parse(startDate.value) > Date.parse(endDate.value))
	{
		var target = document.getElementById('endDateValidation');

		target.style.display = "block";
		target.style.color = "#F5564E";
		target.innerHTML = "<em> The end date of this event should not be less than the start date." + 
			"<br> Please enter a valid date or change the start date. </em>";
		event.preventDefault();
	}

	if (eventName.value!=="" && Date.parse(startDate.value) && Date.parse(endDate.value))
	{
		if (action==="adding")		
		{
			var confirmation = confirm("Are you sure you want to add " + eventName.value + "?");

			if (confirmation===true)
			{
				alert("Successfully added " + eventName.value + ".");
			}
			else
			{
				event.preventDefault();
			}
		}
		else
		{
			var confirmation = confirm("Are you sure you want to edit " + eventName.value + "?");

			if (confirmation===true)
			{
				alert("Successfully edited " + eventName.value + ".");
			}
			else
			{
				event.preventDefault();
			}
		}
	}
}
//END confirmEventAction() FUNCTION


function confirmDeleteEvent(eventName)
{
	var eventName = eventName;
	var confirmation = confirm("Are you sure you want to delete " + eventName + "?");

	if (confirmation === true)
	{
		alert("Successfully deleted " + eventName + ".");
	}
	else
	{
		event.preventDefault();
	}
}