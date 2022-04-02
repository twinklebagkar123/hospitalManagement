<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$id = 5;
$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;

function fetchPatientName($admissionID)
{
	include('../include/config.php');
	$query = "SELECT tblpatient.PatientName,tblpatient.PatientGender,tblpatient.PatientAge FROM `patientAdmission` as tab1 INNER JOIN tblpatient ON tab1.uid = tblpatient.ID WHERE tab1.unqId = '$admissionID'";
	$result =  $con->query($query);
	$resultarray = [];

	while ($row = mysqli_fetch_array($result)) {
		$resultarray['name'] = $row['PatientName'];
		$resultarray['gender'] = $row['PatientGender'];
		$resultarray['age'] = $row['PatientAge'];
	}
	return $resultarray;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Patient | Operation Consent Form</title>

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
	<link rel="stylesheet" href="assets/css/styles.css?ver=<?php echo rand(); ?>" type="text/css">
	<link rel="stylesheet" href="assets/css/plugins.css">
	<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />




	<!-- <script>
		function getdoctor(val) {
			console.log("hi");
			$.ajax({
				type: "POST",
				url: "get_doctor.php",
				data: 'pName=' + val,
				// success: function(data) {
				// 	$("#pName").html(data);
				// }
			});
		}
	</script> -->
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
								<h1 class="mainTitle">Patient | Operation Consent Form</h1>

							</div>
						</div>
				</div>




				<div class="container">
					<div class="row">
						<div class="col-sm-6 ">
							<div class="input-group">
								<div class="form-group">

									<form method="post" name="submit">

										<input type="hidden" name="pid" class="form-control" id="patId" value="">
										<?php $resultarray = fetchPatientName($id);
										print_r($resultarray); ?>
											<label for="Patient Name">
												Patient Name

											</label>
											<input type="text" name="pat" class="form-control" id="pat" value="<?php echo $resultarray['name']; ?>" required="require" autocomplete="off">
											<div id="nameResponse"> </div>
										
								</div>
								
								<div class="form-group">
									<label for="consultant">
										Consultant
									</label>
									<select name="consultant" class="form-control" id="consultant" required="require">
										<option value="">Select consultant</option>
										<?php $ret = mysqli_query($con, "select * from doctors where 1");
										while ($row = mysqli_fetch_array($ret))  { 
										?>
											<option value="<?php echo htmlentities($row['id']); ?>">
												<?php echo htmlentities($row['doctorName']); ?>
											</option>
										<?php } ?>
									</select>
								</div>




								<div class="form-group">
									<label for="doctor">
										Doctors 
									</label>
									<select name="doctor" class="form-control" id="doctor" required="require">
										<option value="">Select doctor</option>
										<?php $ret = mysqli_query($con, "select * from doctors where 1");
										while ($row = mysqli_fetch_array($ret)) {
										?>
											<option value="<?php echo htmlentities($row['id']); ?>">
												<?php echo htmlentities($row['doctorName']); ?>
											</option>
										<?php } ?>
									</select>
								</div>








								<div class="form-group">
									<label>
										Operation Title
									</label>
									<!-- <input type="text" name="opTitle" class="form-control" placeholder="Enter Operation Title" required="true"> -->
									<select name="opTitle" class="form-control" required="require">
										<option value="">Select procedure</option>
										<?php $ret = mysqli_query($con, "select * from procedureList where 1");
										while ($row = mysqli_fetch_array($ret)) {
										?>
											<option value="<?php echo htmlentities($row['procedureID']); ?>">
												<?php echo htmlentities($row['name']); ?>
											</option>
										<?php } ?>
									</select>
								</div>


								<div class="form-group">
									<div class="row">

										<div class="col-sm-4">
											<label>Code No:</label>
											<input type="text" id="code" name="code">
										</div>
										<div class="col-sm-4">
											<label>Ward:</label>
											<input type="text" id="ward" name="ward">
										</div>
										<div class="col-sm-4">
											<label>R No:</label>
											<input type="text" id="rno" name="rno">
										</div>




									</div>



								</div>
								<div class="form-group">
									<label for="opTime">Select a time:</label>
									<input type="time" id="opTime" name="opTime">
									<label for="opDate">Select a Date:</label>
									<input type="date" id="opDate" name="opDate">
								</div>
								<div class="form-group">
									<label>
										Consent
									</label>
									<select name="Consent" class="form-control" id="Consent" required="require">
										<option value="">Select Option</option>
										<option>Yes</option>
										<option>No</option>
									</select>
								</div>
								<div class="form-group">
									<label>
										DAMA
									</label>
									<select name="DAMA" class="form-control" id="DAMA" required="require">
										<option value="">Select Option</option>
										<option>Yes</option>
										<option>No</option>
									</select>
								</div>

								<div class="form-group">
									<label>Patient Recovery Note</label>
									<textarea name="pRNote" id="pRNote" placeholder="Enter Patient Recovery Note" rows="4" cols="14" class="form-control wd-450" required="true"></textarea>
								</div>

								<div class="form-group">
									<label> Payment Recieved
									</label>
									<input type="text" value="" class="form-control" id="text" name="amntRecieved">

								</div>

								<div class="form-group">
									<label> Form Creation Date
									</label>
									<input type="date" value="<?php echo $today; ?>" class="form-control" id="date" name="date" readonly>

								</div>

								<input type="submit" name="submit" class="btn btn-primary pull-right" id="Submit" value="Submit">
								</form>
							</div>
						</div>

						<div class="col-sm-6">

							<h3>St Anthony's Hospital & Research Centre</h3>
							<h4> CONSENT FOR OPERATION / PROCEDURE</h4>
							<div class="row">
								<div class="col-sm-6">
									<p>Patient Name: <span id="pName"> </span></p>
								</div>
								<div class="col-sm-3">
									<p>Age: <span id="pAge"> </span> </p>
								</div>
								<div class="col-sm-3">
									<p>Sex: <span id="pGender"></span> </p>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-4">
									<p>Code No:<span id="cc"></span></p>
								</div>
								<div class="col-sm-4">
									<p> Ward:<span id="ww"></span> </p>
								</div>
								<div class="col-sm-4">
									<p>R No.: <span id="rr"></span></p>
								</div>
							</div>


							<div class="row">
								<div class="col-sm-4">
									<p>Consultant:<span id="cName"> </span></p>
								</div>
								<div class="col-sm-4">
									<p>DOA: </p>
								</div>
							</div>
							<br>
							<br>
							<br>
							<br>

							<div class="row">

								<p>It is the policy of St. Anthony's Hospital to inform the patient of the proposed treatment and you are encouraged to ask your doctors any questions you may have regarding your care.</p>
								<br>

								<ol>
									<li>
										I hereby authorize Dr. <span id="dName"></span> or associates at St. Anthony's Hospital
										to perform upon me or the above - named patient the following operation and / or procedures, name of<br>

										Procedures.............................................................................................<br>

										Meaning (please explain briefly in lay terminology)......................................................<br>
										.............................................................................................................



									</li>
									<li> Dr.<span id="dName2"></span> has fully explained to me the nature and Purpose of
										operation / procedure and has also informed me of expected benefits and complications, attendant
										discomforts and risks that may arise, as well as possible alternatives to the proposed treatment. I have been
										given an opportunity to ask questions, and all my questions have been answered fully satisfactorily.</li><br>
									<li> I understand that during the course of the operation or procedure unforeseen conditions may arise which
										require procedures different from those planned. I therefore consent to the performance of additional
										procedure which above-named physician or his / her associates may consider necessary.</li><br>


									<li> I further consent to the administrator of such aesthetics as may be considered necessary. I recognize
										that there are occasional risks to life and health associated with anesthesia and such risks have been fully
										explained to me. </li><br>

									<li>For the purpose of advancing medical knowledge and education, I consent to the photographing, video
										taping or televising of the operation or procedure to the performed, provided my / the patient's identity is
										not disclosed.
									</li><br>


									<li>I confirm that I have read fully and understood the above.</li><br>
								</ol>

							</div> 
							<div class="row">
								<div class="col-sm-6">
									<p>Witness :<br> (Signature)</p>
								</div>
								<div class="col-sm-6">
									<p>patient/relative...<br> or Guardian (Signature)</p>
								</div>

							</div>


							<div class="row">
								<div class="col-sm-6">
									<p><br>Name</p>
								</div>
								<div class="col-sm-6">
									<p><br>Name</p>
								</div>


							</div>
							<div class="row">
								<div class="col-sm-6">
									<p>Date :<span id="opD"> </span></p>
								</div>
								<div class="col-sm-6"> <br>(Relationship, if signed by person<br>
									Other then the Patient) </div>


							</div>
							<div tyle="margin: 30px 0;">

								<p> I hereby certify that I have explained the nature of procedure, have offered to answer any questions and
									fully answered all such questions.</p>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<p>date:<span id="fdate1"> </span></p>
								</div>
								<div class="col-sm-6">
									<p>physician: </p>
									<p class="mt-1" style="margin-top: 30px;"> (Signature)</p>
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

	<!-- <script>
		$(document).ready(function() {
			
		});
	</script> -->
	<script>
		jQuery(document).ready(function() {
			Main.init();
			FormElements.init();
			$('#doctor').on("change", function() {
				$('#dName').html($('#doctor').val());
				$('#dName2').html($('#doctor').val());
				$('#fdate1').html($('#date').val());

			});
			$('#consultant').on("change", function() {
				$('#cName').html($('#consultant').val());
			});
			$('#opDate').on("change", function() {
				$('#opD').html($('#opDate').val());
			});


			$('#code').on("change", function() {
				$('#cc').html($('#code').val());
			});
			$('#ward').on("change", function() {
				$('#ww').html($('#ward').val());
			});
			$('#rno').on("change", function() {
				$('#rr').html($('#rno').val());
			});
			$("#pat").on("keyup", function() {
				var pn = $(this).val();
				//	var pat = $("#patient").val();
				console.log(pn);

				$.ajax({
					type: "POST",
					// contentType: "application/json",
					// dataType: "json",
					url: "get_doctor.php",
					data: {
						pName: pn
					},
					success: function(data) {
						$('#nameResponse').html(data);
					}
				});
				$(document).on("click", "#nameResponse p", function() {

					console.log($(this).data("pid"));
					$('#pName').html($(this).data("name"));
					$('#pAge').html($(this).data("age"));
					$('#pGender').html($(this).data("sex"));
					$("#pat").val($(this).data("name"));
					$("#patId").val($(this).data("pid"));
					$("#nameResponse").html("");
				});

			});

		});
	</script>

	<!-- start: JavaScript Event Handlers for this page -->
	<script src="assets/js/form-elements.js"></script>

	<!-- end: JavaScript Event Handlers for this page -->
	<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>
<?php

$aid = $_GET['admissionId'];
if (isset($_POST['submit'])) {
	$id = $_POST['pid'];
	$patient = $_POST['pat'];
	$doctor = $_POST['doctor'];
	$consultant = $_POST['consultant'];
	$opTitle = $_POST['opTitle'];
	$opTime = $_POST['opTime'];
	$opDate = $_POST['opDate'];

	$Consent = $_POST['Consent'];
	$DAMA = $_POST['DAMA'];
	$pRNote = $_POST['pRNote'];
	$fCDate = $_POST['date'];
	$code = $_POST['code'];
	$ward = $_POST['ward'];
	$rno = $_POST['rno'];
	$amntRecieved = $_POST['amntRecieved'];


	$sql = "INSERT INTO `patientoperation`( `patientID`, `docID`, `opDate`, `opTitle`, `opTime`, `consent`, `DAMA`, `pRNote`, `fCDate`,`patient_admission_id`,`code`, `ward`, `rno`,`consultantID`,`operationFeeRecieved`) VALUES ('$id','$doctor','$opDate','$opTitle','$opTime','$Consent','$DAMA','$pRNote','$fCDate','$aid','$code','$ward','$rno','$consultant','$amntRecieved')";
	print_r($sql);
	$result = $con->query($sql);
	if ($result) {
		echo "<script>alert('patient Operation Form added Successfully');</script>";
		header('location:patientOperationConsent.php');
	}
}
?>

</html>