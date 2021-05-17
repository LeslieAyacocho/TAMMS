<nav id="sidebar-wrapper">
<div id="user">
	<img width="100px" src="<?php echo base_url().$_SESSION['displayPicture'];?>">
	 
	<div id="user-name">
		<p> <?php echo $_SESSION['fullName'];?> </p>
		<label> <a href="<?php echo base_url();?>usersc/logout"> Logout </a> </label>
	</div>
</div>

<div id="sidebar-menu">
<a href="<?php echo base_url();?>dashboard/" class=""><i class="fas fa-columns"> </i> dashboard</a><br>
<a href="<?php echo base_url();?>landmarksc/" class=""><i class="fas fa-map-marker-alt"> </i> landmarks</a><br>
<a href="<?php echo base_url();?>countriesc/" class=""><i class="fas fa-flag"> </i> countries </a><br>
<a href="<?php echo base_url();?>usersc" class=""><i class="fas fa-users"> </i> users </a><br>
<a href="#" class=""><i class="fas fas fa-user"> </i> account</a><br>

</div>
</nav>
