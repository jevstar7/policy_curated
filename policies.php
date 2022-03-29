<!DOCTYPE HTML>
<!--
/*
Author: Programmer Davis jsoftware7@gmail.com
Created: March 28 2022
Purpose: add policies, remove policies
*/
-->
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Guardsman University &dash; Add or Remove Policies</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css" />
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
					<div class="col-md-12 c-content " >
						<h1>Policies</h1>
					</div>
				</div>
			</div>
		</section>
		
		<section>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 c-content " >
						<?php require 'success.php'; ?> <!-- success alert -->
						<?php require 'error.php'; ?> <!-- error alert -->
					</div>
				</div>
			</div>
		</section>
		
		<section>
			<div class="container-fluid">
				<div class="row w-back r-padding">
					<div class="col-md-12" >
						<!-- form input policy icon image uploaded to uploads/icons with a new file name, policy title, policy description, policy link, 
								policy image/pdf/mp4 uploaded to uploads folder with a new file name 
								policy icon and policy title are required -->
						<form enctype="multipart/form-data" class="form-horizontal" id="addresourcefrm" name="addresourcefrm"  method="POST">
							
							<div class="form-group"><span>Policy Icon</span>
								<input type="file" id="policyIcon" name="policyIcon" required><span>(png/jpeg/jpg/gif)</span>
							</div>
							
							<div class="form-group">
								<input class="form-control" maxlength="100" type="text" Placeholder="Title" name="txtPolicyTitle" id="txtPolicyTitle" value="" autocomplete="off" required />
							</div>
							
							<div class="form-group">
								<textarea id="txtPolicyDescription" value="" maxlength="65535" class="form-control"  placeholder="Description (optional)" name="txtPolicyDescription" rows="3" cols="3"></textarea>
							</div>
							
							<div class="form-group">
								<input class="form-control" type="text" maxlength="65535" Placeholder="Link (optional)" name="txtPolicyLink" id="txtPolicyLink" value="" autocomplete="off"  />
							</div> 
							
							<div class="form-group">
								<input type="file" id="policyFilename" name="policyFilename"><span>optional (pdf/mp4/png/jpeg/jpg/gif)</span>
							</div>
							
							<div class="form-group">
								<progress id="progressBar" value="0" max="100"></progress>
								<h4 id="status"></h4>
								<p id="loaded_n_total"></p>
							</div>
							
							<div class="form-group">
								<button type="submit" id="btnSubmit" onclick="uploadFile()" name="btnSubmit" class="btn btn-primary">
									<span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> ADD
								</button>
							</div>
							
						</form>
					</div> <!-- col-md-12 -->
				</div> <!-- row -->
			</div> <!-- container-fluid -->
		</section>		
		
		 <section>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 c-content" >
						 <hr> <!-- line separator -->
						 <a target="_blank" href="policies2.php">view policies as a learner </a>
					</div>
				</div>
			</div>
		</section>
		
		<!-- remove policies -->
		<section>
			<div class="container-fluid">
				<div class="row w-back">
					<div class="col-md-12 remove-container" >
						<div class="dataTable_wrapper">
							<table class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
										<th>Policies</th>
																	   
									</tr>
								</thead>
								<?php require 'remove_policy_data.php'; ?> <!-- display table body -->
							</table>
						</div><!-- /datatable wrapper --> 
					</div> <!-- col-md-12 -->
				</div> <!-- row -->
			</div> <!-- container-fluid -->
		</section>
		
		 <section>
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