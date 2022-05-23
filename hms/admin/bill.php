

<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
// $admissionId = 9;
// $paymentStatus = "pending";
$query = "SELECT * FROM `patientAdmission` INNER JOIN tblpatient ON patientAdmission.uid = tblpatient.ID WHERE patientAdmission.unqId = '9'";
$result = $con->query($query);
//var_dump($result);
while($row = mysqli_fetch_array($result)){
  //var_dump($row);
  $name = $row["PatientName"];
  $dateofadmission = $row["dateofadmission"];
  $dateofdischarge = $row["dateofdischarge"];
  $advance_paid = $row["advance_paid"];
  $registration_fee = $row["registration_fee"];
  $package_id = $row["package_id"];
  $Patientdob  = $row["Patientdob"];
  $docID = $row["docID"];
 // $package_id = $row["package_id"];
 //Convert Date
 $createDate = new DateTime($dateofadmission);
 $dateofadmissionNoTime = $createDate->format('Y-m-d');
 $date2 = new DateTime($dateofdischarge);
 $dateofdischargeNoTime = $date2->format('Y-m-d');
 if($dateofdischargeNoTime = "0000-00-00"){
   $dateofdischargeNoTime = date('Y-m-d');
 }
 //Days in difference
 $dateofadmissionNoTime =  new DateTime($dateofadmissionNoTime);
 $dateofdischargeNoTime =  new DateTime($dateofdischargeNoTime);
 $interval 	= $dateofadmissionNoTime->diff($dateofdischargeNoTime);

$day = $interval->format('%a');
}
function getTariffCost ($tariffID){
  global $con;
  $returnVal ="";
  $query = "SELECT tariff_room_fee FROM `tariff_room_info` WHERE tariff_room_id = '$tariffID'";
  $result = $con->query($query);
  while($row = mysqli_fetch_array($result)){
    $returnVal = $row["tariff_room_fee"];
  }
 
  return $returnVal;
}
function getDoctorFees ($docID){
  global $con;
  $returnVal ="";
  $query = "SELECT docFees FROM `doctors` WHERE id = '$docID'";
  $result = $con->query($query);
  while($row = mysqli_fetch_array($result)){
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
              <div class="col-sm-8">
                <h1 class="mainTitle">Billing | Add Bill</h1>

              </div>
            </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <div class="hospitalCharges">
                <h5>
                  Hospital Bill
                </h5>
                <p>Hospital Charges</p>
                <select class="form-select form-control" aria-label="Default select example">
                  <option selected>select hospital charges</option>
                  <option value="registration_fees">Registration Fees</option>
                  <option value="resident_dr_charges">Resident Doctor's Chrages</option>
                  <option value="nursing_care">Nursing Care</option>
                  <option value="owygen_charges">Oxygen Charges</option>
                  <option value="monitor">Monitor</option>
                  <option value="spo2">SPO2</option>
                  <option value="syringe_pump">Syringe Pump</option>
                  <option value="medicines_disposables">Medicines & Disposables</option>
                </select>
                <input type="text" class="form-control-input" id="price" placeholder="price">

                <button type="button" class="btn btn-outline-secondary btn-sm" id="add"> ADD</button>
              </div>
              <div class="hospitalCharges">
                <h5>
                Surgery Charges
                </h5>
                <p>Surgery Charges</p>
                <select class="form-select form-control" aria-label="Default select example">
                  <option selected>select surgery charges</option>
                  <option value="operation_theater">operation theater</option>
                  <option value="OT_nurse">OT nurse</option>
                  <option value="equipment_charges">Equipment Charges (C-ARM)</option>
                  <option value="technician">Technician</option>
                  <option value="OT_assistant">OT assistant</option>
                  <option value="surgeon">Surgeon</option>
                  <option value="anesthetist">Anesthetist</option>
                  <option value="OT_gases">OT Gases</option>
                  <option value="implant">Implant</option>
                  <option value="OT_medicines_disposables">OT- medicines & disposables</option>
                </select>
                <input type="text" class="form-control-input" id="price" placeholder="price">

                <button type="button" class="btn btn-outline-secondary btn-sm" id="add"> ADD</button>
              </div>
              <div class="hospitalCharges">
                <h5>
                INVESTIGATIONS
                </h5>
                <p>INVESTIGATIONS</p>
                <select class="form-select form-control" aria-label="Default select example">
                  <option selected>select INVESTIGATIONS</option>
                  <option value="rbsl">RBSL</option>
                  <option value="laboratory_charges">Laboratory Charges</option>
                  <option value="histopathology">Histopathology</option>
                  <option value="technician">Technician</option>
                  <option value="OT_assistant">OT assistant</option>
                  <option value="surgeon">Surgeon</option>
                  <option value="anesthetist">Anesthetist</option>
                  <option value="OT_gases">OT Gases</option>
                  <option value="implant">Implant</option>
                  <option value="OT_medicines_disposables">OT- medicines & disposables</option>
                </select>
                <input type="text" class="form-control-input" id="price" placeholder="price">

                <button type="button" class="btn btn-outline-secondary btn-sm" id="add"> ADD</button>
              </div>
              <div class="hospitalCharges">
                <h5>
                OTHER CHARGES
                </h5>
                <p>OTHER CHARGES</p>
                <select class="form-select form-control" aria-label="Default select example">
                  <option selected>select INVESTIGATIONS</option>
                  <option value="physiotherapy">Physiotherapy</option>
                  <option value="miscellaneous_charges">Miscellaneous charges</option>
                  <option value="food_charges">Food charges</option>
                  <option value="communication_charges">Communication charges</option>
                  <option value="attendant_room_charges">attendant_room_charges</option>
                  <option value="ambulance">ambulance</option>
                  <option value="water_mattress">water mattress</option>
                  <option value="air_mattress">air mattress</option>
                </select>
                <input type="text" class="form-control-input" id="price" placeholder="price">

                <button type="button" class="btn btn-outline-secondary btn-sm" id="add"> ADD</button>
              </div>
              <div class="hospitalCharges">
                <h5>
                PROCEDURE CHARGES
                </h5>
                <p>PROCEDURE CHARGES</p>
                <select class="form-select form-control" aria-label="Default select example">
                  <option selected>select PROCEDURE CHARGES</option>
                  <option value="tapping">TAPPING</option>
                  <option value="lumber_puncture">lumber puncture</option>
                  <option value="blood_tranfution">blood tranfution</option>
                  <option value="nebulizer_charges">Nebulizer Charges</option>
                  <option value="dressing">Dressing</option>
                  <option value="cvp_intubation">CVP/Intubation</option>
                  <option value="minor_ot">Minor OT</option>
                  <option value="ryles_tube_procedure">Ryles Tube Procedure</option>
                  <option value="cathetersation">Cathetersation</option>
                  <option value="radioligy">RADIOLOGY</option>
                  <option value="2d_echo">2D ECHO</option>
                  <option value="x_ray">X-Ray</option>
                  <option value="doppler">Doppler</option>
                  <option value="ultrasound">Ultrasound</option>
                  <option value="ecg">ECG</option>
                  <option value="ct_scan">CT SCAN</option>
                </select>
                <input type="text" class="form-control-input" id="price" placeholder="price">

                <button type="button" class="btn btn-outline-secondary btn-sm" id="add"> ADD</button>
              </div>
              <div class="input-group">
                <input type="text" class="form-control-input" id="service" placeholder="service">
                <input type="text" class="form-control-input" id="price" placeholder="price">

                <button type="button" class="btn btn-outline-secondary btn-sm" id="add"> ADD</button>
              </div>
            </div>
            <div class="col-sm-8">
              <table class="table table-bordered">

                <tr>

                  <div class="row">
                    <div class="col-sm-12">
                      <h4 class="text-center">HOSPITAL BILL</h4>
                    </div>


                  </div>

                </tr>
                <tr>

                  <div class="row">


                    <div class="col-sm-4">
                      <h5> PATIENT NAME: <span><?php echo $name;?></span></h5>
                    </div>
                    <div class="col-sm-4">
                      <h5>D.O.B : <?php echo $Patientdob;?></h5>
                    </div>
                    <div class="col-sm-4">
                      <h5> DATE: <span><?php echo date("d/m/Y");?></span></h5>
                    </div>


                  </div>

                </tr>
                <tr>

                  <div class="row">


                    <div class="col-sm-4">
                      <h5> ADMISSION NO: </h5>
                    </div>
                    <div class="col-sm-4">
                      <h5>D.O.A : <?php echo $dateofadmission;?></h5>
                    </div>
                    <div class="col-sm-4">
                      <h5> D.O.D: <?php echo $dateofdischarge;?></h5>
                    </div>
                    <div class="col-sm-4">
                      <h5> Admission Days: <?php echo $day." Days";?></h5>
                    </div>


                  </div>

                </tr>


                <tr>
                  <th> HOSPITAL CHARGES </th>
                  <th> AMOUNT </th>
                  <th> OTHER CHARGES</th>
                  <th> AMOUNT</th>
                </tr>
                <tr>
                  <td>Registration Fees </td>
                  <td><?php echo $registration_fee ;?></td>
                  <td> Physiotherapy</td>
                  <td> </td>

                </tr>
                <tr>
                  <td>Hospital Charges <?php echo "(Rs. "; echo getTariffCost($package_id); echo " per day)";?> </td>
                  <td> <?php echo getTariffCost($package_id)*$day;?></td>
                  <td> Miscellaneous charges</td>
                  <td> </td>
                </tr>
                <tr>
                  <td>Resident DR's Charges </td>
                  <td> <?php echo getDoctorFees($docID)?></td>
                  <td> Food charges</td>
                  <td> </td>
                </tr>
                <tr>
                  <td>Nursing care </td>
                  <td> </td>
                  <td> Communication charges</td>
                  <td> </td>
                </tr>
                <tr>
                  <td> HOSPITAL CHARGES </td>
                  <td> </td>
                  <td> Attendant room charges</td>
                  <td> </td>
                </tr>
                <tr>
                  <td>Hospital Charges </td>
                  <td> </td>
                  <td> ambulance </td>
                  <td> </td>
                </tr>
                <tr>
                  <td>Resident DR's Charges </td>
                  <td> </td>
                  <td> water mattress </td>
                  <td> </td>
                </tr>
                <tr>
                  <td>nursing care </td>
                  <td> </td>
                  <td> air mattress </td>
                  <td> </td>
                </tr>
                <tr>
                  <td>oxygen charges </td>
                  <td> </td>
                  <td> PROCEDURE CHARGES </td>
                  <td> </td>
                </tr>
                <tr>
                  <td>moinitor </td>
                  <td> </td>
                  <td> TAPPING </td>
                  <td> </td>
                </tr>
                <tr>
                  <td>SPO2 </td>
                  <td> </td>
                  <td> lumber puncture </td>
                  <td> </td>
                </tr>
                <tr>
                  <td>SYRINGE PUMP </td>
                  <td> </td>
                  <td> blood tranfution </td>
                  <td> </td>
                </tr>



                <tr>
                  <td>Hospital -medicines & disposables </td>
                  <td> </td>
                  <td> Nebulizer Charges </td>
                  <td> </td>
                </tr>
                <tr>
                  <td>SURGERY CHARGES </td>
                  <td> </td>
                  <td>Dressing</td>
                  <td> </td>
                </tr>
                <tr>
                  <td>operation theater </td>
                  <td> </td>
                  <td> CVP/Intubation </td>
                  <td> </td>
                </tr>
                <tr>
                  <td>operation theater </td>
                  <td> </td>
                  <td> CVP/Intubation </td>
                  <td> </td>
                </tr>

                <tr>
                  <td> OT nurse </td>
                  <td> </td>
                  <td> Minor OT </td>
                  <td> </td>
                </tr>

                <tr>
                  <td> Equipment Charges (C-ARM) </td>
                  <td> </td>
                  <td> Ryles Tube Procedure </td>
                  <td> </td>
                </tr>
                <tr>
                  <td> Technician </td>
                  <td> </td>
                  <td>Cathetersation</td>
                  <td> </td>
                </tr>
                <tr>
                  <td>OT assistant</td>
                  <td> </td>
                  <td>REDIOLOGY</td>
                  <td> </td>
                </tr>
                <tr>
                  <td>Surgeon</td>
                  <td> </td>
                  <td>2D ECHO</td>
                  <td> </td>
                </tr>
                <tr>
                  <td> Anesthetist </td>
                  <td> </td>
                  <td> X-Ray </td>
                  <td> </td>
                </tr>
                <tr>
                  <td> OT Gases </td>
                  <td> </td>
                  <td> Doppler </td>
                  <td> </td>
                </tr>
                <tr>
                  <td>Implant</td>
                  <td> </td>
                  <td>Ultrasound</td>
                  <td> </td>
                </tr>
                <tr>
                  <td> OT- medicines & disposables </td>
                  <td> </td>
                  <td>ECG </td>
                  <td> </td>
                </tr>
                <tr>
                  <td>INVESTIGATIONS</td>
                  <td> </td>
                  <td>Ultrasound</td>
                  <td> </td>
                </tr>
                <tr>
                  <td>RBSL</td>
                  <td> </td>
                  <td>CT SCAN</td>
                  <td> </td>
                </tr>
                <tr>
                  <td>Laboratory Charges</td>
                  <td> </td>
                  <td>GRAND TOTAL </td>
                  <td> </td>
                </tr>
                <tr>
                  <td>Histopathology</td>
                  <td> </td>
                  <td>ADVANCE PAID </td>
                  <td> </td>
                </tr>
                <tr>
                  <td>DOCTORS CHARGES</td>
                  <td> </td>
                  <td>DISCOUNT </td>
                  <td> </td>
                </tr>
                <tr>
                  <td>DR. NOEL</td>
                  <td> </td>
                  <td>TOTAL </td>
                  <td> </td>
                </tr>
                <tr>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                </tr>
                <tr>
                  <td> </td>
                  <td> </td>
                  <td>NET PAYABLE </td>
                  <td> </td>
                </tr>
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
    jQuery(document).ready(function() {
     $("select").click(function(){
       var myValue = $(this).val();
       console.log(myValue+"selected value");
     });
    });
  </script>
  <!-- end: JavaScript Event Handlers for this page -->
  <!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>