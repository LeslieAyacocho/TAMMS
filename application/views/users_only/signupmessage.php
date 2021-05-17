<div class="signup-text" >

<h2> YOU'VE SUCCESSFULLY SIGNED UP! </h2>
<p> Wait for at least/within a day for an email if your account request was approved or denied. <br>
If it was approved, you will be sent a verification code. <br> <br>
Remember that the given code will be only available for <strong> 30 minutes </strong>. <br>
If you failed to verify your account, you can still request for another approval for the same user credentials and new verification code will be sent to your email account. <br>
Thank you.

<?php
	echo "<br> <br>\n";
	echo anchor(base_url().'dashboard',"Go to Home")."\n";
	echo " <strong>|</strong> \n";
	echo anchor(base_url().'usersc/login', "Login")."\n";
?>

</div>