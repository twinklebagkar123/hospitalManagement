<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if (isset($_POST['submit'])) {
	$specilization = $_POST['Doctorspecialization'];
	$doctorid = $_POST['doctor'];
	$userid = $_POST['idpatient'];
	$fees = $_POST['fees'];
	$appdate = $_POST['appdate'];
	$time = $_POST['apptime'];
	$userstatus = 1;
	$docstatus = 1;
	$query = mysqli_query($con, "insert into appointment(doctorSpecialization,doctorId,userId,consultancyFees,appointmentDate,appointmentTime,userStatus,doctorStatus) values('$specilization','$doctorid','$userid','$fees','$appdate','$time','$userstatus','$docstatus')");
	if ($query) {
		echo "<script>alert('Your appointment successfully booked');</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin | View Patients</title>

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

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  

	<script>
		function getdoctor(val) {
			console.log("hi");
			$.ajax({
				type: "POST",
				url: "get_doctor.php",
				data: 'specilizationid=' + val,
				success: function(data) {
					$("#doctor").html(data);
				}
			});
		}
	</script>
	<script>
		function getfee(val) {
			$.ajax({
				type: "POST",
				url: "get_doctor.php",
				data: 'doctor=' + val,
				success: function(data) {
					$("#fees").html(data);
				}
			});
		}
	</script>



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
								<h1 class="mainTitle">Admin | View Patients</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Admin</span>
								</li>
								<li class="active">
									<span>View Patients</span>
								</li>
							</ol>
						</div>
					</section>
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">
								<h5 class="over-title margin-bottom-15">View <span class="text-bold">Patients</span></h5>

								<table class="display" id="myTable">
									<thead>
										<tr>
											<!-- <th class="center">#</th> -->
											
											<th>Patient Id</th>
											<th>Doctor Name</th>
											
											
											<th> Ward Number </th>
											<th>Admission Date </th>
											<th>Discharge Date </th>
											 <th>Advanced Paid </th>
											<th>Operation </th>
											
											<th>ID</th>
											<th>Discharge </th>
										</tr>
									</thead>
									<tbody id="patientList">

									
									</tbody>


							</div>
						</div>
					</div>
					</table>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	<!-- The Modal -->
	<div class="modal " id="myModal">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">USER | BOOK APPOINTMENT</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body bg-white">
					<div class="main">
						<div class="" id="container">
							<!-- start: PAGE TITLE   wrap-content container -->
							<section id="">
								<div class="row">


							</section>
							<!-- end: PAGE TITLE -->
							<!-- start: BASIC EXAMPLE -->
							<!-- container container-fullw  -->
							<div class="bg-white">
								<div class="row">
									<div class="col-md-12">

										<div class="row ">
											<div class="col-lg-12 col-md-12">
												<div class="panel panel-white">
													<div class="panel-heading">
														<h5 class="panel-title" id="titleModal">Book Appointment</h5>
													</div>
													<div class="panel-body">
														<p style="color:red;"><?php echo htmlentities($_SESSION['msg1']); ?>
															<?php echo htmlentities($_SESSION['msg1'] = ""); ?></p>
														<form role="form" name="book" method="post">

															<input id="idInput" type="hidden" name="idpatient">

															<div class="form-group">
																<label for="DoctorSpecialization">
																	Doctor Specialization
																</label>
																<select name="Doctorspecialization" class="form-control" onChange="getdoctor(this.value);" required="required">
																	<option value="">Select Specialization</option>
																	<?php $ret = mysqli_query($con, "select * from doctorspecilization");
																	while ($row = mysqli_fetch_array($ret)) {
																	?>
																		<option value="<?php echo htmlentities($row['specilization']); ?>">
																			<?php echo htmlentities($row['specilization']); ?>
																		</option>
																	<?php } ?>

																</select>
															</div>




															<div class="form-group">
																<label for="doctor">
																	Doctors
																</label>
																<select name="doctor" class="form-control" id="doctor" onChange="getfee(this.value);" required="require">
																	<option value="">Select Doctor</option>
																</select>
															</div>





															<div class="form-group">
																<label for="consultancyfees">
																	Consultancy Fees
																</label>
																<select name="fees" class="form-control" id="fees" readonly>

																</select>
															</div>

															<div class="form-group">
																<label for="AppointmentDate">
																	Date
																</label>
																<input class="form-control datepicker" name="appdate" id="appDate" required="required" data-date-format="yyyy-mm-dd">

															</div>

															<div class="form-group">
																<label for="Appointmenttime">

																	Time

																</label>
																<input class="form-control" name="apptime" id="timepicker1" required="required">eg : 10:00 PM
															</div>

															<button type="submit" name="submit" class="btn btn-o btn-primary">
																Book Appointment
															</button>
														</form>












													</div>






													<!-- end: BASIC EXAMPLE -->






													<!-- end: SELECT BOXES -->

												</div>
												<div id="resultFetch">

												</div>


											</div>
										</div>




									</div>

									<!-- Modal footer -->
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									</div>
								</div>

								<!-- start: FOOTER -->
								<?php include('include/footer.php'); ?>
								<!-- end: FOOTER -->

								<!-- start: SETTINGS -->
								<?php //include('include/setting.php'); 
								?>

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
							<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

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
									$("#patientList button").on("click", function() {
										var name = $(this).data("name");
										var id = $(this).data("pid");
										$("#titleModal").html("Book " + name + "'s Appointment");
										$("#idInput").val(id);
									});
									$("#appDate").on("change", function() {
										var apt = $(this).val();
										var doc = $("#doctor").val();
										console.log(doc);

										$.ajax({
											type: "POST",
											url: "get_doctor.php",
											data: {
												appDate: apt,
												docID: doc
											},
											success: function(data) {
												$("#resultFetch").html(data);
											}
										});


									});

								});
							</script>
		<script>
$( document ).ready(function() {
$('#myTable').dataTable({
    "serverSide": true,
    "processing": true,
    ajax: {
		"url" : 'view-response.php',
		"contentType": 'application/json'
	},
        });  
});
    </script>
							<!-- end: JavaScript Event Handlers for this page -->

							<!-- end: CLIP-TWO JAVASCRIPTS -->




</body>

</html>