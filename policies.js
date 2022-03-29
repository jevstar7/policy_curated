/*
Author: Programmer Davis jsoftware7@gmail.com
Created: March 28 2022
Purpose: apply functions
*/
$(document).ready(function() {
		//used to close alert after 2500 ms
		setTimeout(function(){				
			$(".closeme").click();
		}, 2500); 
		
		//used to show that page is loading
			$(window).load(function() {
				// Animate loader off screen
				$(".se-pre-con").fadeOut("slow");
			});
			
		//initiate datatable
		$('#dataTables-example').DataTable({
					responsive: true
		});
});	//ready	

//uploading animation begins//
function _(el) {
  return document.getElementById(el);
}

function uploadFile() { 
  console.log('ok'); //console output
  //form input variables
  var file = _("policyFilename").files[0];
  var picon = _("policyIcon").files[0];
  var ptitle = _("txtPolicyTitle").value; 
  var pdescription = _("txtPolicyDescription").value; 
  var plink = _("txtPolicyLink").value;
  
  //form input to formdata
  var formdata = new FormData();
  formdata.append("policyFilename", file);
  formdata.append("policyIcon", picon);
  formdata.append("txtPolicyTitle", ptitle);
  formdata.append("txtPolicyDescription", pdescription);
  formdata.append("txtPolicyLink", plink);
  
  //add listeners and POST to PHP file add_resource.php
  var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", progressHandler, false);
  ajax.addEventListener("load", completeHandler, false);
  ajax.addEventListener("error", errorHandler, false);
  ajax.addEventListener("abort", abortHandler, false);
  ajax.open("POST", "add_policy.php", true); 
  
  ajax.send(formdata);
} //uploadFile

function progressHandler(event) { 
	//execute during uploading
  _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
  var percent = (event.loaded / event.total) * 100;
  _("progressBar").value = Math.round(percent);
  _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
}

function completeHandler(event) {
	//execute when upload done
  _("status").innerHTML = event.target.responseText;
  _("progressBar").value = 0; //wil clear progress bar after successful upload
  window.location.href = "policies.php?SUCCESS=policy_inserted_successfully";//display success alert
}

function errorHandler(event) {
	//execute when upload failed
  _("status").innerHTML = "Upload Failed";
}

function abortHandler(event) {
	//execute when upload cancelled
  _("status").innerHTML = "Upload Aborted";
}
//uploading animation ends//
