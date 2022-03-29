<?php
/*
Author: Programmer Davis jsoftware7@gmail.com
Created: March 28 2022
Purpose: add policy
Dependency for policies.php
*/
//connection file
require 'db_connection.php';
//function file
require 'functions.php';

	//get from variables passing each through a sanitizer found in functions.php
	$txtPolicyTitle = sanitizer($_POST["txtPolicyTitle"]);
	$txtPolicyDescription = sanitizer($_POST["txtPolicyDescription"]);
	$txtPolicyLink = sanitizer($_POST["txtPolicyLink"]);
	//generate a three digit string used to rename uploaded file by adding it to the begining of the uploaded file name
	$uid = substr(uniqid(), 5,3);
	//rename uploaded file
	$policyFilename = $uid."_".sanitizer($_FILES['policyFilename']['name']);
	$policyIcon = $uid."_".sanitizer($_FILES['policyIcon']['name']);

//accepts only png jpeg jpg gif files for icon
if ( $_FILES['policyIcon']['type'] == "image/png" || $_FILES['policyIcon']['type'] == "image/jpg" || $_FILES['policyIcon']['type'] == "image/jpeg" || $_FILES['policyIcon']['type'] == "image/gif") {
	if (is_uploaded_file($_FILES['policyIcon']['tmp_name'])) {
		//upload path
		$uploaddir = 'uploads/icons/';
		$uploadfile = $uploaddir . basename($policyIcon);
		//move file to upload path
		move_uploaded_file($_FILES['policyIcon']['tmp_name'], $uploadfile);
		$policyIconLink = "uploads/icons/".$policyIcon;
	}//if is_uploaded_file($_FILES['policyIcon']['tmp_name'])
}//if $_FILES['policyIcon']['type'] == "image/png" || $_FILES['policyIcon']['type'] == "image/jpg" || $_FILES['policyIcon']['type'] == "image/jpeg" || $_FILES['policyIcon']['type'] == "image/gif"

//accepts only pdf mp4 jpg jpeg gif files 

if ($_FILES['policyFilename']['type'] == "application/pdf" || $_FILES['policyFilename']['type'] == "video/mp4" || $_FILES['policyFilename']['type'] == "image/png" || $_FILES['policyFilename']['type'] == "image/jpg" || $_FILES['policyFilename']['type'] == "image/jpeg" || $_FILES['policyFilename']['type'] == "image/gif") {
	if (is_uploaded_file($_FILES['policyFilename']['tmp_name'])) {
		$fileName = $_FILES["policyFilename"]["name"]; // The file name
		$fileTmpLoc = $_FILES["policyFilename"]["tmp_name"]; // File in the PHP tmp folder
		$fileType = $_FILES["policyFilename"]["type"]; // The type of file it is
		$fileSize = $_FILES["policyFilename"]["size"]; // File size in bytes
		$fileErrorMsg = $_FILES["policyFilename"]["error"]; // 0 for false... and 1 for true

		//upload path
		$uploaddir = 'uploads/';
		$uploadfile = $uploaddir . basename($policyFilename);
		//move file to upload path
		move_uploaded_file($_FILES['policyFilename']['tmp_name'], $uploadfile);
		if($txtPolicyLink == "" && $policyFilename != ""){
			//execute if resource link field is empty and a file is uploaded
			//create link for file as the user should leave resource Link field in the form blank
			$txtPolicyLink = "uploads/".$policyFilename;
		}
	//end if is_uploaded_file($_FILES['policyFilename']['tmp_name'])	
	}
//end if $_FILES['policyFilename']['type'] == "application/pdf" || $_FILES['policyFilename']['type'] == "video/mp4" || $_FILES['policyFilename']['type'] == "image/png" || $_FILES['policyFilename']['type'] == "image/jpg" || $_FILES['policyFilename']['type'] == "image/jpeg" || $_FILES['policyFilename']['type'] == "image/gif"	
}

  //array of data to insert
  $data = array();
  $data['txtPolicyTitle'] = $txtPolicyTitle;
  $data['txtPolicyDescription'] = $txtPolicyDescription;
  $data['txtPolicyLink'] = $txtPolicyLink;
  
  if ($_FILES['policyFilename']['name'] != ""){
	//execute if file was selected for upload
	$data['policyFilename'] = $policyFilename;  
  } 
  else if($_FILES['policyFilename']['name'] == ""){
	 //execute if no file was selected for upload
	$data['policyFilename'] = ""; 
  }
  
  if ($_FILES['policyIcon']['name'] != ""){
	//execute if file was selected for upload for icon
	$data['policyIcon'] = $policyIconLink;  
  } 
  else if($_FILES['policyIcon']['name'] == ""){
	 //execute if no file was selected for upload for icon
	$data['policyIcon'] = ""; 
  }
  
try {
  
  // sql to insert table
  $sql = "INSERT INTO policies (policy_title, policy_description, policy_link, policy_filename, policy_icon)VALUES (:txtPolicyTitle, :txtPolicyDescription, :txtPolicyLink, :policyFilename, :policyIcon)";

  // insert record into db
  $x = runCreateSQL($db,$sql,$data);
  
} catch(Exception $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$db = null;
?>