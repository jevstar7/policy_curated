<?php
/*
Author: Programmer Davis jsoftware7@gmail.com
Created: September 10 2021
Purpose: add curated
Dependency for resources.php
*/
//connection file
require 'db_connection.php';
//function file
require 'functions.php';

	//get from variables passing each through a sanitizer found in functions.php
	$txtResourceTitle = sanitizer($_POST["txtResourceTitle"]);
	$txtResourceDescription = sanitizer($_POST["txtResourceDescription"]);
	$txtResourceLink = sanitizer($_POST["txtResourceLink"]);
	//generate a three digit string used to rename uploaded file by adding it to the begining of the uploaded file name
	$uid = substr(uniqid(), 5,3);
	//rename uploaded file
	$resourceFilename = $uid."_".sanitizer($_FILES['resourceFilename']['name']);
	$resourceIcon = $uid."_".sanitizer($_FILES['resourceIcon']['name']);

//accepts only png jpeg jpg gif files for icon
if ( $_FILES['resourceIcon']['type'] == "image/png" || $_FILES['resourceIcon']['type'] == "image/jpg" || $_FILES['resourceIcon']['type'] == "image/jpeg" || $_FILES['resourceIcon']['type'] == "image/gif") {
	if (is_uploaded_file($_FILES['resourceIcon']['tmp_name'])) {
		//upload path
		$uploaddir = 'uploads/icons/';
		$uploadfile = $uploaddir . basename($resourceIcon);
		//move file to upload path
		move_uploaded_file($_FILES['resourceIcon']['tmp_name'], $uploadfile);
		$resourceIconLink = "uploads/icons/".$resourceIcon;
	}//if is_uploaded_file($_FILES['resourceIcon']['tmp_name'])
}//if $_FILES['resourceIcon']['type'] == "image/png" || $_FILES['resourceIcon']['type'] == "image/jpg" || $_FILES['resourceIcon']['type'] == "image/jpeg" || $_FILES['resourceIcon']['type'] == "image/gif"

//accepts only pdf mp4 jpg jpeg gif files 

if ($_FILES['resourceFilename']['type'] == "application/pdf" || $_FILES['resourceFilename']['type'] == "video/mp4" || $_FILES['resourceFilename']['type'] == "image/png" || $_FILES['resourceFilename']['type'] == "image/jpg" || $_FILES['resourceFilename']['type'] == "image/jpeg" || $_FILES['resourceFilename']['type'] == "image/gif") {
	if (is_uploaded_file($_FILES['resourceFilename']['tmp_name'])) {
		$fileName = $_FILES["resourceFilename"]["name"]; // The file name
		$fileTmpLoc = $_FILES["resourceFilename"]["tmp_name"]; // File in the PHP tmp folder
		$fileType = $_FILES["resourceFilename"]["type"]; // The type of file it is
		$fileSize = $_FILES["resourceFilename"]["size"]; // File size in bytes
		$fileErrorMsg = $_FILES["resourceFilename"]["error"]; // 0 for false... and 1 for true

		//upload path
		$uploaddir = 'uploads/';
		$uploadfile = $uploaddir . basename($resourceFilename);
		//move file to upload path
		move_uploaded_file($_FILES['resourceFilename']['tmp_name'], $uploadfile);
		if($txtResourceLink == "" && $resourceFilename != ""){
			//execute if resource link field is empty and a file is uploaded
			//create link for file as the user should leave resource Link field in the form blank
			$txtResourceLink = "uploads/".$resourceFilename;
		}
	//end if is_uploaded_file($_FILES['resourceFilename']['tmp_name'])	
	}
//end if $_FILES['resourceFilename']['type'] == "application/pdf" || $_FILES['resourceFilename']['type'] == "video/mp4" || $_FILES['resourceFilename']['type'] == "image/png" || $_FILES['resourceFilename']['type'] == "image/jpg" || $_FILES['resourceFilename']['type'] == "image/jpeg" || $_FILES['resourceFilename']['type'] == "image/gif"	
}

  //array of data to insert
  $data = array();
  $data['txtResourceTitle'] = $txtResourceTitle;
  $data['txtResourceDescription'] = $txtResourceDescription;
  $data['txtResourceLink'] = $txtResourceLink;
  
  if ($_FILES['resourceFilename']['name'] != ""){
	//execute if file was selected for upload
	$data['resourceFilename'] = $resourceFilename;  
  } 
  else if($_FILES['resourceFilename']['name'] == ""){
	 //execute if no file was selected for upload
	$data['resourceFilename'] = ""; 
  }
  
  if ($_FILES['resourceIcon']['name'] != ""){
	//execute if file was selected for upload for icon
	$data['resourceIcon'] = $resourceIconLink;  
  } 
  else if($_FILES['resourceIcon']['name'] == ""){
	 //execute if no file was selected for upload for icon
	$data['resourceIcon'] = ""; 
  }
  
try {
  
  // sql to insert table
  $sql = "INSERT INTO curated_resources (resource_title, resource_description, resource_link, resource_filename, resource_icon)VALUES (:txtResourceTitle, :txtResourceDescription, :txtResourceLink, :resourceFilename, :resourceIcon)";

  // insert record into db
  $x = runCreateSQL($db,$sql,$data);
  
} catch(Exception $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$db = null;
?>