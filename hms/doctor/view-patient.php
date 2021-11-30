<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if (isset($_POST['submit'])) {

  $vid = $_GET['viewid'];
  $bp = $_POST['bp'];
  $bs = $_POST['bs'];
  $weight = $_POST['weight'];
  $type = $_POST['type'];
  $temp = $_POST['temp'];
  $pres = $_POST['pres'];
  $nn = $_POST['nn'];

  $query .= mysqli_query($con, "insert   tblmedicalhistory(PatientID,BloodPressure,BSType,BloodSugar,Weight,Temperature,MedicalPres,nurseNote)value('$vid','$bp','$type','$bs','$weight','$temp','$pres','$nn')");
  if ($query) {
    echo '<script>alert("Medicle history has been added.")</script>';
    echo "<script>window.location.href ='manage-patient.php'</script>";
  } else {
    echo '<script>alert("Something Went Wrong. Please try again")</script>';
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Doctor | Manage Patients</title>

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
  <link rel="stylesheet" href="assets/css/styleext.css?ver=<?php echo rand();?>">
  <link rel="stylesheet" href="assets/css/plugins.css">
  <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
</head>

<body>
  <script type="text/javascript">
     function getAllValues() {
      $("#loaderIcon").show();
      if($('#autosuggest').val() == ""){
        $("#pillResult").html(' ');
      }
      else{
        jQuery.ajax({
          url: "getAllMedicines.php",
          data: 'med=' + $("#autosuggest").val(),
          type: "POST",
          success: function(data) {
            $("#pillResult").html(data);
            $("#loaderIcon").hide();

          },
          error: function() {}
        });
      }
      
    }
   
   
   
  </script>
  <div id="app">
    <?php include('include/sidebar.php'); ?>
    <div class="app-content">
      <?php include('include/header.php'); ?>
      <div class="main-content">
        <div class="wrap-content container" id="container">
          <!-- start: PAGE TITLE -->
          <section id="page-title">
            <div class="row">
              <div class="col-sm-8">
                <h1 class="mainTitle">Doctor | Manage Patients</h1>
              </div>
              <ol class="breadcrumb">
                <li>
                  <span>Doctor</span>
                </li>
                <li class="active">
                  <span>Manage Patients</span>
                </li>
              </ol>
            </div>
          </section>
          <div class="container-fluid container-fullw bg-white">
            <div class="row">
              <div class="col-md-12">
                <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Patients</span></h5>
                <?php
                $vid = $_GET['viewid'];
                $ret = mysqli_query($con, "select * from tblpatient where ID='$vid'");
                $cnt = 1;
                while ($row = mysqli_fetch_array($ret)) {
                ?>
                  <table style="border:1" class="table table-bordered">
                    <tr style="align : center">
                      <td colspan="4" style="font-size:20px;color:blue">
                        Patient Details</td>
                    </tr>

                    <tr>
                      <th scope>Patient Name</th>
                      <td><?php echo $row['PatientName']; ?></td>
                      <th scope>Patient Email</th>
                      <td><?php echo $row['PatientEmail']; ?></td>
                    </tr>
                    <tr>
                      <th scope>Patient Mobile Number</th>
                      <td><?php echo $row['PatientContno']; ?></td>
                      <th>Patient Address</th>
                      <td><?php echo $row['PatientAdd']; ?></td>
                    </tr>
                    <tr>
                      <th>Patient Gender</th>
                      <td><?php echo $row['PatientGender']; ?></td>
                      <th>Patient Age</th>
                      <td><?php echo $row['PatientAge']; ?></td>
                    </tr>
                    <tr>

                      <th>Patient Medical History(if any)</th>
                      <td><?php echo $row['PatientMedhis']; ?></td>
                      <th>Patient Reg Date</th>
                      <td><?php echo $row['CreationDate']; ?></td>
                    </tr>

                  <?php } ?>
                  </table>
                  <?php

                  $ret = mysqli_query($con, "select * from tblmedicalhistory  where PatientID='$vid'");



                  ?>
                  <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <tr style="align : center">
                      <th colspan="8">Medical History</th>
                    </tr>
                    <tr>
                      <th>#</th>
                      <th>Blood Pressure</th>
                      <th>Weight</th>
                      <th>Blood Sugar</th>
                      <th>Blood Sugar Type</th>
                      <th>Body Temprature</th>
                      <th>Medical Prescription</th>
                      <th>Nurse Note</th>
                      <th>Visit Date</th>
                    </tr>
                    <?php
                    $tpr = array();
                    $visit = array();
                    while ($row = mysqli_fetch_array($ret)) {
                       array_push($tpr,$row['Temperature']);
                       array_push($visit,$row['CreationDate']);
                    ?>
                      <tr>
                        <td><?php echo $cnt; ?></td>
                        <td><?php echo $row['BloodPressure']; ?></td>
                        <td><?php echo $row['Weight']; ?></td>
                        <td><?php echo $row['BloodSugar']; ?></td>
                        <td><?php echo $row['BSType']; ?></td>
                        <td><?php echo $row['Temperature']; ?></td>
                        <td><?php echo $row['MedicalPres']; ?></td>
                        <td><?php echo $row['nurseNote']; ?></td>
                        <td><?php echo $row['CreationDate']; ?></td>
                      </tr>
                    <?php $cnt = $cnt + 1;
                    } ?>
                  </table>

                  <p align="center">
                    <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Add Medical History</button>
                  </p>



                  <?php
                  //code for blood sugar chart
                  //1. get date and
                  $dateQuery = "SELECT `CreationDate`  FROM `tblmedicalhistory` WHERE `PatientID` = '$vid' ORDER BY CreationDate DESC LIMIT 1;SELECT `CreationDate` FROM `tblmedicalhistory` WHERE `PatientID` = '$vid' ORDER BY CreationDate ASC LIMIT 1";
                  $con->multi_query($dateQuery);
                  do {
                      /* store the result set in PHP */
                      if ($result = $con->store_result()) {
                          while ($row = $result->fetch_row()) {
                             print_r($row);
                          }
                      }
                      /* print divider */
                      if ($mysqli->more_results()) {
                          printf("-----------------\n");
                      }
                  } while ($con->next_result());
                  $query = "SELECT DISTINCT BSType FROM tblmedicalhistory";
                  $result = $con->query($query);
                  //$result=mysqli_query($con,"SELECT DISTINCT BSType FROM tblmedicalhistory");
                  $data = array();
                  while ($row = $result->fetch_assoc()) {
                    $i = 1;
                    $type = $row["BSType"];
                    if ($type != "") {
                      $query2 = "SELECT  `BloodSugar`,`CreationDate` FROM `tblmedicalhistory` WHERE BSType='" . $type . "' AND PatientID='$vid'";

                      $result1 = $con->query($query2);
                      $x = 0;
                      while ($row2 = $result1->fetch_assoc()) {
                        $value = $row2["BloodSugar"];
                        $data = array_push_assoc($data, $type, $value, $x);
                        $x++;
                      }
                    }
                    $i++;
                  }
                  function array_push_assoc($array, $key, $value, $x)
                  {
                    $array[$key][$x] = $value;
                    return $array;
                  }
                  ?>
                  <?php
                   
                  ?>
                   
                  <canvas id="line-chart" width="400" height="100"></canvas>
                  <canvas id="tpr-chart" width="400" height="100"></canvas>

                  <?php  ?>
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add Medical History</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <table class="table table-bordered table-hover data-tables">

                            <form method="post" name="submit">

                              <tr>
                                <th>Blood Pressure :</th>
                                <td>
                                  <input name="bp" placeholder="Blood Pressure" class="form-control wd-450" required="true">
                                </td>
                              </tr>
                              <tr>
                                <th>Blood Sugar Type :</th>

                                <td>

                                  <select name="type">
                                    <option value="BBF">BBF</option>
                                    <option value="PBF">PBF</option>
                                    <option value="BL">BL</option>
                                    <option value="PL">PL</option>
                                    <option value="BD">BD</option>
                                    <option value="PD">PD</option>
                                    <option value="Midnight">Midnight</option>


                                  </select>
                                </td>

                              </tr>

                              <tr>
                                <th>Blood Sugar :</th>

                                <td><input name="bs" placeholder="Blood Sugar" class="form-control wd-450" required="true"></td>
                              </tr>
                              <tr>
                                <th>Weight :</th>
                                <td>
                                  <input name="weight" placeholder="Weight" class="form-control wd-450" required="true">
                                </td>
                              </tr>
                              <tr>
                                <th>Body Temprature :</th>
                                <td>
                                  <input name="temp" placeholder="Blood Sugar" class="form-control wd-450" required="true">
                                </td>
                              </tr>

                              <tr>
                                <th>Prescription :</th>
                                <td>
                                  <div class="wrapperDiv">
                                  <div id="medicalResult"></div>
                                  <input type="hidden" name="pres" id="result" value="">
                                  <input type="text" placeholder="Type here..." class ="form-control wd-450" id="autosuggest" autocomplete="off" style="margin-bottom: 5px;">
                                  <div id="pillResult" class="subDiv"></div>
                                  </div>
                                  

                                  <!-- <textarea name="pres" id="result" class="form-control wd-450" required="true"></textarea> -->
                                  <div></div>
                                </td>
                              </tr>

                              <tr>
                                <th>Nurse Note :</th>
                                <td>
                                  <textarea name="nn" id="nn" placeholder="Nurse Note" rows="8" cols="14" class="form-control wd-450" required="true"></textarea>
                              </tr>



                          </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
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
      <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
      <script src="vendor/autosize/autosize.min.js"></script>
      <script src="vendor/selectFx/classie.js"></script>
      <script src="vendor/selectFx/selectFx.js"></script>
      <script src="vendor/select2/select2.min.js"></script>
      <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
      <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
      </script>
      <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
      <!-- start: CLIP-TWO JAVASCRIPTS -->
      <script src="assets/js/main.js"></script>
      <!-- start: JavaScript Event Handlers for this page -->
      <script src="assets/js/form-elements.js"></script>
      <script src="assets/js/doctor.js"></script>
      <script>
        jQuery(document).ready(function() {
          Main.init();
          FormElements.init();
          console.log("hello");
          new Chart(document.getElementById("line-chart"), {
          type: 'line',
          data: {
            labels: [0, 1, 2, 3, 50, 60, 70, 80, 90, 100, 110, 120, 130],
            datasets: [
              <?php

              foreach ($data as $key => $value) {
                $color =  '#' . substr(md5(rand()), 0, 6);
                echo "{";
                echo "label: '$key',";
                echo " data: [";
                echo implode(",", $value);
                echo "],";
                echo "borderColor: '$color',";
                echo "fill: false";
                echo "},";
              }

              ?>

            ]
          },
          options: {
            title: {
              display: true,
              text: 'Blood Sugar'
            }
          }
        });
        new Chart(document.getElementById("tpr-chart"), {
          type: 'line',
          data: {
            labels: [<?php  foreach ($visit as $value) {
              echo "'";
             echo $value;
             echo "',";
            } ?>],
            datasets: [
              {
                label : 'TPR CHART',
                data: [<?php  echo implode(",", $tpr);?>],
                borderColor: '#000000',
                fill: false
              }

            ]
          },
          options: {
            title: {
              display: true,
              text: 'TPR CHART'
            }
          }
        });
        // $(document).ready(function() {
      $("#autosuggest").on('input',function(){
        getAllValues();
      });
    // });
        });
      </script>

      <script>
        
      </script>
      <!-- end: JavaScript Event Handlers for this page -->
      <!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>