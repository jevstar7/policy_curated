<?php
/*
Author: Programmer Davis jsoftware7@gmail.com
Created: September 23 2021
Purpose: success alert 
*/
?>
<?php if(isset($_GET['SUCCESS'])){ ?>
<section>
	<div class="alert alert-success alert-dismissible" role="alert">
		<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
		<button type="button" class="close closeme" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
		</button>
		<strong>Done!</strong> <?php echo $_GET['SUCCESS']; ?>
	</div>
</section>
<?php unset($_GET['SUCCESS']); }//end if isset ?>