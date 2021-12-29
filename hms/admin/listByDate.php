


 <?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$date=  $_POST['opDate'];
$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin | Doctor Operation</title>
  
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
<?php include('include/sidebar.php');?>
      <div class="app-content">
        
            <?php include('include/header.php');?>
          
        <!-- end: TOP NAVBAR -->
        <div class="main-content" >
          <div class="wrap-content container" id="container">
            <!-- start: PAGE TITLE -->
            <section id="page-title">
              <div class="row">
                <div class="col-sm-8">
                  <h1 class="mainTitle">Operation List </h1>

                                  </div>
                </div>
              </div>
           



              <div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">
								<h5 class="over-title margin-bottom-15">View <span class="text-bold">Patients</span></h5>
                                <div class="form-group">
								
									<label for="opDate">Select a Date:</label>
									<input type="date" id="opDate" name="opDate">

                                    <input type="submit" name="search" class="btn btn-outline-secondary btn-sm" id="Submit" value="Search">
								</div>
                                <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
                             <span>
								<table class="display" id="oc">
									<thead>
										<tr>
											<th class="center">#</th>
											<th>Patient Name</th>
											<th>Operation Date</th>
											<th>Operation Title </th>
											<th>peration Time </th>
											<th> Note </th>
                                            <th> doctorName </th>

											
                   
										</tr>
									</thead>
									<tbody id="patientList">

										<?php

										$sql = mysqli_query($con, "SELECT patientoperation.patNme, patientoperation.opDate,patientoperation.opTitle,patientoperation.opTime,patientoperation.pRNote, doctors.doctorName FROM patientoperation INNER JOIN doctors ON patientoperation.docID = doctors.id where patientoperation.opDate= '$date'");
             
										$cnt = 1;
										while ($row = mysqli_fetch_array($sql)) {
										?>
											<tr>
												<td class="center"><?php echo $cnt; ?>.</td>
												<td class="hidden-xs"><?php echo $row['patNme']; ?></td>
												<td><?php echo $row['opDate']; ?></td>
												<td><?php echo $row['opTitle']; ?></td>
												<td><?php echo $row['opTime']; ?></td>
												<td><?php echo $row['pRNote']; ?>
                                                <td><?php echo $row['doctorName']; ?>
												</td>

												


												
											</tr>
										<?php
											$cnt = $cnt + 1;
										} ?>
									</tbody>


							</div>
						</div>
					</div>
					</table>
                                    </span>
				</div>
			</div>
		</div>
	





                </div>
              </div>
            
            <!-- end: BASIC EXAMPLE -->
            <!-- end: SELECT BOXES -->
            
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
    <script src="assets/js/bill.js"></script>
    <!-- start: JavaScript Event Handlers for this page -->
    <script src="assets/js/form-elements.js"></script>
    <script>
      jQuery(document).ready(function() {
        Main.init();
        FormElements.init();
        $("#Submit").on("click", function() {
										// var name = $(this).data("name");
										// var id = $(this).data("pid");
										// $("#titleModal").html("Book " + name + "'s Appointment");
										// $("#idInput").val(id);

                                        console.log("heyyyyy");
									});


        $("#opDate").on("change", function() {
            console.log("heyyy");
        });
      });




    </script>
    <script> 
	$(document).ready( function () {
    $('#oc').DataTable();
} );
										
		</script>
    <!-- end: JavaScript Event Handlers for this page -->
    <!-- end: CLIP-TWO JAVASCRIPTS -->
  </body>
</html>