<?php
include('include/header_structured.php');
if (isset($_POST['submit'])) {
	$docspecialization = $_POST['Doctorspecialization'];
	$docname = $_POST['docname'];
	$docfees = $_POST['docfees'];
	$doccontactno = $_POST['doccontact'];
	$docemail = $_POST['docemail'];
	$password = md5($_POST['npass']);
	$sql = mysqli_query($con, "insert into doctors(specilization,doctorName,docFees,contactno,docEmail,password) values('$docspecialization','$docname','$docfees','$doccontactno','$docemail','$password')");
	if ($sql) {
		echo "<script>alert('Doctor info added Successfully');</script>";
		echo "<script>window.location.href ='manage-doctors.php'</script>";
	}
}
?><script type="text/javascript">
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
			var emailpattern=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;////Regular expression
			if(emailpattern.test($("#docemail").val()))
			{
				$("#email-availability-status").empty();
				$("#loaderIcon").show();
				jQuery.ajax({
					url: "check_availability.php",
					data: 'emailid=' + $("#docemail").val(),
					type: "POST",
					success: function(data) {
						$("#email-availability-status").html(data);
						$("#loaderIcon").hide();
					},
					error: function() {}
				});
			}
			else
			{
				$("#email-availability-status").empty();
				var data = '<span style="color:red"> Email Address Incorrect.</span>';
				$("#email-availability-status").html(data);
			}
			
		
		}
	</script>
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">Admin | Add Doctor</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Admin</span>
								</li>
								<li class="active">
									<span>Add Doctor</span>
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
												<h5 class="panel-title">Add Doctor</h5>
											</div>
											<div class="panel-body">

												<form role="form" name="adddoc" method="post" onSubmit="return valid();">
													<div class="form-group">
														<label for="DoctorSpecialization">
															Doctor Specialization
														</label>
														<select name="Doctorspecialization" class="form-control" required="true">
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
														<label for="doctorname">
															Doctor Name
														</label>
														<input type="text" name="docname" class="form-control" placeholder="Enter Doctor Name" required="true">
													</div>
													<div class="form-group">
														<label for="fess">
															Doctor Consultancy Fees
														</label>
														<input type="text" name="docfees" class="form-control" placeholder="Enter Doctor Consultancy Fees" required="true">
													</div>

													<div class="form-group">
														<label for="fess">
															Doctor Contact no
														</label>
														<input type="text" name="doccontact" class="form-control" placeholder="Enter Doctor Contact no" required="true">
													</div>

													<div class="form-group">
														<label for="fess">
															Doctor Email
														</label>
														<input type="email" id="docemail" name="docemail" class="form-control" placeholder="Enter Doctor Email id" required="true" onBlur="checkemailAvailability()">
														<span id="email-availability-status"></span>
													</div>




													<div class="form-group">
														<label for="exampleInputPassword1">
															Password
														</label>
														<input type="password" name="npass" class="form-control" placeholder="New Password" required="required">
													</div>

													<div class="form-group">
														<label for="exampleInputPassword2">
															Confirm Password
														</label>
														<input type="password" name="cfpass" class="form-control" placeholder="Confirm Password" required="required">
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
		});
	</script>
	<!-- end: JavaScript Event Handlers for this page -->
	<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>