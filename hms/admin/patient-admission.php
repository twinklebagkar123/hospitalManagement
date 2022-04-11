<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin | Patient Admission</title>

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
	<link rel="stylesheet" href="assets/css/custom.css?ver=2">
	<link rel="stylesheet" href="assets/css/plugins.css">
	<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />

	<script>
		function userAvailability() {
			$("#loaderIcon").show();
			jQuery.ajax({
				url: "check_availability.php",
				data: 'phone=' + $("#patcontact").val(),
				method: "POST",
				dataType: "JSON",
				success: function(data) {
					console.log(data);
					$('#fname').val(data.name);
					$('#pataddress').val(data.address);
					//$('#rg').val(data.gender);
					if (data.gender == 'male') {
						$("#rg-male").prop('checked', true);
					} else {
						$("#rg-female").prop('checked', true);
					}
					$('#patemail').val(data.email);
					$('#patage').val(data.age);
					$('#uid').val(data.uid);
					$('#adharCard').val(data.adharCard);
					$("#loaderIcon").hide();
				},
				error: function() {}
			});
		}
	</script>
	<script>
		function getdoc() {
			$.ajax({
				type: "POST",
				url: "get_doctor.php",
				data: 'doctor=yes',
				success: function(data) {
					$("#doctor").html(data);
				}
			});
		}
	</script>
</head>

<body>
	<?php echo "test2"; ?>
	<div id="app">
		<?php include('include/sidebar.php'); ?>
		<div class="app-content">
			<?php include('include/header.php'); ?>

			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">Admin | Patient Admission</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Patient</span>
								</li>
								<li class="active">
									<span>Admission</span>
								</li>
							</ol>
						</div>
					</section>
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">
								<div class="row margin-top-30">
									<div class="col-lg-8 col-md-12">
										<div class="panel panel-white">
											<div class="panel-heading">
												<h5 class="panel-title">Patient Admission</h5>
											</div>
											<div class="panel-body">
												<div class="row">
													<div class="col-md-6">
														<div class="patient_admission_step1_box"><a id="existing_patient_admission" href="javascript:void(0);">Existing Patient</a></div>
													</div>
													<div class="col-md-6">
														<div class="patient_admission_step1_box"><a id="register_patient_admission" href="user-registration.php">Register Patient</a></div>
													</div>
												</div>
												<div class="row" id="existing_customer_selectBy" style="margin-top: 30px; display: none;">
													<div class="col-md-12" id="existing_customer_sec">
														<p>Search By: </p>
														<div class="row">
															<div class="col-md-4 admission_step2_btn"><button data-customer_detail="customer_id_admission" class="btn btn-primary searchByAdmission">Customer Id</button></div>
															<div class="admission_step2_btn col-md-4 "><button data-customer_detail="customer_contact_admission" class="btn btn-primary searchByAdmission">Contact Number</button></div>
															<div class="col-md-4 admission_step2_btn"><button data-customer_detail="customer_adhar_admission" class="btn btn-primary searchByAdmission">Adhar Card</button></div>
														</div>
														<div class="row" style="margin-top: 30px;">
															<div class="col-md-6"><input type="text" id="existing_customer_input" class="form-control" readonly="true"></div>
															<div class="col-md-6"><a data-selected_searchby="" id="customer_input_search" class="btn btn-primary">Go</a>
																<span style="margin-left: 10px;">Patient Name: </span><span id="patient_name_existing"></span>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<form role="form" class="" method="post" style="margin-top: 30px;">
															<?php if (isset($_GET['patientId'])) : ?>
																<input type="hidden" id="uid" name="uid" value="<?php echo $_GET['patientId']; ?>">
															<?php else : ?>
																<input type="hidden" id="uid" name="uid" value="">
																<input type="hidden" id="package_id" name="package_id" value="0">
															<?php endif; ?>
															<div class="form-group">
																<label class="block">
																	Admission Type
																</label>
																<div class="clip-radio radio-primary">
																	<input type="radio" id="rg-opd" name="admissionType" value="opd">
																	<label for="rg-opd">
																		OPD
																	</label>
																	<input type="radio" id="rg-ide" name="admissionType" value="ide">
																	<label for="rg-ide">
																		IDE
																	</label>
																</div>
															</div>
															<div class="form-group">
																<label>
																	Ward No.
																</label>
																<input type="text" name="wn" class="form-control" placeholder="Enter Ward No." required="true">
															</div>
															<div class="form-group">
																<label>
																	Cost Per day
																</label>
																<input type="text" name="cpd" class="form-control" placeholder="Enter Cost Per day" required="true">
															</div>
															<div class="form-group">
																<label>
																	Advance Amount
																</label>
																<input type="text" name="aa" class="form-control" placeholder="Enter Advance Amount Paid" required="true">
															</div>
															<input type="hidden" name="doctor" value="1">
															<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
																Submit Patient Admission
															</button>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="panel panel-white">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade in" id="multiple_patient_same_contact_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="false">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle" style="display: inline-block;">Choose One Patient from below:</h5>
						<button type="button" class="close close_modal" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" id="multi_contact_results">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary close_modal" data-dismiss="modal">Close</button>
						<button type="button" id="multi_patient_submit" class="btn btn-primary">Confirm</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade in" id="ide_package_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="false">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle" style="display: inline-block;">Choose Package</h5>
						<button type="button" class="close close_modal_ide" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" id="multi_package_results">
						<div class="form-group">
							<label for="">
								Tariff Category
							</label>
							<select name="tariff_cat_id_ideModal" class="form-control" id="tariff_cat_id_ideModal" required="true">
								<option value="">Select Tariff Category</option>
								<?php $ret = mysqli_query($con, "SELECT * FROM tariff_category where 1");
								while ($row = mysqli_fetch_array($ret)) {
								?>
									<option value="<?php echo htmlentities($row['tariff_cat_id']); ?>">
										<?php echo htmlentities($row['tariff_cat_name']); ?>
									</option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="doctor">
								Tariff Class
							</label>
							<select name="tariff_class_name_ideModal" class="form-control" id="tariff_class_name_ideModal" required="true">
								<option value="">Select Tariff Class</option>
								<?php $ret = mysqli_query($con, "SELECT * FROM `tariff_class` where 1");
								while ($row = mysqli_fetch_array($ret)) {
								?>
									<option value="<?php echo htmlentities($row['tariff_class_id']); ?>">
										<?php echo htmlentities($row['tariff_class_name']); ?>
									</option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<button type="button" id="select_package" class="btn btn-primary">Proceed to select package</button>
						</div>
						<div id="package_list"></div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary close_modal_ide" data-dismiss="modal">Close</button>
						<button type="button" id="multi_package_submit" class="btn btn-primary">Confirm</button>
					</div>
				</div>
			</div>
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
	<script src="assets/js/custom.js"></script>
	<!-- start: JavaScript Event Handlers for this page -->
	<script src="assets/js/form-elements.js"></script>
	<script>
		jQuery(document).ready(function() {
			Main.init();
			FormElements.init();
		});
	</script>
	<!-- end: JavaScript Event Handlers for this page -->
	<!-- end: CLIP-TWO JAVASCRIPTS -->
	<?php


	if (isset($_POST['submit'])) {
		$uid = $_POST['uid'];
		$dateofadmission = $today;
		$doctor = $_POST['doctor'];
		$admissionType  = $_POST['admissionType'];
		$wn  = $_POST['wn'];
		$cpd = $_POST['cpd'];
		$advpaid = $_POST['aa'];
		$package_id = $_POST['package_id'];
		$stat = false;
		try {
			if (!empty($uid)) {
				$query = "INSERT INTO `patientAdmission`( `uid`, `admissionType`, `docID`, `wardNo`, `dateofadmission`, `advance_paid`, `status`, `cpd`, `package_id`) VALUES ('$uid','$admissionType','$doctor','$wn','$dateofadmission','$advpaid','pending','$cpd','$package_id')";
				$con->query($query);
				$stat = true;
			}
			if ($stat) {
				echo "<script>alert('Patient info added Successfully');</script>";
				header('location:patient-admission.php');
			}
		} catch (\Throwable $th) {
			echo $th;
		}
	}

	?>
</body>

</html>