<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$vid=intval($_GET['tariff_room_id']);// get room id
if(isset($_POST['']))
{
	$tclassname=$_POST['tariff_class_name'];
	

	$query = "INSERT INTO `tariff_class` ( `tariff_class_name`) VALUES ('$tclassname');";
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
												<h5 class="panel-title">Add Tariff Class</h5>
											</div>
											<div class="panel-body">

												<form role="form" action="" method="post" >

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
                                                </div>

                                                <div class="form-group">
														<label for="doctor">
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


													
                                                    
													<button type="submit" name="submit" class="btn btn-o btn-primary">
														Submit 
													</button>
												</form>
											</div>
                                            <?php
if(isset($_POST['tariff_cat_id']))
{ 

$sdata=$_POST['tariff_cat_id'];
//$cat=$_POST['tariff_cat_name'];
$cdata=$_POST['tariff_class_name'];
echo "category id: ".$sdata." class id : ".$cdata;
  ?>
  <!-- <h4 align="center">Result against  </h4> -->
<table class="table table-hover" id="sample-table-1">
<thead>
<tr>

<th>name</th>
<th>Fee distribution</th>
<th>total price</th>

<th>Action</th>
</tr>
</thead>
<tbody>
<?php

$sql=mysqli_query($con,"select * from tariff_room_info where tariff_cat_id = '$sdata' AND tariff_class_type_id = '$cdata'");
$num=mysqli_num_rows($sql);
if($num>0){
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
<tr>


	

<td><?php echo $row['tariff_room_name'];?></td>
<td><button type="button" data-admissionID="<?php echo $row['unqId']; ?>" class="btn btn-primary assignTest" data-toggle="modal" data-target="#myModal">view</button></td>
<td><?php echo $row['tariff_room_fee'];?></td>


</td>
<td>
<button  id="remove_medicine" class=" btn btn-primary" style="padding: 0px 10px;">-</button>
           

</td>
</tr>
<?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
   
<?php } }?></tbody>
</table>

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
