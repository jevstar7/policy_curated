<?php
/*
Author: Programmer Davis jsoftware7@gmail.com
Created: September 23 2021
Purpose: remove curated resource from db
Dependency for resources.php
*/
//connection file
require 'db_connection.php';
//function file
require 'functions.php';
//if deleting variable is set
	if(isset($_GET['deleting'])){
		switch ($_GET['deleting']) {
			case 'r':
				//is set on  variable
				if(isset($_REQUEST["id"])){	
					//create array with id of record to be deleted
					//create delete sql
					//run delete function
					$r=array();
					$r['id']=$_REQUEST["id"];
					$sql = 'DELETE FROM curated_resources WHERE resource_id =:id';
					$x=runDeleteSQL($db,$sql,$r);		 	
					if($x==1){
						//Success record deleted						
						$URL="resources.php?SUCCESS=Resource_Deleted";
						echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
						
					}else{
						//Failed record not deleted						
						$URL="resources.php?ERROR=Error_deleting_reesource";						
						echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
						
					}		
				}//end is set
				break;//w
							
			
			default:
			//ECHO $_GET['deleting'];
				# code...
				break;
		}
	}//if isset deleting
	
?>