


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
    <title>Admin | Appointment History </title>
  
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
                  <h1 class="mainTitle">Appointment History </h1>

                                  </div>
                </div>
              </div>
           











                    <div class="row">
<div class="col-sm-8">
<h1 class="mainTitle">Appointment History | Search By date</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Appointment History</span>
</li>
<li class="active">
<span>Search By date</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
	<form role="form" method="post" name="search">

<div class="form-group">
<label for="doctorname">
Search by Date.
</label>
<input type="date" name="opDate" id="opDate"  value="" required='true'>
</div>

<button type="submit" name="search" id="submit" class="btn btn-o btn-primary">
Search
</button>
</form>
<?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['opDate'];
  ?>
  <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>
<table class="table table-hover" id="sample-table-1">
<thead>

                                        <tr>
												
												<th class="hidden-xs">Patient Name</th>
												<th>Doctor Name</th>
												<th>Specialization</th>
												<th>Doctor Fees</th>
												<th>Appointment Date / Time </th>
												<th>Appointment Creation Date  </th>
												
												<th>Action</th>
												
											</tr>
</thead>
<tbody>
<?php

$sql=mysqli_query($con,"SELECT tblp.PatientName,doc.doctorName,doc.specilization,doc.docFees,apt.appointmentDate,apt.postingDate FROM appointment as apt INNER JOIN tblpatient AS tblp ON apt.userId = tblp.ID INNER JOIN doctors AS doc ON apt.doctorId = doc.id where apt.appointmentDate== '$sdata'" );
$num=mysqli_num_rows($sql);
if($num>0){
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
<tr>
<td class="center"><?php echo $cnt;?>.</td>
<td class="hidden-xs"><?php echo $row['patNme'];?></td>
<td><?php echo $row['opDate'];?></td>
<td><?php echo $row['opTitle'];?></td>
<td><?php echo $row['opTime'];?></td>
<td><?php echo $row['pRNote'];?></td>
<td><?php echo $row['doctorName']; ?>
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