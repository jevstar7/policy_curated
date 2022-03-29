<?php
/*
Author: Programmer Davis jsoftware7@gmail.com
Created: March 28 2022
Purpose: display remove policy table body
Dependency for policies.php
*/
//connection file
require 'db_connection.php';
try {	
  //select data from db
  $sql = "SELECT policy_title, policy_description, policy_link, policy_id FROM policies";
  $data = array();
  $policy_results = runSQL($db,$sql,$data);
  
} catch(Exception $e) {
  echo $sql . "<br>" . $e->getMessage();
}
//display table tbody
echo '<tbody>
		 '; foreach($policy_results AS $policy_re){ echo'
			<tr class="t-padding">
				<td>							
					<br><span class="b-content">Resource: '.$policy_re["policy_title"].'</span>
					<br>'.$policy_re["policy_description"].'
					<br>
				
					';  echo'
				
					<a target="_blank" href="'.$policy_re["policy_link"].'">View</a>
					<br>
					<a href="delete_policy.php?deleting=p&id='.$policy_re["policy_id"].'">
					<button type="button" id="btnSubmit" name="btnSubmit" class="btn btn-danger">
						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Remove
					</button>
					</a>
				</td>                                        
				
			</tr>
		 '; } echo' 
		
</tbody> ';
?>