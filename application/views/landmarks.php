<script src="<?php echo base_url();?>javascripts/landmarks_crud.js"/>></script>

<div class="content">
	<h3> LANDMARKS </h3>
	<?php
		echo "<div>\n";
			echo form_open(base_url().'landmarksc/addlandmark');
			$addLandmarkAttrib = array(
				'class'=>'btn button-view'
			);
			echo form_submit('addNewLandmark', "ADD LANDMARK", $addLandmarkAttrib);
			echo form_close();

		echo "</div>\n";
	?>
	<div class="content-wrap table-responsive-sm text-center">
		<table class=" table table-sm table-bordered">
			<thead>
			<tr>
			<th> LANDMARK NAME </th>
			<th> ADDRESS </th>
			<th> MANAGING OFFICE </th>
			<th> CITY LOCATION </th>
			<th> ACTIONS </th>
			</tr>
			</thead>

			<tbody>
			<?php
				foreach ($landmarks as $landmark)
				{
					echo "<tr>\n";
					echo "<td> <a href=\"".base_url()."landmarksc/viewlandmark/".$landmark['landmark_id']."\">".$landmark['landmark_name']."</td>\n";
					echo "<td>".$landmark['address']."</td>\n";
					echo "<td>".$landmark['managing_office']."</td>\n";
					echo "<td>".$landmark['city_name']."</td>\n";
					echo "<td> <a href=\"".base_url()."landmarksc/editlandmark/".$landmark['landmark_id']."\"> Edit 
						</a> | <a href=\"".base_url()."landmarksc/deletelandmark/".$landmark['landmark_id']."\" onclick=\"confirmDeleteLandmark('".$landmark['landmark_name']."')\"> Delete </a> </td>\n";
					echo "</tr>\n";
				}
			?>
			</tbody>
		</table>
	</div>
</div>