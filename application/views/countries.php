<script src="<?php echo base_url();?>javascripts/countries_crud.js"> </script>

<div class="content">
   
<h3> COUNTRIES </h3>
	<?php
		echo "<div>\n";
			echo form_open(base_url().'countriesc/addcountry');
			$addCountryAttrib = array(
				'class'=>'btn button-view'
			);
			echo form_submit('addNewCountry', "ADD COUNTRY", $addCountryAttrib);
			echo form_close();
		echo "</div>\n";
	?>

	<div class="content-wrap table-responsive-sm text-center">
		<table class=" table table-sm table-bordered">
			<thead>
			<tr>
			<th scope="col" style="width:20%">COUNTRY CODE</th>
			<th scope="col">COUNTRY NAME</th>
			<th scope="col">CONTINENT</th>
			<th scope="col">ACTIONS</th>
			</tr>
			</thead>

			<tbody>
				<?php
					foreach ($countries as $country)
					{
						echo "<tr>\n";
						echo "<td>".$country['country_code']."</td>\n";
						echo "<td>".$country['country_name']."</td>\n";
						echo "<td>".$country['continent']."</td>\n";
						echo "<td> <a href=\"".base_url()."countriesc/deletecountry/".$country['country_id']."\" onclick=\"confirmDeleteCountry('".$country['country_name']."')\"> Delete </a>\n";
						echo "</tr>\n";
					}
				?>
			</tr>

			</tbody>
		</table>
	</div>
</div>
