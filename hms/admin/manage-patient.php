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
	<script>
		function getdoctor(val) {
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

								<table class="table table-hover" id="sample-table-1">
									<thead>
										<tr>
											<th class="center">#</th>
											<th>Patient Name</th>
											<th>Patient Contact Number</th>
											<th>Patient Gender </th>
											<th>Creation Date </th>
											<th>Updation Date </th>

											<th>Appointment </th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody id="patientList">

										<?php

										$sql = mysqli_query($con, "select * from tblpatient");
										$cnt = 1;
										while ($row = mysqli_fetch_array($sql)) {
										?>
											<tr>
												<td class="center"><?php echo $cnt; ?>.</td>
												<td class="hidden-xs"><?php echo $row['PatientName']; ?></td>
												<td><?php echo $row['PatientContno']; ?></td>
												<td><?php echo $row['PatientGender']; ?></td>
												<td><?php echo $row['CreationDate']; ?></td>
												<td><?php echo $row['UpdationDate']; ?>
												</td>

												<td><button type="button" data-pid="<?php echo $row['ID']; ?>" data-name="<?php echo $row['PatientName']; ?>" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
														Book
													</button></td>


												<td>

													<a href="view-patient.php?viewid=<?php echo $row['ID']; ?>"><i class="fa fa-eye"></i></a>

												</td>
											</tr>
										<?php
											$cnt = $cnt + 1;
										} ?>
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
														<div class="wrap-content container" id="container">
															<!-- start: PAGE TITLE -->
															<section id="">
																<div class="row">


															</section>
															<!-- end: PAGE TITLE -->
															<!-- start: BASIC EXAMPLE -->
															<div class="container container-fullw bg-white">
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
																								<input class="form-control datepicker" name="appdate" required="required" data-date-format="yyyy-mm-dd">

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
														<h2>dc</h2>

		
<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
<?php echo htmlentities($_SESSION['msg']="");?></p>	
<table class="table " id="sample-table-1">
	<thead>
		<tr>
			<th class="center">#</th>
			<th class="hidden-xs">Patient Name</th>
			<th>Doctor Name</th>
			
			<th>Appointment Time </th>
	
		</tr>
	</thead>
	<tbody>
<?php
$sql="SELECT tblp.PatientName,doc.doctorName,apt.appointmentTime FROM appointment as apt INNER JOIN tblpatient AS tblp ON apt.userId = tblp.ID INNER JOIN doctors AS doc ON apt.doctorId = doc.id";
//print_r($sql);
$result = $con->query($sql);
$cnt=1;
//var_dump($result);
while($row = mysqli_fetch_array($result))

{
?>

<tr>
<td class="center"><?php echo $cnt;?>.</td>
<td class="hidden-xs"><?php echo $row['PatientName'];?></td>
<td class="hidden-xs"><?php echo $row['doctorName'];?></td>

<td><?php echo $row['appointmentTime'];?> <?php //echo $row['appointmentTime'];?>
</td>
</tr>


			
	
		
		<?php 
$cnt=$cnt+1;
		 }?>
		
		
	</tbody>
</table> 
													</div>
												</div>




											</div>

											<!-- Modal footer -->
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
			$("#patientList button").on("click", function() {
				var name = $(this).data("name");
				var id = $(this).data("pid");
				$("#titleModal").html("Book " + name + "'s Appointment");
				$("#idInput").val(id);
			});
		});
	</script>
	<!-- end: JavaScript Event Handlers for this page -->

	<!-- end: CLIP-TWO JAVASCRIPTS -->




</body>

</html>