<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if (isset($_POST['submitButton'])) {
  $table = htmlentities($_POST['printingtable']);
  // var_dump($table);
}
$admissionId = 9;
// $paymentStatus = "pending";
$query = "SELECT * FROM `patientAdmission` INNER JOIN tblpatient ON patientAdmission.uid = tblpatient.ID WHERE patientAdmission.unqId = '$admissionId'";
$result = $con->query($query);
while ($row = mysqli_fetch_array($result)) {
  $name = $row["PatientName"];
  $dateofadmission = $row["dateofadmission"];
  $dateofdischarge = $row["dateofdischarge"];
  $advance_paid = $row["advance_paid"];
  $registration_fee = $row["registration_fee"];
  $package_id = $row["package_id"];
  $Patientdob  = $row["Patientdob"];
  $docID = $row["docID"];
  $createDate = new DateTime($dateofadmission);
  $dateofadmissionNoTime = $createDate->format('Y-m-d');
  $date2 = new DateTime($dateofdischarge);
  $dateofdischargeNoTime = $date2->format('Y-m-d');
  if ($dateofdischargeNoTime = "0000-00-00") {
    $dateofdischargeNoTime = date('Y-m-d');
  }

  //Days in difference
  $dateofadmissionNoTime =  new DateTime($dateofadmissionNoTime);
  $dateofdischargeNoTime =  new DateTime($dateofdischargeNoTime);
  $interval   = $dateofadmissionNoTime->diff($dateofdischargeNoTime);
  $day = $interval->format('%a');
  //calculate laboratory charges
  $labquery = "SELECT SUM(charges) as totalLabCharges FROM `labTestRecord` WHERE admissionID = '$admissionId'";
  $result2 = $con->query($labquery);
  while ($row = mysqli_fetch_array($result2)) {
    $labChargesTotal = $row['totalLabCharges'];
  }
  // calculate operation charges
  $operationQuery = "SELECT SUM(procedureList.charges) as totalCost , SUM(patientoperation.operationFeeRecieved) as advance FROM `patientoperation` INNER JOIN `procedureList` ON patientoperation.opTitle = procedureList.procedureID AND patientoperation.patient_admission_id = '9'";
  $result3 = $con->query($operationQuery);
  while ($row = mysqli_fetch_array($result3)) {
    $operationCharges = $row['totalCost'];
    $opadvance = $row['advance'];
    $finalOperationCharges = $operationCharges - $opadvance;
  }
}
function getTariffCost($tariffID)
{
  global $con;
  $returnVal = "";
  $query = "SELECT tariff_room_fee FROM `tariff_room_info` WHERE tariff_room_id = '$tariffID'";
  $result = $con->query($query);
  while ($row = mysqli_fetch_array($result)) {
    $returnVal = $row["tariff_room_fee"];
  }

  return $returnVal;
}
function getDoctorFees($docID)
{
  global $con;
  $returnVal = "";
  $query = "SELECT docFees FROM `doctors` WHERE id = '$docID'";
  $result = $con->query($query);
  while ($row = mysqli_fetch_array($result)) {
    $returnVal = $row["docFees"];
  }
  return $returnVal;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin | Patient Bill</title>

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
    <?php include('include/sidebar.php'); ?>
    <div class="app-content">

      <?php include('include/header.php'); ?>

      <!-- end: TOP NAVBAR -->
      <div class="main-content">
        <div class="wrap-content container" id="container">
          <!-- start: PAGE TITLE -->
          <section id="page-title">
            <div class="row">
              <div class="col-sm-12">
                <h4 class="text-center">HOSPITAL BILL</h4>
              </div>


            </div>
            <div class="row">


                    <div class="col-sm-4">
                      <h5> PATIENT NAME: <span><?php echo $name; ?></span></h5>
                    </div>
                    <div class="col-sm-4">
                      <h5>D.O.B : <?php echo $Patientdob; ?></h5>
                    </div>
                    <div class="col-sm-4">
                      <h5> DATE: <span><?php echo date("d/m/Y"); ?></span></h5>
                    </div>


                  </div>
                  <div class="row">


                    <div class="col-sm-4">
                      <h5> ADMISSION NO: </h5>
                    </div>
                    <div class="col-sm-4">
                      <h5>D.O.A : <?php echo $dateofadmission; ?></h5>
                    </div>
                    <div class="col-sm-4">
                      <h5> D.O.D: <?php echo $dateofdischarge; ?></h5>
                    </div>
                    <div class="col-sm-4">
                      <h5> Admission Days: <?php echo $day . " Days"; ?></h5>
                    </div>


                  </div>
        </div>
        <div class="container">
          <div class="row">

            <div class="col-sm-12">
              <table class="table table-bordered" id="printingTable">
                <tbody>
                  <?php echo html_entity_decode($table); ?>
                </tbody>
              </table>
            </div>


          </div>

        </div>






      </div>
    </div>

    <!-- end: BASIC EXAMPLE -->
    <!-- end: SELECT BOXES -->

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
    window.onload = function() {
      //console.log("DOcument loaded");
      window.print();
      document.getElementById("goBackRow").setAttribute("style", "display: block;");
    }
  </script>
  <!-- end: JavaScript Event Handlers for this page -->
  <!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>