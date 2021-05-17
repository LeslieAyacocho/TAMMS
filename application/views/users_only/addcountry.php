<script src="<?php echo base_url();?>javascripts/countries_crud.js" type="text/javascript"> </script>
<div class = "content">
<div class= "content-wrap" >
<?php
	echo "<h3> ADD COUNTRY </h3>\n";

	echo"<div class=\"form-wrapper\">\n";
	echo form_open(base_url().'countriesc/addcountry')."\n";

		echo "<div class=\"forms col-md-4\">\n";
			echo form_label("3-LETTER COUNTRY CODE:", 'countryCode')."\n";
			$countryCodeAttrib = array(
				'id'=>'countryCode',
				'name'=>'countryCode',
				'class'=>'form-control',//insert input class w-50
				'placeholder'=>"COUNTRY CODE",
			);
			echo form_input($countryCodeAttrib);
			echo "<p id='countryCodeValidation' style='display:none'> </p>\n";
		echo"</div>\n";

		echo"<div class=\"forms col-md-4\">\n";
			echo form_label("COUNTRY NAME:", 'countryName')."\n";
			$countryNameAttrib = array(
				'id'=>'countryName',
				'name'=>'countryName',
				'class'=>'form-control',//insert input class
				'placeholder'=>"ENTER COUNTRY NAME"
			);
			echo form_input($countryNameAttrib);
			echo "<p id='countryNameValidation' style='display:none'> </p>\n";
		echo"</div>\n";

		echo "<div class=\"forms col-md-4\">\n";
			echo form_label("CONTINENT", 'continent')."\n";
			$continentOptions = array(
				'default'=>"--SELECT CONTINENT--",
				'Africa'=>"Africa",
				'Antartica'=>"Antartica",
				'Asia'=>"Asia",
				'Europe'=>"Europe",
				'North America'=>"North America",
				'Oceania'=>"Oceania",
				'South America'=>"South America",
			);

			$continentAttrib = array(
				'id'=>'continent',
				'class'=>'form-control'
			);

			echo form_dropdown('continent', $continentOptions, 'default', $continentAttrib);
			echo "<p id='continentValidation' style='display: none'> </p>\n";
		echo "<div>\n";
		
		$addCountryAttrib = array(
			'class'=>'btn button',//insert button class
			'onclick'=>'confirmCountryAction(\'	adding\')'
		);
		echo form_submit('addCountry', "ADD COUNTRY", $addCountryAttrib)."\n";

		echo form_close()."\n";
echo"</div>";
echo"</div>";
?>
</div>
</div>