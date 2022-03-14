<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

//$id=intval($_GET['labFormID']);
$id= $_GET['id'];
// if (isset($_GET['del'])) {
// 	mysqli_query($con, "delete from laboratoryTestList where labFormID = '" . $_GET['id'] . "'");
// 	$_SESSION['msg'] = "data deleted ! !!";
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin | Admission Fee </title>

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
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
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
								<h1 class="mainTitle">Admin | view form</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Admin</span>
								</li>
								<li class="active">
									<span> View Form</span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">


						<div class="row">
							<div class="col-md-12">
								<h5 class="over-title margin-bottom-15">View <span class="text-bold">Form</span></h5>
								<p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
									<?php echo htmlentities($_SESSION['msg'] = ""); ?></p>

<div class="row">

<?php $sql=mysqli_query($con,"select * from laboratoryTestList where labFormID='$id'");
while($data=mysqli_fetch_array($sql))
{
?>
<?php echo htmlentities($data['labTestName']);?>
</div>
<div class="row">

<?php echo htmlentities($data['main_titles']);?>
</div>
<div class="row">

<div class="col-sm-4">  <?php echo htmlentities($data['labFields']);?> </div> 
<div class="col-sm-4">   </div> 
<div class="col-sm-4">   </div> 



</div>
<?php  }?>  
<form method="POST" action="">
                                    <?php
                                    $query = "SELECT * FROM `laboratoryTestList` where labFormID= '$id'";
                                    $result = $con->query($query);
                                    $fields_arr="";
                                    while ($row = mysqli_fetch_array($result)) {
                                        
                                    ?>
                                        <h3> <?php echo $row['labTestName']; ?> </h3>

                                        <?php
                                        $fields = $row['labFields'];
                                        $fields_arr = explode(",", $fields);
                                        $i=1;
                                        foreach ($fields_arr as  $field) {
                                        ?>
                                            <div class="form-group">
                                                <label for="<?php echo $field; ?>">
                                                    <?php echo $field; ?>
                                                </label>

                                                <input type="text" id="field_lab_<?php echo $i; ?>" name="<?php echo $field; ?>" class="form-control" placeholder="Enter <?php echo $field; ?>">

                                                   
                                            </div>

                                    <?php
                                    $i++;
                                        }?>
                                        <input type="hidden" name="field_lab_counter" id="field_lab_counter" value="<?php echo $i-1;?>">
                                        <?php

                                    }
                                    ?>
                                    <div class="form-group">
                                        <label for="performedBy">
                                           Laboratory Incharge
                                        </label>
                                        <input type="text" id="performedBy" name="performedBy" class="form-control" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="findings">
                                           Laboratory Findings
                                        </label>
                                        <input type="text" id="findings" name="findings" class="form-control" required="true">
                                    </div>
                                    <input type="submit" class="btn btn-o btn-primary" name="submit" value="SUBMIT">
                                </form>




								<!-- <table class="display" id="myTable">
									<thead>
										<tr>
											<th class="center">#</th>
											<th>lab Test Name </th>
												
											<th>lab Charges </th>
											
											<th>Action</th>

										</tr>
									</thead>
									<tbody>
										<?php
										// $sql = mysqli_query($con, "SELECT * FROM laboratoryTestList ");
										// $cnt = 1;
										// while ($row = mysqli_fetch_array($sql)) {
										?>

											<tr>
												<td class="center"><?php //echo $cnt; ?>.</td>
												<td ><?php //echo $row['labTestName']; ?></td>
												
												<td ><?php //echo $row['labCharges']; ?></td>
												
												
												<td>
													<div class="visible-md visible-lg hidden-sm hidden-xs">
														<form action="view_form.php" method="post"  enctype="multipart/form-data">
														


														<input type="submit" value="view" class="btn btn-transparent btn-xs"  tooltip-placement="top" tooltip="Edit">
														
													
													</form>
														<a href="view_lab_form.php?id=<?php //echo $row['labFormID'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
													</div>
													
												</td>
											</tr>

										<?php
											//$cnt = $cnt + 1;
									//	} ?>


									</tbody>
								</table> -->
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
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

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
	<script>
		$(document).ready(function() {
			$('#myTable').DataTable();
		});
	</script>
	<!-- end: JavaScript Event Handlers for this page -->
	<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>