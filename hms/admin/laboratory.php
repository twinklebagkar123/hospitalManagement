<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();



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
				data: 'name=' + $("#name").val(),
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

												<form role="form" name="addmed" method="post" onSubmit="return valid();">

													<div class="form-group">
														<label for="name">
															Test Name:
														</label>

														<input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" required="true" onchange="checkemailAvailability()">
														<span id="email-availability-status"></span>

													</div>
													<div class="form-group">
														<label>
															Field Name:
														</label>
														<input type="text" id="fieldName" name="fieldName" class="form-control" placeholder="Add Test Field Name" required="true">


													</div>
													<div class="form-group">
														<label>
															Select Field Type:
														</label>
														<br>
														<input type="radio" id="html" name="fieldType" value="TextBox">
														<label for="html">TextBox</label><br>
														<input type="radio" id="css" name="fieldType" value="Radio Button">
														<label for="css">Radio Button</label><br>
														<input type="radio" id="javascript" name="fieldType" value="Check Box">
														<label for="javascript">Check Box</label>


													</div>
                                                     <a id ="addField">Add Field</a>


													<button type="submit" name="submit" class="btn btn-o btn-primary">
														Submit
													</button>
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
													<th>Field Type</th>
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
	<!-- start: JavaScript Event Handlers for this page -->
	<script src="assets/js/form-elements.js"></script>
	<script>
		jQuery(document).ready(function() {
			Main.init();
			FormElements.init();
			$("#addField").on("click", function(){
				var fieldName = $("#fieldName").val();
				var fieldType = $("input[name='fieldType']:checked").val();
				var trow = "<tr><td>"+fieldName+"</td><td>"+fieldType+"</td></tr>"; 
				$("#fieldShow").append(trow);
			});
			// 	$('#delete').on("click",".dellClass" ,function(){
			// 	console.log("heyyyy");


			//   var deleteid = $(this).data('id');
			//   console.log(deleteid);
			//   var confirmalert = confirm("Are you sure?");
			//   if (confirmalert == true) {
			// 	 // AJAX Request
			// 	 $.ajax({
			// 	   url: 'delete.php',
			// 	   type: 'POST',
			// 	   data: { procedureID :deleteid },
			// 	   success: function(response){

			// 		 if(response == 1){
			// 	   // Remove row from HTML Table
			// 	   $(el).closest('tr').fadeOut(800,function(){
			// 		  $(this).remove();
			// 	   });
			// 		 }else{
			// 	   alert('Invalid ID.');
			// 		 }

			// 	   }
			// 	 });
			//   }

			// });

		});
	</script>
	<!-- end: JavaScript Event Handlers for this page -->
	<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>