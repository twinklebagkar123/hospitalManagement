<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['Submit']))
{	
	
	$patient=$_POST['patient'];
	$doctor=$_POST['doctor'];
	$opTitle=$_POST['opTitle'];
	$opTime=$_POST['opTime'];
	$opDate=$_POST['opDate'];

	$Consent=$_POST['Consent'];
	$DAMA=$_POST['DAMA'];
	$pRNote=$_POST['pRNote'];
	$fCDate=$_POST['date'];
	
	
	$sql=mysqli_query($con,"INSERT INTO `patientoperation`(`patNme`, `docName`, `opDate`, `opTitle`, `opTime`, `consent`, `DAMA`, `pRNote`, `fCDate`) VALUES ('$patient','$doctor','$opDate','$opTitle','$opTime','$Consent','$DAMA','$pRNote','$fCDate')");
if($sql)
{
echo "<script>alert('patient Operation Form added Successfully');</script>";
header('location:patientOperationConsent.php');

}
}
$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;



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
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		
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
															<label for="Patient Name">
                                                            Patient Name
															</label>
					<select name="patient" class="form-control" id="patient" required="require">
							<option value="">Patient Name</option>
										<?php $xyz= "select * from tblPatient";
										 $result = $con->query($xyz);
										while($row=mysqli_fetch_array($result))
															{
															?>
																<option value="<?php echo htmlentities($row['PatientName']);?>">
																	<?php echo htmlentities($row['PatientName']);?>
																</option>
																<?php } ?>
						</select>
														</div>
                                                        <div class="form-group">
															<label for="doctor">
																Doctors
															</label>
					<select name="doctor" class="form-control" id="doctor"  required="require">
							<option value="">Select doctor</option>
										<?php $ret=mysqli_query($con,"select * from doctors where 1");
										while($row=mysqli_fetch_array($ret))
															{
															?>
																<option value="<?php echo htmlentities($row['doctorName']);?>">
																	<?php echo htmlentities($row['doctorName']);?>
																</option>
																<?php } ?>
						</select>
														</div>

														<div class="form-group">
<label >
 Operation Title
</label>
<input type="text" name="opTitle" class="form-control"  placeholder="Enter Operation Title" required="true" >
</div>
<div class="form-group">
                                                    <label for="opTime">Select a time:</label>
                                                    <input type="time" id="opTime" name="opTime">
                                                        <label for="opDate">Select a Date:</label>
                                                        <input type="date" id="opDate" name="opDate">
</div>
<div class="form-group">
															<label >
																Consent
															</label>
					<select name="Consent" class="form-control" id="Consent"  required="require">
							<option value="">Select Option</option>
							<option >Yes</option>
							<option >No</option>
														</select>
</div>
<div class="form-group">
														<label >
																DAMA
															</label>
					<select name="DAMA" class="form-control" id="DAMA"  required="require">
					<option value="">Select Option</option>		
					<option >Yes</option>
							<option >No</option>
														</select>
														</div>

								<div class="form-group">
									<label>Patient Recovery Note</label>
	<textarea name="pRNote" id="pRNote" placeholder="Enter Patient Recovery Note" rows="4" cols="14" class="form-control wd-450" required="true"></textarea>
						</div>
					
						<div class="form-group">
															<label >					Form Creation Date
											</label>
					<input type="date" value="<?php echo $today; ?>" class="form-control" id="date" name="date" readonly>
						
						</select>
														</div>	
                                                    
<input type="submit" name="Submit" class="btn btn-outline-secondary btn-sm" id="Submit" value="Submit">
															</form>
</div>
    </div>
	
    <div class="col-sm-6">
    <div class="">
	<p>General Consent For Medical/Surgical Procedures/Interventions</p>

	<p>Patient Name: <span id="pName"> <input type="test" placeholder="" readonly /> </span></p>       <br>  
	            <p>Doctor Name: <span id="dName"> <input type="test" placeholder="" readonly /> </span></p>   
	<p><ins>TO THE MEMBER:</ins> You have been given information about your condition and the recommended
surgical, medical, or diagnostic procedure(s). This consent form is designed to provide a written
confirmation of these discussions.</p> 
<ol>
  <li>  explained to me that I have the following condition(s):
 <br>(Clinician)<br> (explain in lay terms)</li>
  <li> The following procedure/intervention/anesthesia (if any) has been recommended: </li>
  <li> _______________________________________________________________________
(explain in lay terms)</li>


<li> The following have been explained to me about the procedure/intervention/anesthesia (if any): </li>
<ul>
  <li>Its purpose and nature.</li>
  <li>The potential benefits and risks. </li>
  <li>The likely result if I do not have the recommended procedure/intervention.</li>
  <li>The available alternative treatments and their benefits and risks.</li>
</ul>
<li>The most likely and most serious risks of the procedure(s) are:
<br>________________________________________________________________
</li>
<li>I am aware that there may be other risks or complications not discussed that may occur. I also
understand that during the course of the proposed procedure, unforeseen conditions may be
revealed requiring the performance of additional procedures, and I authorize such procedures
to be performed. I acknowledge that no guarantees or promises have been made to me
concerning the results of this procedure or any treatment that may be required as a result of
this procedure.</li>
<li>I understand what has been discussed with me as well as the contents of this form. I have
been given the opportunity to ask questions and have received satisfactory answers. If you
have not had all of your questions answered to your satisfaction, do not sign this form until you
have.</li>
<li>I voluntarily consent to the performance of the procedure/intervention/anesthesia (if any)
described above by my clinician or those who work with him/her.</li>
</ol>


<p>Patient Signature</p><p>Date :<span id="fdate1"> <input type="test" placeholder="" readonly /></p>
<p>Witness Signature</p><p>Date:<span id="fdate2"> <input type="test" placeholder="" readonly /></p>
<p>Physician Signature</p><p>Date:<span id="fdate3"> <input type="test" placeholder="" readonly /></p>

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


		<script>
		$(document).ready(function(){
    $('#patient').change(function(){
       $('#patient').val();
	   $('#doctor').val();
	   $('#date').val();
       $('#pName').html($('#patient').val());
	   $('#dName').html($('#doctor').val());
	   $('#fdate1').html($('#date').val());
	   $('#fdate2').html($('#date').val());
	   $('#fdate3').html($('#date').val()); 
	});
	});
		</script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
