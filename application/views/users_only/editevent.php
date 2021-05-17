<script src="<?php echo base_url();?>javascripts/events_crud.js" type="text/javascript"></script>
<div class="content">
    <div class="content-wrap">
<?php
	echo "<h3> EDIT EVENT DETAILS </h3>\n";

	echo"<div class=\"form-wrapper col-md-4\">\n";
		//EDITING EVENT FORM
		echo form_open(base_url().'eventsc/editevent');//insert form class

		echo"<div class=\"forms\">\n";
			//EVENT NAME INPUT
			echo form_label("EVENT NAME", 'eventName')."\n";
			$eventNameAttrib = array(
				'id'=>'eventName',
				'name'=>'eventName',
				'class'=>'form-control',//insert input class
				'value'=>''
			);
			echo form_input($eventNameAttrib);
			echo "<p id='eventNameValidation' style='display:none'></p>\n";
			//END EVENT NAME INPUT
		echo"</div>\n";

		echo"<div class=\"forms\">\n";
			//EVENT START DATE INPUT
			echo form_label("START DATE", 'startDate')."\n";
			echo "<input type='date' id='startDate' name='startDate' class='form-control' />\n";
			echo "<p id='startDateValidation' style='display:none'></p>\n";
			//END EVENT START DATE INPUT
			echo"</div>\n";

		echo"<div class=\"forms\">\n";
			//EVENT END DATE INPUT
			echo form_label("END DATE", 'endDate')."\n";
			echo "<input type='date' id='endDate' name='endDate' class='form-control' />\n";
			echo "<p id='endDateValidation' style='display:none'></p>\n";
			//END EVENT END DATE INPUT
		echo"</div>\n";

		//EDIT EVENT SUBMIT BUTTON
		$editEventAttrib = array(
			'class'=>'btn button',//insert button class
			'onclick'=>'confirmEventAction(\'editing\')'
		);
		echo form_submit('editEvent', "EDIT EVENT", $editEventAttrib)."\n";
		//END EDIT EVENT SUBMIT BUTTON

		echo form_close()."\n";
		//END EDITING EVENT FORM
	echo"</div>";
?>
</div>
</div>