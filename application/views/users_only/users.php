<script src="<?php echo base_url();?>javascripts/users_crud.js"> </script>

<div class="content">

<h3> USERS ACCOUNT </h3>

<div class="content-wrap table-responsive-sm text-center">
	<table class="table table-sm table-bordered">
		<thead>
			<th> FULL NAME </th>
			<th> EMAIL ADDRESS </th>
			<th> CITY </th>
			<th> ACTION </th>
		</thead>

		<tbody>
			<?php
				foreach ($users as $user)
				{
					echo "<tr>\n";
					echo "<td>".$user['full_name']."</td>\n";
					echo "<td>".$user['email_address']."</td>\n";
					echo "<td>".$user['city_name']."</td>\n";
					echo "<td> <a href=\"".base_url()."usersc/deleteaccount/".$user['user_id']."\" onclick=\"confirmDeleteAccount('".$user['full_name']."')\"> Delete Account </a> </td>\n";
					echo "</tr>\n";
				}	
			?>
		</tbody>
	</table>
</div>

<h3> USER ACCOUNT APPROVAL REQUESTS </h3>

<div class="content-wrap table-responsive-sm text-center">
	<table class="table table-sm table-bordered">
		<thead>
			<th> FULL NAME </th>
			<th> EMAIL ADDRESS </th>
			<th> ACTION </th>
		</thead>

		<tbody>
		<?php
			foreach ($requests as $request)
			{
				echo "<tr>\n";
				echo "<td>".$request['full_name']."</td>\n";
				echo "<td>".$request['email_address']."</td>\n";
				echo "<td> <a href=\"".base_url()."usersc/approveaccount/".$request['request_id']."/".$request['email_address']."\" onclick=\"confirmApproveAccount('".$request['full_name']."')\"> Approve Request </a> </td>\n";
				echo "</tr>\n";
			}
		?>
		</tbody>
	</table>
</div>

</div>