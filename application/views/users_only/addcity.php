<script src="<?php echo base_url();?>javascripts/cities_crud.js" type="text/javascript"> </script>
<div class = "content">
<div class= "content-wrap" >
<?php
	echo "<h3> ADD NEW CITY </h3>\n";

	echo"<div class=\"form-wrapper \" >\n";
	echo form_open(base_url().'citiesc/addcity')."\n";
		
		echo"<div class=\"forms col-md-4\">";
			echo form_label("CITY NAME:", 'cityName')."\n";
			$cityNameAttrib = array(
				'id'=>'cityName',
				'name'=>'cityName',
				'class'=>'form-control col-xs-3',
				'placeholder'=>"Enter city name"
			);
			echo form_input($cityNameAttrib);
			echo "<p id='cityNameValidation' style='display:none'> </p>\n";
			
		echo"</div>\n";

		echo"<div class=\"forms col-md-4\">\n";
			echo form_label("CITY LOGO:", 'cityLogo')."\n";
			$cityLogoAttrib = array(
				'id'=>'cityLogo',
				'name'=>'cityLogo',
				'class'=>''//insert input class
			);
			echo form_upload($cityLogoAttrib);
			echo "<p id='cityLogoValidation' style='display:none'> </p>\n";
		echo"</div>\n";
	
		echo"<div class=\"forms col-md-4\">\n";
		$addCityAttrib = array(
			'class'=>'btn button',
			'onclick'=>'confirmCityAction(\'adding\')'
		);
		echo form_submit('addCity', "ADD CITY", $addCityAttrib)."\n";

	echo form_close()."\n";
	echo"</div>\n";
	echo"</div>\n";
?>
</div>
	</div>
