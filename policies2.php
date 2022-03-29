<!DOCTYPE HTML>
<!--
/*
Author: Programmer Davis jsoftware7@gmail.com
Created: March 28 2022
Purpose: view polices
*/
-->
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Guardsman University &dash; Policies</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"/>
		<script src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
		
		<link rel="stylesheet" href="policies.css" />
		<script src="policies.js"></script>
	</head>
	<body class="body-bg">
		<!-- gif conatiner for 712.gif used to show that page is loading -->
		<div class="se-pre-con"></div>
		
		<section>
			<div class="container-fluid">
				<div class="row w-back">
					<div class="col-md-12" >
						<img src="guardsmanuniversitylogoresize.jpg"/>
					</div>
				</div>
			</div>
		</section>
		
		<section>
			<div class="container-fluid">
				<div class="row head-bg">
					<div class="col-md-12 c-content" >
						<h1>Policies</h1>
					</div>
				</div>
			</div>
		</section>



		<?php require "view_policies_data.php"; ?> <!-- display section with db information -->
	
		<section class="clear-b">
			<div class="container-fluid">
				<div class="row foot-bg">
					<div class="col-md-12 c-content" >
						 <span>All Rights Reserved &copy: Guardsman Group</span>						
						<span><br>Telephone: 1 (876) 978-5760</span> 
					</div>
				</div>
			</div>
		</section>

	</body>
</html>