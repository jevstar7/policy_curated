<?php
/*
Author: Programmer Davis jsoftware7@gmail.com
Created: September 23 2021
Purpose: display remove curated resources table body
Dependency for resources.php
*/
//connection file
require 'db_connection.php';
try {	
  //select data from db
  $sql = "SELECT resource_title, resource_description, resource_link, resource_id FROM curated_resources";
  $data = array();
  $resource_results = runSQL($db,$sql,$data);
  
} catch(Exception $e) {
  echo $sql . "<br>" . $e->getMessage();
}
//display table tbody
echo '<tbody>
		 '; foreach($resource_results AS $resource_re){ echo'
			<tr class="t-padding">
				<td>							
					<br><span class="b-content">Resource: '.$resource_re["resource_title"].'</span>
					<br>'.$resource_re["resource_description"].'
					<br>
				
					';  echo'
				
					<a target="_blank" href="'.$resource_re["resource_link"].'">View</a>
					<br>
					<a href="delete_resource.php?deleting=r&id='.$resource_re["resource_id"].'">
					<button type="button" id="btnSubmit" name="btnSubmit" class="btn btn-danger">
						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Remove
					</button>
					</a>
				</td>                                        
				
			</tr>
		 '; } echo' 
		
</tbody> ';
?>