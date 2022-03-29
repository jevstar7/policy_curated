<?php
/*
Author: Programmer Davis jsoftware7@gmail.com
Created: March 28 2022
Purpose: display policies
Dependency for policies2.php
*/
//connection file
require 'db_connection.php';
//function file
require 'functions.php';
try {		
  //create sql statement
  //run sql statement
  $sql = "SELECT policy_title, policy_description, policy_link, policy_filename, policy_icon FROM policies";
  $data = array();
  $policy_results = runSQL($db,$sql,$data);
} catch(Exception $e) {
  echo $sql . "<br>" . $e->getMessage();
}
//display section with db information
echo'	<section class="">';
			if(empty($policy_results)){ 
			echo '<section>
				<div class="alert alert-info alert-dismissible" role="alert">
					<span class="glyphicon glyphicon-info" aria-hidden="true"></span>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
					</button>
					<strong>No Data Available!</strong> 
				</div>
			</section>';
			}//if(empty($policy_results))
		 foreach($policy_results AS $policy_re){ 
			echo '<div class="container-fluid f-left">
				
				<div class="row w-back ">
				
					<div class="p-box c-content " >
						  	<img src="'. escaper($policy_re["policy_icon"]).' " alt="policy_img" class="policy-img"> 
						  	<br><span class="b-content">Resource:  '. escaper($policy_re["policy_title"]).'  </span>
							<br><br>
								<span>
									
										'. escaper($policy_re["policy_description"]).'
										
								
								</span>	
							<br><br>
								<span>';
									
										$extension = escaper(substr($policy_re["policy_filename"], -3));
										if($extension == "mp4" || $extension == "MP4"){ echo'
											 <iframe class="p-size" src="'.escaper($policy_re["policy_link"]).'" allowfullscreen></iframe> 
										'; }
										else if($extension == "jpeg" || $extension == "jpg" || $extension == "gif" || $extension == "png" || $extension == "PNG" || $extension == "JPG"){ echo'
											 <img class="p-size" src="'.escaper($policy_re["policy_link"]).'" /> 
										'; } echo'
										
									
								</span>			
							<br><br>';
							
								if($extension == "pdf" || $extension == "PDF" ){ echo'
											 <a target="_blank" class="btn btn-primary btn-sm" href="'.escaper($policy_re["policy_link"]).'">View</a> 
										'; }
										else if ($policy_re["policy_filename"] == ""){ echo'
											<a target="_blank" class="btn btn-primary btn-sm" href="'.escaper($policy_re["policy_link"]).'">View</a>
										'; } echo'
							
							
					</div>
								
				</div>
				
			</div>';
			 }
		echo '</section>';
?>