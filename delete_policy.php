<?php
/*
Author: Programmer Davis jsoftware7@gmail.com
Created: March 28 2022
Purpose: remove policy from db
Dependency for polices.php
*/
//connection file
require 'db_connection.php';
//function file
require 'functions.php';
//if deleting variable is set
	if(isset($_GET['deleting'])){
		switch ($_GET['deleting']) {
			case 'p':
				//is set on  variable
				if(isset($_REQUEST["id"])){	
					//create array with id of record to be deleted
					//create delete sql
					//run delete function
					$p=array();
					$p['id']=$_REQUEST["id"];
					$sql = 'DELETE FROM policies WHERE policy_id =:id';
					$x=runDeleteSQL($db,$sql,$p);		 	
					if($x==1){
						//Success record deleted						
						$URL="policies.php?SUCCESS=Policy_Deleted";
						echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
						
					}else{
						//Failed record not deleted						
						$URL="policies.php?ERROR=Error_deleting_policy";						
						echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
						
					}		
				}//end is set
				break;//p
							
			
			default:
			//ECHO $_GET['deleting'];
				# code...
				break;
		}
	}//if isset deleting
	
?>