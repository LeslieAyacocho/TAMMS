<script src="<?php echo base_url();?>javascripts/cities_crud.js" type="text/javascript"> </script>
<div class="content">
    <div class="content-wrap">
<?php
	echo "<h3> EDIT CITY DETAILS </h3>\n";

	echo"<div class=\"form-wrapper  col-md-4\">\n";
	echo form_open(base_url().'citiesc/addcity'); //insert form class
	
		echo"<div class=\"forms\">\n";
			echo form_label("CITY NAME:", 'cityName')."\n";
			$cityNameAttrib = array(
				'id'=>'cityName',
				'name'=>'cityName',
				'class'=>'form-control',
				'value'=>''
			);
			echo form_input($cityNameAttrib);
			echo "<p id='cityNameValidation' style='display:none'> </p>\n";
		echo"</div>";
	
		echo"<div class=\"forms\">";

			echo form_label("CITY LOGO:", 'cityLogo')."\n";
			$cityLogoAttrib = array(
				'id'=>'cityLogo',
				'name'=>'cityLogo',
				'class'=>''//insert input class
			);
			echo form_upload($cityLogoAttrib);
			echo "<p id='cityLogoValidation' style='display:none'> </p>\n";
		echo"</div>";

		$editCityAttrib = array(
			'class'=>'btn button',//insert button class
			'onclick'=>'confirmCityAction(\'editing\')'
		);
		echo form_submit('addCity', "EDIT CITY", $editCityAttrib)."\n";

		echo form_close()."\n";

echo"</div>";
?>
</div>
</div>