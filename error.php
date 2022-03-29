<?php
/*
Author: Programmer Davis jsoftware7@gmail.com
Created: September 23 2021
Purpose: error alert 
*/
?>
<?php if(isset($_GET['ERROR'])){ ?>
<section>
	<div class="alert alert-danger alert-dismissible" role="alert">
		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		<button type="button" class="close closeme" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
		</button>
		<strong>Sorry!</strong> <?php echo $_GET['ERROR']."!"; ?>
	</div>
</section>
<?php unset($_GET['ERROR']); }//end if isset ?>