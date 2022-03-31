<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if (isset($_GET['cancel'])) {
	mysqli_query($con, "update appointment set doctorStatus='0' where id ='" . $_GET['id'] . "'");
	$_SESSION['msg'] = "Appointment canceled !!";
}
if (isset($_GET['attend'])) {
	mysqli_query($con, "update appointment set doctorStatus='1' where id ='" . $_GET['id'] . "'");
	$_SESSION['msg'] = "Attending!!";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Doctor | Appointment History</title>

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
			<!-- end: TOP NAVBAR -->
			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">Doctor | Appointment History</h1>
							</div>

							<ol class="breadcrumb">
								<li>
									<span>Doctor </span>
								</li>
								<li class="active">
									<span>Appointment History</span>
								</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="appointmentBox" style="margin-top:20px;" id="pickappointment">
									<a href="#" class="btn btn-o btn-primary" data-appointmentdate="<?php echo date('Y-m-d', strtotime("-1 days")); ?>">Yesterday</a>
									<a href="#" class="btn btn-o btn-primary" data-appointmentdate="<?php echo date('Y-m-d'); ?>">Today</a>
									<a href="#" class="btn btn-o btn-primary" data-appointmentdate="<?php echo date('Y-m-d', strtotime("+1 days")); ?>">Tomorrow</a>
								</div>

							</div>
							<div class="col-sm-8">
								<div class="chooseDate" id="pick-date">
                                <div class="row datedisplay">
								<div class="col-sm-2"><p>From: </p> </div>
								<div class="col-sm-6"><p><input class="form-control datepicker" name="appdate" id="appDate" required="required" data-date-format="yyyy-mm-dd"> </p> </div>
								 
								</div>   
								
								</div>
								<a href="#">Yesterday</a>
								<a href="#">Today</a>
							</div>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">


						<div class="row">
							<div class="col-md-12">

								<p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
									<?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
									<div id="fetchappointment">
								<table class="table table-hover" id="sample-table-1">
									<thead>
										<tr>
											<th class="center">#</th>
											<th class="hidden-xs">Patient Name</th>
											<th>Specialization</th>
											<th>Consultancy Fee</th>
											<th>Appointment Date / Time </th>
											<th>Appointment Creation Date </th>
											<th>Current Status</th>
											<th>Action</th>

										</tr>
									</thead>
									<tbody>
										<?php

										$today = date('Y-m-d');
										$query = "select tblpatient.PatientName as fname,appointment.*  from appointment join tblpatient on tblpatient.ID=appointment.userId where appointment.doctorId='" . $_SESSION['id'] . "' AND appointmentDate = '$today'";
										//print_r($query);
										$sql = mysqli_query($con, $query);
										$cnt = 1;
										while ($row = mysqli_fetch_array($sql)) {
										?>

											<tr>
												<td class="center"><?php echo $cnt; ?>.</td>
												<td class="hidden-xs"><?php echo $row['fname']; ?></td>
												<td><?php echo $row['doctorSpecialization']; ?></td>
												<td><?php echo $row['consultancyFees']; ?></td>
												<td><?php echo $row['appointmentDate']; ?> / <?php echo
																								$row['appointmentTime']; ?>
												</td>
												<td><?php echo $row['postingDate']; ?></td>
												<td>
													<?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
														echo "Active";
													}
													if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 1)) {
														echo "Cancel by Patient";
													}

													if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 0)) {
														echo "Cancel by you";
													}
													if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 0)) {
														echo "Attending";
													}



													?></td>
												<td>
													<div class="visible-md visible-lg hidden-sm hidden-xs">
														<?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) { ?>


															<a href="appointment-history.php?id=<?php echo $row['id'] ?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')" class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Cancel</a>
														<?php } else {

															echo "Canceled";
														} ?>
													</div>
													<div class="visible-md visible-lg hidden-sm hidden-xs">
														<?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 0)) { ?>


															<a href="appointment-history.php?id=<?php echo $row['id'] ?>&attend=update" onClick="return confirm('Are you sure you want to attend this appointment ?')" class="btn btn-transparent btn-xs tooltips" title="Attend Appointment" tooltip-placement="top" tooltip="Remove">Attend</a>
														<?php } else {

															echo "Attending";
														} ?>
													</div>
												</td>
											</tr>

										<?php
											$cnt = $cnt + 1;
										} ?>


									</tbody>
								</table>
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
			$("#pickappointment a").on("click", function() {
				var appointmentdate = $(this).data("appointmentdate");
				console.log("the date is" + appointmentdate);
				$("#loaderIcon").show();
				jQuery.ajax({
					url: "fetchappointments.php",
					data:{
						appointmentdate : appointmentdate,
						docID : <?php echo $_SESSION['id'];?>},
					type: "POST",
					success: function(data) {
						console.log(data);
						$("#fetchappointment").html(data);
						//$("#loaderIcon").hide();
					},
					error: function() {}
				});
			});
		});
	</script>
	<!-- end: JavaScript Event Handlers for this page -->
	<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>