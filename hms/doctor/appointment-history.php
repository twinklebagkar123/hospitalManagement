<?php
include('include/header_structure.php');
if (isset($_GET['cancel'])) {
	mysqli_query($con, "update appointment set doctorStatus='0' where id ='" . $_GET['id'] . "'");
	$_SESSION['msg'] = "Appointment canceled !!";
}
if (isset($_GET['attend'])) {
	mysqli_query($con, "update appointment set doctorStatus='1' where id ='" . $_GET['id'] . "'");
	$_SESSION['msg'] = "Attending!!";
}

?>
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
								<div class="chooseDate" style="margin-top:20px;" id="pick-date">
									<div class="row datedisplay">
										<div class="col-sm-2">
											<p>From: </p>
										</div>
										<div class="col-sm-4">
											<p><input class="form-control datepicker" name="appdate" id="fromDate" autocomplete="off" required="required" data-date-format="yyyy-mm-dd"> </p>
										</div>
										<div class="col-sm-2">
											<p>To: </p>
										</div>
										<div class="col-sm-4">
											<p><input class="form-control datepicker" name="appdate" id="toDate" autocomplete="off" required="required" data-date-format="yyyy-mm-dd"> </p>
										</div>


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
												<th>Appointment Created At </th>
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
	<script src="assets/js/custom.js"></script>
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
					data: {
						appointmentdate: appointmentdate,
						docID: <?php echo $_SESSION['id']; ?>
					},
					type: "POST",
					success: function(data) {
						console.log(data);
						$("#fetchappointment").html(data);
						//$("#loaderIcon").hide();
					},
					error: function() {}
				});
			});
			$("#pick-date input").on("change", function(){
				var fromDate = $("#fromDate").val();
				var toDate = $("#toDate").val();
				//console.log(fromDate);
				jQuery.ajax({
					url: "fetchappointmentsbydate.php",
					data: {
						fromDate: fromDate,
						toDate: toDate,
						docID: <?php echo $_SESSION['id']; ?>
					},
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