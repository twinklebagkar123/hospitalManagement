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
            <div class="col-sm-6 ">
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
            <div class="col-sm-6">
              <div class="input-group">
                <input type="text" class="form-control-input" id="name" placeholder="Customer Name">
                <input type="text" class="form-control-input" id="phone" placeholder="Phone No.">
              </div>
              <table class="table table-bordered" id="display">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th style="width: 15%;">Delete</th>
                  </tr>
                </thead>
                <tbody id="tbid">



                </tbody>
                <tfoot>
                  <tr>

                    <td>TOTAL</td>
                    <td id="total" colspan="2"></td>
                  </tr>
                </tfoot>
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