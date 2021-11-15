<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{	
	$unqId=$_SESSION['id'];
	$phno=$_POST['patcontact'];
	$uid=$_POST[''];
	$firstname=$_POST['fname'];
	$lastname=$_POST['lname'];
	$address=$_POST['pataddress'];

	$gender=$_POST['gender'];
	$adharcardno=$_POST['patadhar'];
	$dateofadmission=$_POST['appdate'];
	$dateofdischarge=$_POST[''];
	$billAmount=$_POST[''];
	$outstandingAmount=$_POST[''];
	$status=$_POST[''];
	$doctor=$_POST['doctor'];
	$sql=mysqli_query($con,"INSERT INTO `patientadmission`(`unqId`, `phno`, `uid`, `firstname`, `lastname`, `address`, `gender`, `adharcardno`, `dateofadmission`, `dateofdischarge`, `billAmount`, `outstandingAmount`, `status`) VALUES ('','$phno','','$firstname','$lastname','$address','$gender','$adharcardno','$dateofadmission','','','','pending')");
if($sql)
{
echo "<script>alert('Patient info added Successfully');</script>";
header('location:patient-admission.php');

}
}
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
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />

	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'phone='+$("#patcontact").val(),
method: "POST",
dataType:"JSON",
success:function(data){
//$("#user-availability-status1").html(data);
console.log(data);
$('#fname').val(data.name); 
   //  $('#lname').text(data.name);
     $('#pataddress').val(data.address);
     $('#rg').val(data.gender);
     //$('#rg-male').val(data.gender);
     $('#patemail').val(data.email);
     $('#patage').val(data.age);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<script>
function getdoc() {
	$.ajax({
	type: "POST",
	url: "get_doctor.php",
	data:'doctor=yes',
	success: function(data){
		$("#doctor").html(data);
	}
	});
}
</script>	
	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
<div class="app-content">
<?php include('include/header.php');?>
						
<div class="main-content" >
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
<form role="form" name="" method="post">

<div class="form-group">
<label for="fess">
 Patient Contact no
</label>
<input type="text" id="patcontact" name="patcontact" class="form-control"  placeholder="Enter Patient Contact no" required="true" maxlength="10" pattern="[0-9]+" onblur="userAvailability()">
<span id="user-availability-status1" style="font-size:12px;"></span>
</div>

<div class="form-group">
<label for="fess">
 Adhar Card No.
</label>
<input type="text" name="patadhar" class="form-control"  placeholder="Enter Patient Adhaar Card No" required="true" maxlength="12" >
</div>


<div class="form-group">
<label for="doctorname">
Patient Name
</label>
<input type="text" id="fname" name="fname" class="form-control"  placeholder="Enter First Name" required="true">
<input type="text" id="lname" name="lname" class="form-control"  placeholder="Enter Last Name" required="true">
</div>
<div class="form-group">
<label for="address">
Patient Address
</label>
<textarea name="pataddress" id="pataddress" class="form-control"  placeholder="Enter Patient Address" required="true"></textarea>
</div>

<div class="form-group">
<label for="fess">
Patient Email
</label>
<input type="email" id="patemail" name="patemail" class="form-control"  placeholder="Enter Patient Email id" required="true" >
</div>
<div class="form-group">
<label class="block">
Gender
</label>
<div class="clip-radio radio-primary">
<input type="radio" id="rg" name="gender" value="female" >
<label for="rg-female">
Female
</label>
<input type="radio" id="rg" name="gender" value="male">
<label for="rg-male">
Male
</label>
</div>
</div>

<div class="form-group">
<label for="fess">
 Patient Age
</label>
<input type="text" name="patage" id="patage" class="form-control"  placeholder="Enter Patient Age" required="true">
</div>
<div class="form-group">
<label >
 Ward No.
</label>
<input type="text" name="wn" class="form-control"  placeholder="Enter Ward No." required="true">
</div>
	<div class="form-group">
															<label for="doctor">
																Doctors
															</label>
					<select name="doctor" class="form-control" id="doctor" onChange="getdoc();" required="require">
							<option value="">Select doctor</option>
										<?php $ret=mysqli_query($con,"select * from doctors where 1");
										while($row=mysqli_fetch_array($ret))
															{
															?>
																<option value="<?php echo htmlentities($row['id']);?>">
																	<?php echo htmlentities($row['doctorName']);?>
																</option>
																<?php } ?>
						</select>
														</div>








<div class="form-group">
<label for="AppointmentDate">
Date of Admission
</label>
<input class="form-control datepicker" name="appdate"  required="required" data-date-format="yyyy-mm-dd">
</div>	

<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
Add
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
<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
<?php include('include/setting.php');?>
			
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
