<?php
session_start();
// error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
{
	$labTestName=$_POST['name'];
	$labFields=$_POST['fieldArray'];
	$charges=$_POST['charges'];
	$referance_range=$_POST['referance_range'];
	$units=$_POST['units'];
	$main_title = implode(',', $_POST['main_titles']);
	print_r($engine2);
	$mt="";  

$html_test_default_info=htmlentities($_POST['html_test_default_info'], ENT_QUOTES) ;

	$query = "INSERT INTO `laboratoryTestList`(`labTestName`, `labFields`, `labCharges`, `test_more_info`,`main_titles`,`referance_range`) VALUES ('".$labTestName."','".$labFields."','".$charges."','".$html_test_default_info."','".$main_title."','".$referance_range."')";
	 $con->query($query);
	

print_r($query);
	
	$stat = true;
	if($stat)
	{
		echo "<script>alert('Successfully added. ');</script>";
	}
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin | Laboratory Section</title>

	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
	<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
	<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
	<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
	<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/plugins.css">
	<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	<script type="text/javascript">
		function valid() {
			if (document.adddoc.npass.value != document.adddoc.cfpass.value) {
				alert("Password and Confirm Password Field do not match  !!");
				document.adddoc.cfpass.focus();
				return false;
			}
			return true;
		}
	</script>


	<script>
		function checkemailAvailability() {
			$("#loaderIcon").show();
			jQuery.ajax({
				url: "check_availability.php",
				data: 'nameTest=' + $("#name").val(),
				type: "POST",
				success: function(data) {
					$("#email-availability-status").html(data);
					$("#loaderIcon").hide();
				},
				error: function() {}
			});
		}
	</script>



</head>

<body>

<style>
.no_value_style {
	margin-top: 26px;
    font-size: 23px;

}
.no_value_style > input{
	width: 20px;
	height: 20px;
}

</style>
	<div id="app">
		<?php include('include/sidebar.php'); ?>
		<div class="app-content">

			<?php include('include/header.php'); ?>

			<!-- end: TOP NAVBAR -->
			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">Admin | Procedure Section</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Admin</span>
								</li>
								<li class="active">
									<span>Create Test</span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">

								<div class="row margin-top-30">
									<div class="col-lg-8 col-md-12">
										<div class="panel panel-white">
											<div class="panel-heading">
												<h5 class="panel-title">Add Test Details</h5>
											</div>
											<div class="panel-body">

												<form role="form" name="addmed" id="addmed" method="post" >

													<div class="form-group">
														<label for="name">
															Test Name:
														</label>

														<input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" required="true" >
														

													</div>
													
													
													<div>
													
													<input type="checkbox" id="units"  value="1">
													<label for=""> Units</label>
													<input type="checkbox" id="ref"  value="1">
													<label for=""> Referance Range</label>
													<input type="checkbox" id="normalRange"  value="1">
													<label for=""> Normal  Range</label>
												</div>
													<div class="row">
														<div class="col-sm-3">
													<div class="form-group">
														
														<label>
															Field Name:
														</label>
														<input type="text" id="fieldName" name="fieldName" class="form-control" placeholder="Add Test Field Name" required="true" onkeypress="return blockSpecialChar(event)">
														<input type="hidden" id="fieldArray" name="fieldArray" class="form-control" placeholder="Add Test Field Name" >
														<br>
														<a class="btn btn-o btn-primary" id ="addField">Add Field</a>

														<br>
													</div>
														</div>
														<!-- <div class="wrapperDiv">
													

													<input type="checkbox" id="isFeeDistributed"   name="isFeeDistributed"  value="1">
													<label > Fee Distribution</label>
														<div class="feeDistribution" style="display:none; margin-bottom: 8px;">
															<div class="row">
														
															<div class="col-md-4">
															HOSPITALISATION
																<input type="text" id="hospitalisation" placeholder="hospitalisation Charges " class="form-control" autocomplete="off" style="margin-bottom: 5px;">

															</div>
															<div class="col-md-4">
															MEDICAL OFFICER
																<input type="text" id="medofficer" placeholder=" MEDICAL OFFICER Charges" class="form-control " autocomplete="off" style="margin-bottom: 5px;">

															</div>
															<div class="col-md-4">
																NURSING
																<input type="text" id="nursing" placeholder="NURSING Charges" class="form-control medicineSugg" id="autosuggest" autocomplete="off" style="margin-bottom: 5px;">

															</div>
															</div>
															</div>
														</div> -->
														 <div class="col-sm-3 referance_r" style="display:none; ">
														<div class="form-group">
														
														<label>
															Reference Range:
														</label>
														<input type="text" id="referance_value" name="referance_value" class="form-control" placeholder="Add Reference Range" required="true" >
														 <!-- <input type="hidden" id="referance_range" name="referance_range" class="form-control" placeholder="Add Reference Range" >  -->
														<br>
														
														<br>
													</div>
													
													</div>
													<div class="col-sm-3 units" style="display:none; ">
														<div class="form-group">
														
														<label>
														Units:
														</label>
														<input type="text" id="units_value" name="units_value" class="form-control" placeholder="Add Reference Range" required="true" >
														 <!-- <input type="hidden" id="referance_range" name="referance_range" class="form-control" placeholder="Add Reference Range" >  -->
														<br>
														
														<br>
													</div>
													
													</div>
													<div class="col-sm-3 normalRange" style="display:none; ">
														<div class="form-group">
														
														<label>
														Normal Range:
														</label>
														<input type="text" id="normalRange_value" name="normalRange_value" class="form-control" placeholder="Add Normal Range" required="true" >
														 <!-- <input type="hidden" id="referance_range" name="referance_range" class="form-control" placeholder="Add Reference Range" >  -->
														<br>
														
														<br>
													</div>
													
													</div>
													<!--
													<div class="col-sm-3">
														<div class="form-group">
														
														<label>
															Units :
														</label>
														<input type="text" id="units" name="units" class="form-control" placeholder="Add units" required="true" onkeypress="return blockSpecialChar(event)">
														 <input type="hidden" id="units" name="units" class="form-control" placeholder="Add  units" > 
														<br>
														
														<br>
													</div>
													
													</div> -->
														
													<div class="col-sm-3">
													<div class="no_value_style">
													<label> No value</label>
													<input type="checkbox" value="*" id="noValueCheckbox" placeholder="No value">  

													</div>
													</div>
													</div>
													<div class="form-group">
														<label>
															Test Charges:
														</label>
														<input type="text" name="charges" class="form-control" placeholder="Add Test Field Name" required="true">
														

													</div>
													<div class="wrapperDiv">
													
													
													<input type="checkbox" id="test_more_info"   name="test_more_info" value="1">
													<label > Test More Info</label>
													<div id="editor">
    
</div>
													</div>
												<!-- <div>
<input type="checkbox" id="main_titles" name="main_titles[]" value="Test">
<label for="vehicle1"> Test</label>
<input type="checkbox" id="main_titles" name="main_titles[]" value="Result">
<label for="vehicle2"> Result</label>
<input type="checkbox" id="main_titles" name="main_titles[]" value="Units">
<label for="vehicle3"> Units</label>
<input type="checkbox" id="main_titles" name="main_titles[]" value="Referance_Range">
<label for="vehicle3"> Referance Range</label></div>
<input type="checkbox" id="main_titles" name="main_titles[]" value="Normal_Range">
<label for="vehicle3"> Normal  Range</label></div> -->
          
													<button type="submit" name="submit" class="btn btn-o btn-primary">
														Submit Test
													</button>
													<input type="hidden" name="html_test_default_info" id="html_test_default_info">
												</form>
											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="panel panel-white allMedicines">


								</div>
							</div>



							<div class="container-fluid container-fullw bg-white">


								<div class="row">
									<div class="col-md-12">
										<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Procedures</span></h5>
										<p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
											<?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
										<table class="table table-hover" id="sample-table-1">
											<thead>
												<tr>
													
													<th>Field Name</th>
													<th>Action</th>

												</tr>
											</thead>
											<tbody id="fieldShow">
											


											</tbody>
										</table>
									</div>
								 
								</div>
							</div>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end: BASIC EXAMPLE -->






	<!-- end: SELECT BOXES -->

	</div>
	</div>
	</div>
	<!-- start: FOOTER -->
	<?php include('include/footer.php'); ?>
	<!-- end: FOOTER -->

	<!-- start: SETTINGS -->
	<?php include('include/setting.php'); ?>

	<!-- end: SETTINGS -->
	</div>
	<!-- start: MAIN JAVASCRIPTS -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/modernizr/modernizr.js"></script>
	<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="vendor/switchery/switchery.min.js"></script>
	

	<!-- end: MAIN JAVASCRIPTS -->
	<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
	<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
	<script src="vendor/autosize/autosize.min.js"></script>
	<script src="vendor/selectFx/classie.js"></script>
	<script src="vendor/selectFx/selectFx.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
	<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<!-- start: CLIP-TWO JAVASCRIPTS -->
	<script src="assets/js/main.js"></script>
	<script src="assets/ckeditor/ckeditor.js"></script>
	 
	<!-- start: JavaScript Event Handlers for this page -->
	<script src="assets/js/form-elements.js"></script>
	<script type="text/javascript">
    function blockSpecialChar(e){
        var k;
        document.all ? k = e.keyCode : k = e.which;
        return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57));
        }
    </script>
	<script>
		var ckeditor = [];
		jQuery(document).ready(function() {

			




			CKEDITOR.replace( 'editor' );
			$(document).on("change","#test_more_info ", function(){
			if($('#test_more_info').is(":checked")){
					console.log("checked");
					$("#cke_editor").show();

				}
        else
            {$("#cke_editor").hide();}

			});

			$(document).one("submit","#addmed", function(e){
        e.preventDefault();
        console.log("tetstt");
        var data = CKEDITOR.instances.editor.getData();
        $('#html_test_default_info').val(data);
console.log(data);
    //    $(this).submit();
        
    });

	


			Main.init();
			FormElements.init();
			var values = [];
			var jsonFieldDetails = [];
			$("#addField").on("click", function(){
				var fieldName = $("#fieldName").val();
				var unit_check =$("#units").is(":checked");
					var referanceRange_check =$("#ref").is(":checked");
					var normalRange_check =$("#normalRange").is(":checked");
					var unit,referanceRange,normalRange;
					if(unit_check){
						unit=$("#units_value").val();
					}
					if(referanceRange_check){
						referanceRange=$("#referance_value").val();
					}
					if(normalRange_check){
						normalRange=$("#normalRange_value").val();
					}


						
					values.push({"fieldName":fieldName,"units":units,"referanceRange":referanceRange,"normalRange":normalRange});
					console.log(values);

				
				if($('#noValueCheckbox').is(':checked')){
					var trow = "<tr><td>"+fieldName+"</td><td class='remove' data-name='"+fieldName+"'>X</td></tr>"; 
					$("#fieldShow").append(trow);
					jsonFieldDetails.push(fieldName+'*');
					jsonFieldDetailsString = jsonFieldDetails.toString();
					$("#fieldArray").val(jsonFieldDetailsString);
				}else{
					var trow = "<tr><td>"+fieldName+"</td><td class='remove' data-name='"+fieldName+"'>X</td></tr>"; 
					$("#fieldShow").append(trow);
					jsonFieldDetails.push(fieldName);
					jsonFieldDetailsString = jsonFieldDetails.toString();
					$("#fieldArray").val(jsonFieldDetailsString);
				}
				
				
				
			});
			$(document).on("click" ,".remove",function(){
				var shanti = $(this).data("name");
              var index = jsonFieldDetails.indexOf(shanti);
			  if (index > -1) {
				jsonFieldDetails.splice(index, 1);
			}
			  console.log(jsonFieldDetails);
			  jsonFieldDetailsString = jsonFieldDetails.toString();
				$("#fieldArray").val(jsonFieldDetailsString);
			   $(this).parent().remove();

			});
			
			

		});

		
			$(document).on("change","#units", function(){
		console.log("whjevdjuahv");	
		if($('#units').is(":checked")){
					console.log("whjevdjuahv");
					$(".units").show();

				}
        else
            {$(".units").hide();}

			});
			$(document).on("change","#ref", function(){
		console.log("whjevdjuahv");	
		if($('#ref').is(":checked")){
					console.log("whjevdjuahv");
					$(".referance_r").show();

				}
        else
            {$(".referance_r").hide();}

			});
			$(document).on("change","#normalRange", function(){
		console.log("whjevdjuahv");	
		if($('#normalRange').is(":checked")){
					console.log("whjevdjuahv");
					$(".normalRange").show();

				}
        else
            {$(".normalRange").hide();}

			});

			

	</script>
	<!-- end: JavaScript Event Handlers for this page -->
	<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>