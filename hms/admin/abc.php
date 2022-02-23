<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
{
	$tariff_cat_id=$_POST['tariff_cat_id'];
	$tariff_class_name=$_POST['tariff_class_name'];
    $roomn=$_POST['roomn'];
	$total=$_POST['total'];
	$feeDistribution=$_POST['feeDistribution'];
    $is_fee_distributed=$_POST['is_fee_distributed'];

	$query = "INSERT INTO `tariff_room_info`( `tariff_cat_id`, `tariff_class_type_id`, `tariff_room_name`, `tariff_room_fee`, `tariff_fee_distribution`, `is_fee_distributed`) VALUES ('$tariff_cat_id','$tariff_class_name','$roomn','$total','$feeDistribution','$is_fee_distributed')";
	$con->query($query);
	$stat = true;
	if($stat)
	{
		echo "<script>alert('Successfully Added.');</script>";
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
	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
<div class="app-content">
<?php include('include/header.php');?>
<div class="main-content" >
<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
                        <div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">

								<div class="row margin-top-30">
									<div class="col-lg-8 col-md-12">
										<div class="panel panel-white">
											<div class="panel-heading">
												<h5 class="panel-title"></h5>
											</div>
                                            <form method="POST" name="submit">
											<input type="hidden" id="feeDistribution" name="feeDistribution" value="">
											<div class="form-group">
														<label for="">
															Tariff Category
														</label>
														<select name="tariff_cat_id" class="form-control" id="tariff_cat_id" required="true">
															<option value="">Select Tariff Category</option>
															<?php $ret = mysqli_query($con, "SELECT * FROM tariff_category where 1");
															while ($row = mysqli_fetch_array($ret)) {
															?>
																<option value="<?php echo htmlentities($row['tariff_cat_id']); ?>">
																	<?php echo htmlentities($row['tariff_cat_name']); ?>
																</option>
															<?php } ?>
														</select>
													</div>

                                                    <div class="form-group">
														<label for="doctor">
															Tariff Class
														</label>
														<select name="tariff_class_name" class="form-control" id="tariff_class_name" required="true">
															<option value="">Select Tariff Class</option>
															<?php $ret = mysqli_query($con, "SELECT * FROM `tariff_class` where 1");
															while ($row = mysqli_fetch_array($ret)) {
															?>
																<option value="<?php echo htmlentities($row['tariff_class_id']); ?>">
																	<?php echo htmlentities($row['tariff_class_name']); ?>
																</option>
															<?php } ?>
														</select>



													<div class="form-group">
														<label for="name">
															Room Name:
														</label>

														<input type="text" id="roomn" name="roomn" class="form-control" placeholder="Enter Room Name" required="true" >
														

													</div>
													
                                                    <div class="form-group">
														<label>
															Total:
														</label>
														<input type="text" name="total" class="form-control" placeholder="total" required="true">
														

													</div>
													
                                                    <div class="wrapperDiv">
													<label > Is Fee Distributed?</label>
													<input type="checkbox" id="isFeeDistributed" name="isFeeDistributed" >
										
                                    <!-- <div id="medicalResult"></div>
                                    <input type="hidden" name="pres" id="result" value=""> -->
                                    <div class="feeDistribution" style="display:none;">
									<div class="row">
                                  
                                      <div class="col-md-4">
                                        HOSPITALITION
                                        <input type="text" id="hospitalition" placeholder="hospitalition Charges " class="form-control" autocomplete="off" style="margin-bottom: 5px;">

                                      </div>
                                      <div class="col-md-4">
                                      MEDICAL OFFICER
                                        <input type="text" id="medofficer" placeholder=" MEDICAL OFFICER Charges" class="form-control " autocomplete="off" style="margin-bottom: 5px;">

                                      </div>
                                      <div class="col-md-4">
                                        NURSING
                                        <input type="text" id="nursing" placeholder="NURSING Charges" class="form-control medicineSugg" id="autosuggest" autocomplete="off" style="margin-bottom: 5px;">

                                      </div>
                                    </div>
									</div>
                                    <!-- <div class="row">
                                      <div class="col-md-12 text-right">
                                        <button type="button" id="addMore" class="btn btn-primary">+ More</button>
                                      </div>
                                    </div> -->
                                    <!-- <div class="row" id="prescribedMedicineList" style="display: none; margin-top: 10px;">
                                      <div class="col-md-12">
                                        <table class="table table-bordered table-hover data-tables">
                                          <thead>
                                            <tr>
                                             
                                              <th>HOSPITALITION</th>
                                              <th>    MEDICAL OFFICER</th>
                                              <th> NURSING</th>
                                            </tr>
                                          </thead>
                                          <tbody id="roomInfo">

                                          </tbody>
                                        </table>
                                      </div>
                                    </div> -->
                                    
													<!-- <div class="form-group">
														<label for="">
															Tariff Category
														</label>
														<select name="is_fee_distributed" class="form-control" id="tariff_cat_id" required="true">
															<option value="1">yes</option>
															<option value="0">no</option>
														</select>
													</div> -->

                                  </div>
													<button type="submit" name="submit" class="btn btn-o btn-primary">
														Submit 
													</button>
												</form>
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
        <script src="assets/js/doctor.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
			
				
				if($('#isFeeDistributed').is(":checked"))   
            {$(".feeDistribution").show();}
        else
            {$(".feeDistribution").hide();}

			
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
