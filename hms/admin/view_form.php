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
<style type="text/css">
.title_style{
	color: #333;
	font-size:16px;
 font-weight: bold;
}
.form_title_style{

	font-weight:bold; 
	color: #333;
	text-align:center;
	margin-top:6px;
}
p{
	font-size: 16px;
}
.field_style{

	font-size: 16px;
}

.main_title_style{

font-size: 16px;	
 color: #333;
 text-decoration:underline ;
 font-weight:bold;
}


</style>
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


<?php  //}?>  
				<form method="POST" action="">
                                    <?php
                                    $query = "SELECT * FROM `laboratoryTestList` where labFormID= '$id'";
                                    $result = $con->query($query);
                                    $fields_arr="";
                                    while ($row = mysqli_fetch_array($result)) {
                                        
                                    ?>

<div class="row">

<div class="col-sm-6 justify-content-start ">
<p class="title_style"> PATIENT NAME: - </p>
<p class="title_style">Ref. By: - St. Anthony Hospital & Research Center </p>
<p class="title_style">DATE: -  </p>



</div>


<div class="col-sm-6 justify-content-end font-weight-bold">

<p class="title_style">SEX: - </p>
<p class="title_style">AGE: -  </p>
<p class="title_style">Reg. no: -1363/02  </p>

</div>





</div>

 <div style=" border-width:2px; border-style: solid; "> </div>


                                        <h3 class="form_title_style"> <u> <?php echo $row['labTestName']; ?> </u></h3>
					<!-- <div class="wrapper_style">					 -->
<div class="row text-center">
                                        <?php
										$fields = $row['labFields'];
                                        $fields_arr = explode(",", $fields);
                                        $titles = $row['main_titles'];
                                        $title_arr = explode(",", $titles);
										$info = $row['test_more_info'];
										$b = html_entity_decode($info);
										
								

                                        $title_count=0;
                                        foreach ($title_arr as  $titles) {


											?>
											<div class="col-sm-3  ">
                                                
											<p class="main_title_style"> <?php echo $titles; ?></p>
								   
									</div>

									
								
								<?php 
							$title_count++;
							} ?></div>
								<div class="text-center">
									
					
				 </div> 
				 <table class="table table-hover" id="sample-table-1">
											<thead>
												
											</thead>
											<tbody id="valueShow">
											<?php
										$sql = mysqli_query($con, "SELECT * FROM `laboratoryTestList`;");
										$cnt = 1;
										while ($row = mysqli_fetch_array($sql)) {
										?>
<tr>
<?php
												if(!empty($row['labFields'])):
													$valuesDistribution = json_decode($row['labFields']);
													$i=0;
											foreach($valuesDistribution as $value) {
												print_r($value);
												$i++;
													echo "field name". $valuesDistribution->fieldName;
													 echo "units". $valuesDistribution->units;
													 echo "referanceRange". $valuesDistribution->referanceRange;
													 echo "normalRange" . $valuesDistribution[i]->normalRange;
												}
													
												endif;
						

												



											}?>
</tr>

											</tbody>
										</table>
<p> <?php echo $b; ?> </p>
<p class="text-center">~~ End of report ~~</p>
<?php
								
										$i++;
										}
									
										?>
                                     
<div>
	<p>  </p>
	


</div>




									 </div>   






                                </form>





									</tbody>
								</table> 
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