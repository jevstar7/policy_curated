<!DOCTYPE HTML>
<!--
/*
Author: Programmer Davis jsoftware7@gmail.com
Created: March 28 2022
Purpose: view curated resources
*/
-->
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Guardsman University &dash; Curated Resources</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"/>
		<script src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
		
		<link rel="stylesheet" href="resources.css" />
		<script src="resources.js"></script>
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
						<h1>Curated Resources</h1>
					</div>
				</div>
			</div>
		</section>
		
		<!-- <section>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12" >
						<span class="b-content">Resource: Global Management: How Security is Changing in Jamaica</span>
						<br>The Global Management series from Security Management highlights security managers from different regions of the world to learn about the challenges they face and the management strategies that help them succeed. Please click the link below to see interview with Capt. Garth Gray, director of operations at Guardsman Group Limited.
						<br>
						<a target="_blank" href="https://nam02.safelinks.protection.outlook.com/?url=https://www.asisonline.org/security-management-magazine/latest-news/online-exclusives/2021/global-management-how-security-is-changing-in-jamaica/&data=04|01|GrayG@GuardsmanGroup.com|27846d0ccc8346ee0e0508d968017b97|2b38eb3e7d994626b41a77db4912df04|1|0|637655177884703373|Unknown|TWFpbGZsb3d8eyJWIjoiMC4wLjAwMDAiLCJQIjoiV2luMzIiLCJBTiI6Ik1haWwiLCJXVCI6Mn0=|1000&sdata=hiaRAfQVu3CzFGVVNahgWyHhVqIfu3o9QnoiyMrCHjs=&reserved=0">Global Management: How Security Has Changed</a>
						
					</div>
				</div>
			</div>
		</section> -->


		<?php require "view_resources_data.php"; ?> <!-- display section with db information -->
	
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