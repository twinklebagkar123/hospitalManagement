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
								<h1 class="mainTitle">Patient | Patient Admission</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Patient</span>
								</li>
								<li class="active">
									<span>Patient Admission</span>
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
															<?php if(isset($_GET['patientId'])): ?>
															<input type="hidden" id="uid" name="uid" value="<?php echo $_GET['patientId']; ?>">
															<?php else: ?>
															<input type="hidden" id="uid" name="uid" value="">
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
		//$unqId = $_SESSION['id'];
		// $phno = $_POST['patcontact'];
		$uid = $_POST['uid'];
		// $firstname = $_POST['fname'];
		//$lastname = $_POST['lname'];
		// $address = $_POST['pataddress'];
		// $gender = $_POST['gender'];
		// $adharcardno = $_POST['patadhar'];
		$dateofadmission = $today;
		$doctor = $_POST['doctor'];
		$admissionType  = $_POST['admissionType'];
		// $patemail  = $_POST['patemail'];
		// $patage  = $_POST['patage'];
		$wn  = $_POST['wn'];
		$cpd = $_POST['cpd'];
		$advpaid = $_POST['aa'];
		$stat = false;
		// echo "test";
		try {
			if (!empty($uid)) {
				// echo "condition1";
				$query = "INSERT INTO `patientAdmission`( `uid`, `admissionType`, `docID`, `wardNo`, `dateofadmission`, `advance_paid`, `status`, `cpd`) VALUES ('$uid','$admissionType','$doctor','$wn','$dateofadmission','$advpaid','pending','$cpd')";
				$con->query($query);
				$stat = true;
				// echo $query . ")_)_)__)_)";
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