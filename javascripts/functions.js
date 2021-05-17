function togglePassword(id)
{
	var target = document.getElementById(id);

	if (target.type === "text")
	{
		target.type = "password";
	}
	else
	{
		target.type = "text";
	}
}