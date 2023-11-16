<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
if(isset($_POST['editform']))
    {
        $id = $_GET["id"];
        $summary = $_POST['summary'];
        $dischargeadvice = $_POST['dischargeadvice'];
    
        $query = "UPDATE `patdischargesummary` SET `summary`='".$summary."',`dischargeadvice`='".$dischargeadvice."' WHERE unqId = '".$id."'";
      
         $sql=mysqli_query($con,$query);
        if($sql)
        {
            echo "<script>alert('MEDICAL HISTORY UPDATED');</script>";

        }
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctr | Edit Doctor Details</title>
		
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
									<h1 class="mainTitle">Doctor | EDIIT DISCHARGE SUMMARY</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>PATIENT DISCHARGE SUMMARY</span>
									</li>
									<!-- <li class="active">
										<span>Edit Doctor Details</span>
									</li> -->
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-12 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Edit Discharge Summary</h5>
												</div>
												<div class="panel-body">
                                                    <?php
                                                        $id = $_GET["id"];
                                                        $query2 = "SELECT * FROM `patdischargesummary` WHERE unqId='".$id."'";
                                                        //print_r($query2);
                                                        $result2 = $con->query($query2);
                                                    ?>
                                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <tr  style = "align:center;">
                                                        <th colspan="8">Medical History</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Report Id</th>
                                                        <th>Discharge Summary</th>
                                                        <th>Advice on Discharge</th>
                                                        <th></th>
                                                    </tr>
                                                    <?php while ($row = mysqli_fetch_array($result2)) {
                                                        ?>
                                                        <form role="form" action="" method="POST">
                                                        <tr>
                                                            <td>
                                                                1.
                                                            </td>
                                                            <td>
                                                                <input  class="form-control" name="summary" value="<?php echo $row['summary']?>">
                                                            </td>
                                                            <td>
                                                                <input  class="form-control" name= "dischargeadvice" value="<?php echo $row['dischargeadvice']?>">
                                                            </td>
                                                            
                                                            <td><input type="submit" value="Submit" name="editform"></td>
                                                        </tr>
                                                        </form>
                                                        <?php
                                                        
                                                    }?>

                                                    </table>
                                                </div>
									
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
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			<>
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
