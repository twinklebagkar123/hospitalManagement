<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bill</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



</head>
<body>



</body>
</html>
 -->


<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if (isset($_POST['submit'])) {
  $sql = mysqli_query($con, "insert into doctorSpecilization(specilization) values('" . $_POST['doctorspecilization'] . "')");
  $_SESSION['msg'] = "Doctor Specialization added successfully !!";
}

if (isset($_GET['del'])) {
  mysqli_query($con, "delete from doctorSpecilization where id = '" . $_GET['id'] . "'");
  $_SESSION['msg'] = "data deleted !!";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin | Doctor Specialization</title>

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
            <div class="col-sm-3">
              <div class="hospitalCharges">
                <h5>
                  Hospital Bill
                </h5>
                <p>Hospital Charges</p>
                <select class="form-select form-control-input" aria-label="Default select example">
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
              <div class="input-group">
                <input type="text" class="form-control-input" id="service" placeholder="service">
                <input type="text" class="form-control-input" id="price" placeholder="price">

                <button type="button" class="btn btn-outline-secondary btn-sm" id="add"> ADD</button>
              </div>
            </div>
            <div class="col-sm-9">
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
                      <h5> PATIENT NAME: </h5>
                    </div>
                    <div class="col-sm-4">
                      <h5>D.O.B :</h5>
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
                      <h5>D.O.A :</h5>
                    </div>
                    <div class="col-sm-4">
                      <h5> D.O.D: </h5>
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
                  <td>200</td>
                  <td> Physiotherapy</td>
                  <td> </td>

                </tr>
                <tr>
                  <td>Hospital Charges </td>
                  <td> 1500</td>
                  <td> Miscellaneous charges</td>
                  <td> </td>
                </tr>
                <tr>
                  <td>Resident DR's Charges </td>
                  <td> </td>
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
      Main.init();
      FormElements.init();
    });
  </script>
  <!-- end: JavaScript Event Handlers for this page -->
  <!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>