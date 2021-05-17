<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title> <?php echo $title; ?> </title>

<link rel="shortcut icon" href="<?php echo base_url();?>images/html_images/TAMMS-ico.ico" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="<?php echo base_url();?>css/main.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Muli:400,600,600i,700,800,900,900i&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap" rel="stylesheet">

<script src="https://kit.fontawesome.com/38ef658c5d.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>

<body>

<div class="page-wrapper">
<div class="row">
    <div class="left-page">
        
        <h3><img class="img-fluid" src="<?php echo base_url();?>images/html_images/TAMMS.png"> Tourism Analytics for Metro Manila System</h3>
        <div class="city-slider">
        <?php $this->load->view('parts/slider');?>
        </div>

    </div>

    <div class="right-page">

    <?php $this->load-> view($main); ?>

    </div>
</div>
    <div id="footer">
            <?php $this->load-> view('parts/footer');?>
    </div>
   
</div>


   
</body> 


</html>
