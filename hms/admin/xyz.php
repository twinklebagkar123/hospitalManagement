<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
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
                                            <div class="row">
									<div class="col-md-12">
										<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Ambulance</span></h5>
										<p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
											<?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
										<table class="table table-hover" id="sample-table-1">
											<thead>
												<tr>
													<th class="center">#</th>
													<th>name</th>
													<th>Price</th>
													<th>fee distributed</th>

													<th>Action</th>

												</tr>
											</thead>
											<tbody id="delete">
												<?php
												$sql = mysqli_query($con, "SELECT * FROM `tariff_room_info`");
												$cnt = 1;
												while ($row = mysqli_fetch_array($sql)) {
												?>

													<tr>
														<td class="center"><?php echo $cnt; ?>.</td>
														<td><?php echo $row['tariff_room_name']; ?></td>
														<td><?php echo $row['tariff_room_fee']; ?></td>
														<td><?php echo $row['tariff_fee_distribution']; ?></td>

														<td>
															<div class="visible-md visible-lg hidden-sm hidden-xs">
																<a href="editAmbulance.php?id=<?php echo $row['id']; ?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>
																<!-- add-medicine.php?code=<?php //echo $row['code']
																							?>&del=delete										 -->
																<a href="#" class="btn btn-transparent btn-xs tooltips dellClass " data-id='<?php echo $row['id']; ?>' id="del" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
															</div>
															<div class="visible-xs visible-sm hidden-md hidden-lg">
																<div class="btn-group" dropdown is-open="status.isopen">
																	<button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
																		<i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
																	</button>
																	<ul class="dropdown-menu pull-right dropdown-light" role="menu">
																		<li>
																			<a href="#">
																				Edit
																			</a>
																		</li>
																		<li>
																			<a href="#">
																				Share
																			</a>
																		</li>
																		<li>
																			<a href="#">
																				Remove
																			</a>
																		</li>
																	</ul>
																</div>
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
