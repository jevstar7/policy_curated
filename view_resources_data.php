<?php
/*
Author: Programmer Davis jsoftware7@gmail.com
Created: September 10 2021
Purpose: display curated resources 
Dependency for curatedresources2.php
*/
//connection file
require 'db_connection.php';
//function file
require 'functions.php';
try {		
  //create sql statement
  //run sql statement
  $sql = "SELECT resource_title, resource_description, resource_link, resource_filename, resource_icon FROM curated_resources";
  $data = array();
  $resource_results = runSQL($db,$sql,$data);
} catch(Exception $e) {
  echo $sql . "<br>" . $e->getMessage();
}
//display section with db information
echo'	<section class="">';

			if(empty($resource_results)){ 
			echo '<section>
				<div class="alert alert-info alert-dismissible" role="alert">
					<span class="glyphicon glyphicon-info" aria-hidden="true"></span>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
					</button>
					<strong>No Data Available!</strong> 
				</div>
			</section>';
			}//if(empty($resource_results))
			
		 foreach($resource_results AS $resource_re){ 
			echo '<div class="container-fluid f-left">
				
				<div class="row w-back ">
				
					<div class="r-box c-content " >
						  	<img src="'. escaper($resource_re["resource_icon"]).' " alt="resource_img" class="resource-img"> 
						  	<br><span class="b-content">Resource:  '. escaper($resource_re["resource_title"]).'  </span>
							<br><br>
								<span>
									
										'. escaper($resource_re["resource_description"]).'
										
								
								</span>	
							<br><br>
								<span>';
									
										$extension = escaper(substr($resource_re["resource_filename"], -3));
										if($extension == "mp4" || $extension == "MP4"){ echo'
											 <iframe class="r-size" src="'.escaper($resource_re["resource_link"]).'" allowfullscreen></iframe> 
										'; }
										else if($extension == "jpeg" || $extension == "jpg" || $extension == "gif" || $extension == "png" || $extension == "PNG" || $extension == "JPG"){ echo'
											 <img class="r-size" src="'.escaper($resource_re["resource_link"]).'" /> 
										'; } echo'
										
									
								</span>			
							<br><br>';
							
								if($extension == "pdf" || $extension == "PDF" ){ echo'
											 <a target="_blank" class="btn btn-primary btn-sm" href="'.escaper($resource_re["resource_link"]).'">View</a> 
										'; }
										else if ($resource_re["resource_filename"] == ""){ echo'
											<a target="_blank" class="btn btn-primary btn-sm" href="'.escaper($resource_re["resource_link"]).'">View</a>
										'; } echo'
							
							
					</div>
								
				</div>
				
			</div>';
			 }
		echo '</section>';
?>