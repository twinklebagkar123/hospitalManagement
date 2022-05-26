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
while ($row = mysqli_fetch_array($result)) {
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
  if ($dateofdischargeNoTime = "0000-00-00") {
    $dateofdischargeNoTime = date('Y-m-d');
  }
  //Days in difference
  $dateofadmissionNoTime =  new DateTime($dateofadmissionNoTime);
  $dateofdischargeNoTime =  new DateTime($dateofdischargeNoTime);
  $interval   = $dateofadmissionNoTime->diff($dateofdischargeNoTime);

  $day = $interval->format('%a');
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
                  <option value="oxygen_charges">Oxygen Charges</option>
                  <option value="monitor">Monitor</option>
                  <option value="spo2">SPO2</option>
                  <option value="syringe_pump">Syringe Pump</option>
                  <option value="medicines_disposables">Medicines & Disposables</option>
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
                  <option value="physiotherapy">Physiotherapy</option>
                  <option value="miscellaneous_charges">Miscellaneous charges</option>
                  <option value="food_charges">Food charges</option>
                  <option value="communication_charges">Communication charges</option>
                  <option value="attendant_room_charges">attendant room charges</option>
                  <option value="ambulance">ambulance</option>
                  <option value="water_mattress">water mattress</option>
                  <option value="air_mattress">air mattress</option>
                  <option value="tapping">TAPPING</option>
                  <option value="lumber_puncture">lumber puncture</option>
                  <option value="blood_tranfution">blood tranfution</option>
                  <option value="nebulizer_charges">Nebulizer Charges</option>
                  <option value="dressing">Dressing</option>
                  <option value="cvp_intubation">CVP/Intubation</option>
                  <option value="minor_ot">Minor OT</option>
                  <option value="ryles_tube_procedure">Ryles Tube Procedure</option>
                  <option value="cathetersation">Cathetersation</option>
                  <option value="radiology">RADIOLOGY</option>
                  <option value="2d_echo">2D ECHO</option>
                  <option value="x_ray">X-Ray</option>
                  <option value="doppler">Doppler</option>
                  <option value="ultrasound">Ultrasound</option>
                  <option value="ecg">ECG</option>
                  <option value="ct_scan">CT SCAN</option>
                </select>
                <input type="number" class="form-control-input" id="price" placeholder="price">

                <button type="button" class="btn btn-outline-secondary btn-sm" id="addService"> ADD</button>
              </div>
              <div class="hospitalCharges">
                <p> ADD DISCOUNT </p>
                <input type="number" class="form-control-input" id="discount" placeholder="discount">
                <button type="button" class="btn btn-outline-secondary btn-sm" id="discountButton"> ADD</button>
              </div>
              <div class="hospitalCharges">
                <p> ADD ADVANCE </p>
                <input type="number" class="form-control-input" id="advance" placeholder="advance">
                <button type="button" class="btn btn-outline-secondary btn-sm" id="advanceButton"> ADD</button>
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
                      <h5> PATIENT NAME: <span><?php echo $name; ?></span></h5>
                    </div>
                    <div class="col-sm-4">
                      <h5>D.O.B : <?php echo $Patientdob; ?></h5>
                    </div>
                    <div class="col-sm-4">
                      <h5> DATE: <span><?php echo date("d/m/Y"); ?></span></h5>
                    </div>


                  </div>

                </tr>
                <tr>

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

                </tr>


                <tr>
                  <th> HOSPITAL CHARGES </th>
                  <th> AMOUNT </th>
                  <th> OTHER CHARGES</th>
                  <th> AMOUNT</th>
                </tr>
                <tr>
                  <td>Registration Fees </td>
                  <td id="registration_fees"><?php echo $registration_fee; ?></td>
                  <td> Physiotherapy</td>
                  <td id="physiotherapy"> </td>

                </tr>
                <tr>
                  <td>Hospital Charges <?php echo "(Rs. ";
                                        echo getTariffCost($package_id);
                                        echo " per day)"; ?> </td>
                  <td> <?php echo getTariffCost($package_id) * $day; ?></td>
                  <td> Miscellaneous charges</td>
                  <td id="miscellaneous_charges"> </td>
                </tr>
                <tr>
                  <td>Resident DR's Charges </td>
                  <td id="resident_dr_charges"> <?php echo getDoctorFees($docID) ?></td>
                  <td> Food charges</td>
                  <td id="food_charges"> </td>
                </tr>
                <tr>
                  <td>Nursing care </td>
                  <td id="nursing_care"> </td>
                  <td> Communication charges</td>
                  <td id="communication_charges"> </td>
                </tr>
                <tr>
                  <td> HOSPITAL CHARGES </td>
                  <td> </td>
                  <td> Attendant room charges</td>
                  <td id="attendant_room_charges"> </td>
                </tr>
                <tr>
                  <td>Hospital Charges </td>
                  <td> </td>
                  <td> ambulance </td>
                  <td id="ambulance"> </td>
                </tr>
                <tr>
                  <td>Resident DR's Charges </td>
                  <td> </td>
                  <td> water mattress </td>
                  <td id="water_mattress"> </td>
                </tr>
                <tr>
                  <td>nursing care </td>
                  <td> </td>
                  <td> air mattress </td>
                  <td id="air_mattress"> </td>
                </tr>
                <tr>
                  <td>oxygen charges </td>
                  <td id="oxygen_charges"> </td>
                  <td> PROCEDURE CHARGES </td>
                  <td> </td>
                </tr>
                <tr>
                  <td>moinitor </td>
                  <td id="monitor"> </td>
                  <td> TAPPING </td>
                  <td id="tapping"> </td>
                </tr>
                <tr>
                  <td>SPO2 </td>
                  <td id="spo2"> </td>
                  <td> lumber puncture </td>
                  <td id="lumber_puncture"> </td>
                </tr>
                <tr>
                  <td>SYRINGE PUMP </td>
                  <td id="syringe_pump"> </td>
                  <td> blood tranfution </td>
                  <td> </td>
                </tr>



                <tr>
                  <td>Hospital -medicines & disposables </td>
                  <td> </td>
                  <td> Nebulizer Charges </td>
                  <td id="nebulizer_charges"> </td>
                </tr>
                <tr>
                  <td>SURGERY CHARGES </td>
                  <td> </td>
                  <td>Dressing</td>
                  <td id="dressing"> </td>
                </tr>
                <tr>
                  <td>operation theater </td>
                  <td> </td>
                  <td> CVP/Intubation </td>
                  <td> </td>
                </tr>
                <tr>
                  <td>operation theater </td>
                  <td id="operation_theater"> </td>
                  <td> CVP/Intubation </td>
                  <td id="cvp_intubation"> </td>
                </tr>

                <tr>
                  <td> OT nurse </td>
                  <td> </td>
                  <td> Minor OT </td>
                  <td id="minor_ot"> </td>
                </tr>

                <tr>
                  <td> Equipment Charges (C-ARM) </td>
                  <td id="equipment_charges"> </td>
                  <td> Ryles Tube Procedure </td>
                  <td id="ryles_tube_procedure"> </td>
                </tr>
                <tr>
                  <td> Technician </td>
                  <td id="technician"> </td>
                  <td>Cathetersation</td>
                  <td id="cathetersation"> </td>
                </tr>
                <tr>
                  <td>OT assistant</td>
                  <td id="OT_assistant"> </td>
                  <td>REDIOLOGY</td>
                  <td id="radiology"> </td>
                </tr>
                <tr>
                  <td>Surgeon</td>
                  <td id="surgeon"> </td>
                  <td>2D ECHO</td>
                  <td id="2d_echo"> </td>
                </tr>
                <tr>
                  <td> Anesthetist </td>
                  <td> </td>
                  <td> X-Ray </td>
                  <td id="x_ray"> </td>
                </tr>
                <tr>
                  <td> OT Gases </td>
                  <td id="OT_gases"> </td>
                  <td> Doppler </td>
                  <td id="doppler"> </td>
                </tr>
                <tr>
                  <td>Implant</td>
                  <td id="implant"> </td>
                  <td>Ultrasound</td>
                  <td id="ultrasound"> </td>
                </tr>
                <tr>
                  <td> OT- medicines & disposables </td>
                  <td id="OT_medicines_disposables"> </td>
                  <td>ECG </td>
                  <td id="ecg"> </td>
                </tr>
                <tr>
                  <td>INVESTIGATIONS</td>
                  <td> </td>
                  <td>Ultrasound</td>
                  <td id="ultrasound"> </td>
                </tr>
                <tr>
                  <td>RBSL</td>
                  <td id="rbsl"> </td>
                  <td>CT SCAN</td>
                  <td id="ct_scan"> </td>
                </tr>
                <tr>
                  <td>Laboratory Charges</td>
                  <td id="laboratory_charges"> </td>
                  <td>GRAND TOTAL </td>
                  <td id="grand_total"> </td>
                </tr>
                <tr>
                  <td>Histopathology</td>
                  <td id="histopathology"> </td>
                  <td>ADVANCE PAID </td>
                  <td> <?php echo $advance_paid; ?></td>
                </tr>
                <tr>
                  <td>DOCTORS CHARGES</td>
                  <td> </td>
                  <td>DISCOUNT </td>
                  <td id="discountBox"> </td>
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
                  <td id="netPayable"> </td>
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
      function calculateTotal(sendValues) {
        majorSum = 0;
        sendValues.forEach(function(item) {
          majorSum = majorSum + parseInt(item.price);
        });
        return majorSum;
      }
      function calculateDiscount(amount,total){
        var discount = total - amount;
        return discount;
      }
      function netPayable (){
        var grandTotal = $("#grand_total").text();
        grandTotal =  parseInt(grandTotal.replace('Rs. ','0'));
        var nettotal = $("#netPayable").text();
        var discount =  $("#discountBox").text();
        discount =  parseInt(discount.replace('Rs. ','0'));
        var advance = $("#discount").text();
        advance =  parseInt(advance.replace('Rs. ','0'));
        nettotal = grandTotal - discount - advance;
        return nettotal;
      }
      var sumArr = [];
      sumArr = [{
          name: 'doctor_charges',
          price: <?php echo getDoctorFees($docID); ?>
        },
        {
          name: 'stay_in_hospital',
          price: <?php echo getTariffCost($package_id) * $day; ?>
        }
      ];
      $("#addService").click(function() {
        var majorSum = 0;
        var myValue = $("select").val();
        var sum = 0;
        add = "#" + myValue;
        console.log(myValue + "selected value");

        var price = parseInt($("#price").val());
        $('#' + myValue).text(price);
        sumArr.push({
          name: myValue,
          price: price
        });
        console.log(sumArr);
        var majorSum = calculateTotal(sumArr);
        $("#grand_total").text("Rs. " + majorSum);

      });
      $("#discountButton").click(function(){
        var discount = $("#discount").val();
        $("#discountBox").text("Rs. "+discount);
       
        var grandTotal = $("#grand_total").text();
        grandTotal =  parseInt(grandTotal.replace('Rs. ','0'));
        //var nettotal = $("#netPayable").text();
        var discount =  $("#discountBox").text();
        discount =  parseInt(discount.replace('Rs. ','0'));
        var advance = $("#discount").text();
        advance =  parseInt(advance.replace('Rs. ','0'));
        nettotal = grandTotal - discount - advance;
        console.log(grandTotal+"GT"+discount+"DISC"+ advance+"adv");
       // var finalDiscount = netPayable();
        $("#netPayable").text("Rs. "+finalDiscount);
        
      });
    });
  </script>
  <!-- end: JavaScript Event Handlers for this page -->
  <!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>