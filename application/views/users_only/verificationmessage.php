<?php

$message = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\"
\"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\" lang=\"en\">
<head>

<meta charset=\"utf-8\">
<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />

<title> <?php echo $title; ?> </title>

<link rel=\"shortcut icon\" href=\"<?php echo base_url();?>images/html_images/TAMMS-ico.ico\" />
<link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css\" integrity=\"sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh\" crossorigin=\"anonymous\">
<link href=\"<?php echo base_url();?>css/main.css\" rel=\"stylesheet\" type=\"text/css\"/>
<link href=\"https://fonts.googleapis.com/css?family=Muli:400,600,600i,700,800,900,900i&display=swap\" rel=\"stylesheet\">
<link href=\"https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,600;1,900&display=swap\" rel=\"stylesheet\">

<script src=\"https://kit.fontawesome.com/38ef658c5d.js\" crossorigin=\"anonymous\"></script>
<script src=\"https://code.jquery.com/jquery-3.4.1.slim.min.js\" integrity=\"sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n\" crossorigin=\"anonymous\"></script>
<script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js\" integrity=\"sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo\" crossorigin=\"anonymous\"></script>
<script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js\" integrity=\"sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6\" crossorigin=\"anonymous\"></script>

</head>
<style>
    *{
      font-family: 'Source Sans Pro', sans-serif;
    }
</style>
<body style=\"background: #E8E2DB; \">
<div class=\"header text-center\" style=\"background:#FAB95B;
        padding: 3%;\">    
<h1 class=\"text-center\" style=\"color: #1A3263;
    font-family: 'Muli', san-serif;
    font-weight: 900;
    margin-bottom: 1px;
   \"> 
Tourism Analytics for Metro Manila System </h1>
</div>

    <div class=\"wrapper\" style=\"padding: 10%;\">
<p >Good day!</p>

<blockquote class=\"blockquote text-center\">
<h3 style=\"font-family: 'Muli', san-serif;
    font-weight: 900;
    color:#1A3263;
   \">REQUEST ID: </h3>
    <h4 style=\"
        color: #F5564E;\">".$requestID."</h4>
<h3 style=\"font-family: 'Muli', san-serif;
    font-weight: 900;
    color:#1A3263;
   \">VERIFICATION CODE: </h3>
    <h4 style=\"
        color: #F5564E;\">".$verificationCode."</h4>
</blockquote>

        <p >Login with your email address and password and enter the given <strong><em> VERIFICATION CODE and REQUEST ID </em></strong>.
<br>
            Please note that you will only have <strong><em> 30 minutes</em> </strong> to use it <strong><em> ONCE</em></strong>. 
<br>
Otherwise, you will have to request another verification code.
<br><br>
Thank you. </p>
</div>
</body>
</html>";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html; charset=UTF-8" . "\r\n";
$headers .= "From: martinezjk907@gmail.com";

mail($emailAddress, 'TAMMS Account Verification', $message, $headers);

header("location: ".base_url()."usersc/");
?>