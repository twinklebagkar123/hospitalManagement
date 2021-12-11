<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if (isset($_POST['submit'])) {

	$vid = $_GET['viewid'];
	$bp = $_POST['bp'];
	$bs = $_POST['bs'];
	$weight = $_POST['weight'];
	$temp = $_POST['temp'];
	$pres = $_POST['pres'];


	$query .= mysqli_query($con, "insert   tblmedicalhistory(PatientID,BloodPressure,BloodSugar,Weight,Temperature,MedicalPres)value('$vid','$bp','$bs','$weight','$temp','$pres')");
	if ($query) {
		echo '<script>alert("Medicle history has been added.")</script>';
		echo "<script>window.location.href ='manage-patient.php'</script>";
	} else {
		echo '<script>alert("Something Went Wrong. Please try again")</script>';
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Doctor | Manage Patients</title>

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
</head>

<body>
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
								<h1 class="mainTitle">Doctor | Manage Patients</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Doctor</span>
								</li>
								<li class="active">
									<span>Manage Patients</span>
								</li>
							</ol>
						</div>
					</section>
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">
								<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Patients</span></h5>

								<?php
								$vid = $_GET['viewid'];
								$ret = mysqli_query($con, "select * from tblpatient where ID='$vid'");
								$cnt = 1;
								while ($row = mysqli_fetch_array($ret)) {
								?>
									<table border="1" class="table table-bordered">
										<tr align="center">
											<td colspan="4" style="font-size:20px;color:blue">
												Patient Details</td>
										</tr>

										<tr>
											<th scope>Patient Name</th>
											<td><?php echo $row['PatientName']; ?></td>
											<th scope>Patient Email</th>
											<td><?php echo $row['PatientEmail']; ?></td>
										</tr>
										<tr>
											<th scope>Patient Mobile Number</th>
											<td><?php echo $row['PatientContno']; ?></td>
											<th>Patient Address</th>
											<td><?php echo $row['PatientAdd']; ?></td>
										</tr>
										<tr>
											<th>Patient Gender</th>
											<td><?php echo $row['PatientGender']; ?></td>
											<th>Patient Age</th>
											<td><?php echo $row['PatientAge']; ?></td>
										</tr>
										<tr>

											<th>Patient Medical History(if any)</th>
											<td><?php echo $row['PatientMedhis']; ?></td>
											<th>Patient Reg Date</th>
											<td><?php echo $row['CreationDate']; ?></td>
										</tr>

									<?php } ?>
									</table>
									<?php
									$admissionQuery = "SELECT * FROM `patientAdmission` where uid = '$vid'";
									$result = $con->query($admissionQuery);
									?>
									<table class="table table-bordered dt-responsive nowrap">
										<thead>
											<th>#</th>
											<th>Admission Date</th>
											<th>Admission Type</th>
											<th>Diagnosis</th>
											<th>Discharge Date</th>
											<th>Reports</th>
										</thead>
										<tbody id="viewReport">
											<?php
											$sr = 1;
											while ($row = mysqli_fetch_array($result)) {
											?>
												<tr>
													<td><?php echo $sr; ?></td>
													<td id="date"><?php echo $row['dateofadmission']; ?></td>
													<td><?php echo $row['admissionType']; ?></td>
													<td><?php //echo $row['dateofadmission'];
														?></td>
													<td><?php echo $row['dateofdischarge']; ?></td>
													<td><button type="button" data-admission="<?php echo $row['dateofadmission']; ?>" data-discharge="<?php echo $row['dateofdischarge']; ?>" data-admissionID="<?php echo $row['unqId']; ?>" class="btn btn-primary">View</button></td>
												</tr>
											<?php
												$sr++;
											}
											?>
										</tbody>
									</table>
									<?php

									?>
									<div id="test"></div>
									<?php

									$ret = mysqli_query($con, "select * from tblmedicalhistory  where PatientID='$vid'");



									?>
									<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
										<tr align="center">
											<th colspan="8">Medical History</th>
										</tr>
										<tr>
											<th>#</th>
											<th>Blood Pressure</th>
											<th>Weight</th>
											<th>Blood Sugar</th>
											<th>Body Temprature</th>
											<th>Medical Prescription</th>
											<th>Visit Date</th>
										</tr>
										<?php
										$tpr = array();
										$visit = array();
										while ($row = mysqli_fetch_array($ret)) {
											array_push($tpr, $row['Temperature']);
											array_push($visit, $row['CreationDate']);
										?>
											<tr>
												<td><?php echo $cnt; ?></td>
												<td><?php echo $row['BloodPressure']; ?></td>
												<td><?php echo $row['Weight']; ?></td>
												<td><?php echo $row['BloodSugar']; ?></td>
												<td><?php echo $row['Temperature']; ?></td>
												<td><?php echo $row['MedicalPres']; ?></td>
												<td><?php echo $row['CreationDate']; ?></td>
											</tr>
										<?php $cnt = $cnt + 1;
										} ?>
									</table>
									<div>
										<canvas id="line-chart" width="400" height="100"></canvas>
										<canvas id="tpr-chart" width="400" height="100"></canvas>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<?php
	//code for blood sugar chart

	// 	$period = new DatePeriod(
	// 		new DateTime('2021-06-01'),
	// 		new DateInterval('P1D'),
	// 		new DateTime('2021-12-01')
	//    );
	//    foreach ($period as $key => $value) { print_r($value->format('Y-m-d') ); }

	?>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
	<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<!-- start: CLIP-TWO JAVASCRIPTS -->
	<script src="assets/js/main.js"></script>
	<!-- start: JavaScript Event Handlers for this page -->
	<script src="assets/js/form-elements.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"></script>
	<script>
		jQuery(document).ready(function() {
			Main.init();
			FormElements.init();
			var tpr;
			var tprDate;
			$("#viewReport button").click(function() {
				var admissionid = $(this).data("admissionid");
				var admission = $(this).data("admission");
				var discharge = $(this).data("discharge");
				//var admissionid = $(this).data("admissionid");
				console.log(admission);
				jQuery.ajax({
					url: "fetchReports.php",
					data: {
						admissionid: admissionid,
						admission: admission,
						discharge: discharge,
						vid: <?php echo $vid; ?>
					},
					method: "POST",
					dataType: "JSON",
					success: function(data) {
						console.log(data.bsDates);
						tpr = data.tpr;
						tprDate = data.tprDate
						$("#test").html(data.html);
						new Chart(document.getElementById("tpr-chart"), {
							type: 'line',
							data: {
								labels: tprDate,
								datasets: [{
										label: 'TPR CHART',
										data: tpr,
										borderColor: '#000000',
										fill: false
									}

								]
							},
							options: {
								title: {
									display: true,
									text: 'TPR CHART'
								}
							}
						});
					},
					error: function() {}
				});
			});
			new Chart(document.getElementById("line-chart"), {
				type: 'line',
				data: {
					labels: [<?php foreach ($period as $key => $value) {
									echo "'", print_r($value->format('Y-m-d'));
									echo "',";
								} ?>],
					datasets: [
						<?php

						foreach ($data as $key => $value) {
							$color =  '#' . substr(md5(rand()), 0, 6);
							echo "{";
							echo "label: '$key',";
							echo " data: [";
							echo implode(",", $value);
							echo "],";
							echo "borderColor: '$color',";
							echo "fill: false";
							echo "},";
						}

						?>

					]
				},
				options: {
					title: {
						display: true,
						text: 'Blood Sugar'
					}
				},
				scales: {
					xAxes: [{
						type: 'time',
						time: {
							displayFormats: {
								day: 'yy-mm-dd',
							}
						}
					}]
				}
			});


		});
	</script>
	<!-- end: JavaScript Event Handlers for this page -->
	<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>