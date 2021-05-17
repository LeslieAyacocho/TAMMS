<script src="<?php echo base_url();?>javascripts/landmarks_crud.js" type="text/javascript"> </script>

<div class="content">
	<div class= "content-wrap">
	<?php
		echo "<h3> ADD NEW LANDMARK </h3>\n";

		echo"<div class=\"form-wrapper col-md-6\">\n";

			//ADDING NEW LANDMARK FORM
			echo form_open_multipart(base_url().'landmarksc/addLandmark')."\n"; //insert form class
			
			echo"<div class=\"forms\">\n";
				//LANDMARK NAME INPUT
				echo form_label("LANDMARK NAME:", 'landmarkName')."\n";
				$landmarkNameAttrib = array(
					'id'=>'landmarkName',
					'name'=>'landmarkName',
					'class'=>'form-control', //insert input class
					'placeholder'=>"Enter landmark name"
				);
				echo form_input($landmarkNameAttrib);
				echo "<p id='landmarkNameValidation' style='display:none'> </p>\n";
				//END LANDMARK NAME INPUT
			echo"</div>\n";

			echo"<div class=\"forms \">\n";
				//LANDMARK ADDRESS INPUT
				echo form_label("LANDMARK ADDRESS:", 'address')."\n";
				$landmarkAddressAttrib = array(
					'id'=>'address',
					'name'=>'address',
					'class'=>'form-control', //insert input class
					'placeholder'=>"Enter landmark address",
					'rows'=>'3',
				);
				echo form_textarea($landmarkAddressAttrib);
				echo "<p id='addressValidation' style='display:none'> </p>\n";
				//END LANDMARK ADDRESS INPUT
			echo"</div>\n";

			echo"<div class=\"forms \">\n";
				//LANDMARK MANAGING OFFICE INPUT
				echo form_label("MANAGING OFFICE:", 'managingOffice')."\n";
				$managingOfficeAttrib = array(
					'id'=>'managingOffice',
					'name'=>'managingOffice',
					'class'=>'form-control', //insert input class
					'placeholder'=>"Enter managing office"
				);
				echo form_input($managingOfficeAttrib);
				echo "<p id='managingOfficeValidation' style='display:none'> </p>\n";
				//END LANDMARK MANAGING OFFICE INPUT
			echo"</div>\n";

			echo"<div class=\"forms w-50\">\n";
				//LANDMARK CITY LOCATION DROPDOWN INPUT
				echo form_label("CITY LOCATION:", 'location')."\n";

				$locationOptions = array();

				$locationOptions['default'] = "--SELECT CITY--";
				foreach ($cities as $city)
				{
					$locationOptions[$city['city_id']] = $city['city_name'];
				}

				$locationAttrib = array(
					'id'=>'location',
					'class'=>'form-control', //insert class
				);
				echo form_dropdown('location', $locationOptions, 'default', $locationAttrib);
				echo "<p id='locationValidation' style='display:none'> </p>\n";
				//END LANDMARK CITY LOCATION DROPDOWN INPUT
			echo"</div>\n";

			echo"<div class=\"forms\">\n";
				//LANDMARK IMAGE INPUT
				echo form_label("LANDMARK IMAGE:", 'landmarkImage')."\n<br>\n";
				$landmarkImageAttrib = array(
					'id'=>'landmarkImage',				
					'name'=>'landmarkImage',
					'class'=>''
				);
				echo form_upload($landmarkImageAttrib);
				echo "<p id='landmarkImageValidation' style='display:none'> </p>\n";			
				//END LANDMARK IMAGE INPUT
			echo"</div>\n";

			//SUBMIT BUTTON
			$addLandmarkAttrib = array(
				'class'=>'btn button',
				'onclick'=>'confirmLandmarkAction(\'adding\')'
			);
			echo form_submit('addLandmark', "ADD LANDMARK", $addLandmarkAttrib)."\n";
			//END SUBMIT BUTTON

			echo form_close()."\n";
			//END ADDING NEW LANDMARK FORM
		echo"</div>";
	?>
	</div>
</div>
