<?php
include('include/header_structured.php');
if (isset($_POST['submit'])) {
	$docid = '1';
	$patname = $_POST['patname'];
	$patcontact = $_POST['patcontact'];
	$patemail = $_POST['patemail'];
	$gender = $_POST['gender'];
	$adharCardNo = $_POST['adharCardNo'];
	$pataddress = $_POST['pataddress'];
	$patage = $_POST['patage'];
	$medhis = $_POST['medhis'];
	$created_at = date('Y-m-d H:i:s');
	// $queryToRegister = "insert into tblpatient(Docid,PatientName,PatientContno,PatientEmail,PatientGender,adharCardNo,PatientAdd,PatientAge,CreationDate) values('$doctor','$patname','$phno','$patemail','$gender','$adharcardno','$pataddress','$patage','$')";

	// 			if ($con->query($queryToRegister) == TRUE) {
	$sql = mysqli_query($con, "insert into tblpatient(Docid,PatientName,PatientContno,PatientEmail,PatientGender,PatientAdd,adharCardNo,PatientAge,PatientMedhis,CreationDate) values('$docid','$patname','$patcontact','$patemail','$gender','$pataddress','$adharCardNo','$patage','$medhis','$created_at')");
	if ($sql) {
		$patientInsertedId = mysqli_insert_id($con);
		header('location:patient-admission.php?patientId=' . $patientInsertedId);
	} else {
		echo "<script>alert('Something Went wrong.');</script>";
	}
}
?>
<script>
	function userAvailability() {
		var emailpattern = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/; ////Regular expression
		if (emailpattern.test($("#patemail").val())) {
			$("#user-availability-status1").empty();
			$("#loaderIcon").show();
			jQuery.ajax({
				url: "check_availability.php",
				data: 'email=' + $("#patemail").val(),
				type: "POST",
				success: function(data) {
					$("#user-availability-status1").html(data);
					$("#loaderIcon").hide();
				},
				error: function() {}
			});
		} else {
			$("#user-availability-status1").empty();
			var data = '<span style="color:red"> Email Address Incorrect.</span>';
			$("#user-availability-status1").html(data);
		}
	}
</script>
<div class="wrap-content container" id="container">
	<!-- start: PAGE TITLE -->
	<section id="page-title">
		<div class="row">
			<div class="col-sm-8">
				<h1 class="mainTitle">Admin | Register Patient</h1>
			</div>
			<ol class="breadcrumb">
				<li>
					<span>Patient</span>
				</li>
				<li class="active">
					<span>Registration</span>
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
								<h5 class="panel-title">Register Patient</h5>
							</div>
							<div class="panel-body">
								<form role="form" name="" method="post">

									<div class="form-group">
										<label for="doctorname">
											Patient Name
										</label>
										<input type="text" name="patname" class="form-control" placeholder="Enter Patient Name" required="true">
									</div>
									<div class="form-group">
										<label for="fess">
											Phone Number
										</label>
										<input type="text" name="patcontact" class="form-control" placeholder="Enter Patient Contact no" required="true" maxlength="10" pattern="[0-9]+">
									</div>
									<div class="form-group">
										<label for="fess">
											Adhar Card / Passport Number
										</label>
										<input type="number" id="adhar_card_registration" name="adharCardNo" class="form-control" placeholder="Enter Adhar Card Number" required="true" minlength="12" maxlength="12">
									</div>
									<div class="form-group" id="customer_already_registered" style="display:none;">
										<label for="fess" style="color: green;font-weight: 600;">Customer Already Registered: <span></span>
										</label>
										<a href="javascript:void(0)" class="btn btn-success">Proceed to Admission</a>
									</div>
									<div class="form-group">
										<label for="fess">
											Email Address
										</label>
										<input type="email" id="patemail" name="patemail" class="form-control" placeholder="Enter Patient Email id" required="true" onBlur="userAvailability()">
										<span id="user-availability-status1" style="font-size:12px;"></span>
									</div>
									<div class="form-group">
										<label class="block">
											Gender
										</label>
										<div class="clip-radio radio-primary">
											<input type="radio" id="rg-female" name="gender" value="female">
											<label for="rg-female">
												Female
											</label>
											<input type="radio" id="rg-male" name="gender" value="male">
											<label for="rg-male">
												Male
											</label>
										</div>
									</div>
									<div class="form-group">
										<label for="address">
											Address
										</label>
										<textarea name="pataddress" class="form-control" placeholder="Enter Patient Address" required="true"></textarea>
									</div>
									<div class="form-group">
										<label for="fess">
											Age
										</label>
										<input type="text" name="patage" class="form-control" placeholder="Enter Patient Age" required="true">
									</div>
									<div class="form-group">
										<label for="fess">
											Initial Complain
										</label>
										<textarea type="text" name="medhis" class="form-control" placeholder="Initial Complain" required="true"></textarea>
									</div>

									<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
										Submit
									</button>
								</form>
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
</body>

</html>