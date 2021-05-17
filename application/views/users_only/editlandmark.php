<script src="<?php echo base_url();?>javascripts/landmarks_crud.js"></script>

<div class="content">
    <div class="content-wrap">
	<?php
		echo "<h3> EDIT LANDMARK DETAILS</h3>\n";

		echo"<div class=\"form-wrapper col-md-6\">\n";
		echo form_open_multipart(base_url().'landmarksc/editLandmark'); //insert form class

		echo form_hidden('landmarkID', $landmark['landmark_id']);
		
		echo"<div class=\"forms\">\n";
			//LANDMARK NAME INPUT
			echo form_label("LANDMARK NAME:", 'landmarkName')."\n";
			$landmarkNameAttrib = array(
				'id'=>'landmarkName',
				'name'=>'landmarkName',
				'class'=>'form-control', //insert input class
				'value'=>$landmark['landmark_name']
			);
			echo form_input($landmarkNameAttrib);
			//END LANDMARK NAME INPUT
			echo "<p id='landmarkNameValidation' style='display: none'> </p>\n";
		echo"</div>\n";

		echo"<div class=\"forms\">\n";
			//LANDMARK ADDRESS INPUT
			echo form_label("LANDMARK ADDRESS:", 'address')."\n";
			$landmarkAddressAttrib = array(
				'id'=>'address',
				'name'=>'address',
				'class'=>'form-control', //insert input class
				'value'=>$landmark['address']
			);
			echo form_input($landmarkAddressAttrib);
			//END LANDMARK ADDRESS INPUT
			echo "<p id='addressValidation' style='display: none'> </p>\n";
		echo"</div>\n";

		echo"<div class=\"forms\">\n";
			//LANDMARK MANAGING OFFICE INPUT
			echo form_label("MANAGING OFFICE:", 'managingOffice')."\n";
			$managingOfficeAttrib = array(
				'id'=>'managingOffice',
				'name'=>'managingOffice',
				'class'=>'form-control', //insert input class
				'value'=>$landmark['managing_office']
			);
			echo form_input($managingOfficeAttrib);
			//END LANDMARK MANAGING OFFICE INPUT
			echo "<p id='managingOfficeValidation' style='display: none'> </p>\n";
		echo"</div>\n";

		echo"<div class=\"forms\">\n";
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
				'class'=>'form-control w-50', //insert class
			);
			echo form_dropdown('location', $locationOptions, 'default', $locationAttrib);
			echo "<p id='locationValidation' style='display: none'> </p>\n";
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
			echo form_upload($landmarkImageAttrib)."<br>\n";
			//END LANDMARK IMAGE INPUT

			echo"<div class=\"form-check form-check-inline\">\n";	
			    $retainImageAttrib = array(
			    	'id'=>'retainImage',
			    	'name'=>'retainImage',
			    	'class'=>'form-check-input',
			    );
			    echo form_checkbox($retainImageAttrib, 'retainImage', FALSE);
			    echo form_label('Retain Image', 'retainImage', "class='form-check-label'");
			echo"</div>\n";

			echo "<p id='landmarkImageValidation' style='display: none'> </p>\n";
		echo"</div>\n";

			//SUBMIT BUTTON
			$editLandmarkAttrib = array(
				'class'=>'btn button',
				'onclick'=>'confirmLandmarkAction(\'editing\')'
			);
			echo form_submit('editLandmark', "EDIT LANDMARK", $editLandmarkAttrib);
			//END SUBMIT BUTTON

			echo form_close()."\n";
			//END ADDING NEW LANDMARK FORM
		echo"</div>\n";
	?>
	</div>
</div>