<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if (isset($_POST["testAssign"])) {
  $testID = $_POST["testID"];
  $admissionID = $_POST["admissionID"];
  $date = date("Y-m-d");
  foreach ($testID as $value) {
    $sql = "INSERT INTO `labTestRecord`( `admissionID`, `performedTestID`, `labTestStatus`, `assignedDate`) VALUES ('$admissionID','$value','pending','$date')";
    //print_r($sql);
    $result = $con->query($sql);
  }
}
if (isset($_POST['submit'])) {

  $vid = $_GET['viewid'];
  $admissionID = $_POST['admissionID'];
  $bp = $_POST['bp'];
  $bs = $_POST['bs'];
  $weight = $_POST['weight'];
  $type = $_POST['type'];
  $temp = $_POST['temp'];
  $pres = $_POST['medicinePrescription'];
  $doctorObservation = $_POST['doctorObservation'];
  $doctorDiagnosis = $_POST['doctorDiagnosis'];
  $nn = $_POST['nn'];
  $docID = $_SESSION['id'];
  $query .= mysqli_query($con, "insert tblmedicalhistory(PatientID,admissionID,BloodPressure,BSType,BloodSugar,Weight,Temperature,MedicalPres,nurseNote,doctorObservation,doctorDiagnosis,doctorID)value('$vid','$admissionID','$bp','$type','$bs','$weight','$temp','$pres','$nn','$doctorObservation','$doctorDiagnosis','$docID')");
  if ($query) {
    echo '<script>alert("Medical history has been added.")</script>';
    echo "<script>window.location.href ='view-patient.php?viewid=" . $vid . "'</script>";
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
  <link rel="stylesheet" href="assets/css/styleext.css?ver=<?php echo rand(); ?>">
  <link rel="stylesheet" href="assets/css/plugins.css">
  <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
</head>

<body>
  <script type="text/javascript">
    function getAllValues(em) {
      console.log("TYPE... ",em.val())
      $("#loaderIcon").show();
      if (em.val() == "") {
        $(".pillResult").html(' ');
      } else {
        jQuery.ajax({
          url: "getAllMedicines.php",
          data: 'med=' + em.val(),
          type: "POST",
          success: function(data) {
            $('.pillResult').html(data);
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
                  <!-- new table structure -->
                  <?php
                  $admissionQuery = "SELECT * FROM `patientAdmission` where uid = '$vid'";
                  $result = $con->query($admissionQuery);


                  ?>
                  <table class="table table-bordered dt-responsive nowrap">
                    <thead>
                      <th>#</th>
                      <th>Admission Date</th>
                      <th>Admission Type</th>
                      <th>Diagnosis</th>
                      <th>Discharge Date</th>
                      <th>Assign Test</th>
                      <th>Reports</th>
                      <th>Add History</th>
                    </thead>
                    <tbody id="viewReport">
                      <?php
                      $sr = 1;
                      while ($row = mysqli_fetch_array($result)) {
                      ?>
                        <tr>
                          <td><?php echo $row['unqId']; ?></td>
                          <td id="date"><?php echo $row['dateofadmission']; ?></td>
                          <td><?php echo $row['admissionType']; ?></td>
                          <td><?php //echo $row['dateofadmission'];
                              ?></td>
                          <td><?php echo $row['dateofdischarge']; ?></td>
                          <td><button type="button" data-admissionID="<?php echo $row['unqId']; ?>" class="btn btn-primary assignTest" data-toggle="modal" data-target="#testModal">Assign Test</button></td>
                          <td><button type="button" data-admission="<?php echo $row['dateofadmission']; ?>" data-discharge="<?php echo $row['dateofdischarge']; ?>" data-admissionID="<?php echo $row['unqId']; ?>" class="btn btn-primary reportInfo">View</button></td>
                          <td>
                            <?php
                            // if ($row['dateofdischarge'] == "0000-00-00") {
                            ?>
                              <button data-admissionID="<?php echo $row['unqId']; ?>" class="addMedHistory btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Add Medical History</button>
                            <?php
                            // }

                            ?>
                          </td>
                        </tr>
                      <?php
                        $sr++;
                      }
                      ?>
                    </tbody>
                    <h5 class="over-title margin-bottom-15">Files <span class="text-bold">Attached</span></h5>
                  </table>
                  <?php

                  $queryfetchFiles = "SELECT * FROM `patient_medical_files` WHERE patient_id='" . $vid . "'";
                  $res = $con->query($queryfetchFiles);


                  ?>
                  <table class="table table-bordered dt-responsive nowrap">
                    <thead>
                      <tr>
                        <th>
                          Sr No.
                        </th>
                        <th>
                          File Name
                        </th>
                        <th>
                          Uploaded Date
                        </th>
                        <th>
                          View
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 0;
                      while ($row1 = mysqli_fetch_array($res)) {
                        $i++;
                      ?>
                        <tr>
                          <td>
                            <?php echo $i; ?>
                          </td>
                          <td>
                            <?php echo $row1['file_title'] ?>
                          </td>
                          <td>
                            <?php echo $row1['uploaded_at'] ?>
                          </td>
                          <td>
                            <a href = "https://adpigo.com/hospital/uploads/<?php echo $row1['file_url'] ?>">View</a>
                           
                          </td>
                        </tr>
                      <?php
                      }

                      ?>
                    </tbody>
                  </table>
                  <div id="test"></div>
                  <div>
                    <canvas id="line-chart" width="400" height="100"></canvas>
                    <canvas id="tpr-chart" width="400" height="100"></canvas>
                  </div>
                  <!-- Modal -->
                  <div id="testModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Assign Test Here</h4>
                        </div>
                        <div class="modal-body">
                          <form method="POST" action="">
                            <input name="admissionID" id="adID" type="hidden" class="form-control wd-450">
                            <?php
                            $ret = mysqli_query($con, "select * from laboratoryTestList");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($ret)) {
                            ?>

                              <input type="checkbox" id="<?php echo $row['labFormID'] ?>" name="testID[]" value="<?php echo $row['labFormID'] ?>">
                              <label for="<?php echo $row['labFormID'] ?>"> <?php echo $row['labTestName'] ?></label><br>

                            <?php
                            }

                            ?>
                            <input type="submit" name="testAssign" value="Assign Test">
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>

                    </div>
                  </div>
                  <div class="modal fade" id="myModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <input type="hidden" id="admissionIDHis" name="admissionID" value="">
                              <input type="hidden" id="medicinePrescription" name="medicinePrescription" value="">
                              <input type="hidden" id="medicinePrescriptionType" name="medicinePrescriptionType" value="general_prescription">

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
                                    <div class="row">
                                      <div class="col-md-6">
                                        <button type="button" id="general_prescription" class="btn btn-primary">General Prescription</button>
                                      </div>
                                      <div class="col-md-6">
                                        <button type="button" id="hourly_prescription" class="btn btn-primary">Hourly Prescription</button>
                                      </div>
                                    </div>
                                    <!-- <div id="medicalResult"></div>
                                    <input type="hidden" name="pres" id="result" value=""> -->
                                    <div class="hourly_prescription" style="display: none;">
                                      <div class="row">
                                        <div class="col-md-3">
                                          Medicine
                                          <input type="text" placeholder="Type here..." class="form-control medicineSugg autosuggest" autocomplete="off" style="margin-bottom: 5px;">
                                          <div class="subDiv pillResult"></div>
                                        </div>
                                        <div class="col-md-3">
                                          Start From
                                          <input type="text" id="start_from" placeholder="10:00 AM" class="form-control" autocomplete="off" style="margin-bottom: 5px;">

                                        </div>
                                        <div class="col-md-3">
                                          Dosage
                                          <input type="text" id="dosage" placeholder="400 mg" class="form-control " autocomplete="off" style="margin-bottom: 5px;">

                                        </div>
                                        <div class="col-md-3">
                                          Interval (In Hour)
                                          <input type="text" id="interval_hourly" placeholder="1 Hour" class="form-control medicineSugg" autocomplete="off" style="margin-bottom: 5px;width: 60px;">
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12 text-right">
                                          <button type="button" class="btn btn-primary addMedicineBtn">+ Medicine</button>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="general_prescription" style="display: none;">
                                      <div class="row">
                                        <div class="col-md-3">
                                          Medicine
                                          <input type="text" placeholder="Type here..." class="form-control medicineSugg autosuggest " autocomplete="off" style="margin-bottom: 5px;">
                                          <div  class="subDiv pillResult"></div>
                                        </div>
                                        <div class="col-md-3">
                                          Frequency
                                          <input type="text" id="frequency" placeholder="1-0-1" class="form-control" autocomplete="off" style="margin-bottom: 5px;">

                                        </div>
                                        <div class="col-md-3">
                                          Dosage
                                          <input type="text" id="dosage" placeholder="400 mg" class="form-control " autocomplete="off" style="margin-bottom: 5px;">

                                        </div>
                                        <div class="col-md-3">
                                          Period
                                          <input type="text" id="period" placeholder="5 days" class="form-control medicineSugg" autocomplete="off" style="margin-bottom: 5px;width: 60px;">
                                          <input type="checkbox" id="meal_check" autocomplete="off"> Before Meal
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12 text-right">
                                          <button type="button" class="btn btn-primary addMedicineBtn">+ Medicine</button>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row" id="prescribedMedicineList" style="display: none; margin-top: 10px;">
                                      <div class="col-md-12">
                                        <table class="table table-bordered table-hover data-tables">
                                          <thead>
                                            <tr>
                                              <th>Medicine</th>
                                              <th>Frequency</th>
                                              <th>Dosage</th>
                                              <th>Period</th>
                                            </tr>
                                          </thead>
                                          <tbody class="medicineList">

                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                    <div class="row" id="prescribedMedicineListHourly" style="display: none; margin-top: 10px;">
                                      <div class="col-md-12">
                                        <table class="table table-bordered table-hover data-tables">
                                          <thead>
                                            <tr>
                                              <th>Medicine</th>
                                              <th>Start From</th>
                                              <th>Dosage</th>
                                              <th>Interval</th>
                                            </tr>
                                          </thead>
                                          <tbody class="medicineList">

                                          </tbody>
                                        </table>
                                      </div>
                                    </div>


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
                              <tr>
                                <th>Doctor's Observation :</th>
                                <td>
                                  <textarea name="doctorObservation" id="nn" placeholder="Nurse Note" rows="8" cols="14" class="form-control wd-450" required="true"></textarea>
                              </tr>
                              <tr>
                                <th>Doctor's Diagnosis :</th>
                                <td>
                                  <textarea name="doctorDiagnosis" id="nn" placeholder="Nurse Note" rows="8" cols="14" class="form-control wd-450" required="true"></textarea>
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
          $("#viewReport .assignTest").click(function() {
            var admissionid = $(this).data("admissionid");
            $("#adID").val(admissionid);

          });
          $(".addMedHistory").click(function() {
            var id = $(this).data("admissionid");
            $("#admissionIDHis").val(id);
          });
          //new js for charts:
          $("#viewReport button").click(function() {
            var admissionid = $(this).data("admissionid");
            var admission = $(this).data("admission");
            var discharge = $(this).data("discharge");
            //var admissionid = $(this).data("admissionid");
            console.log(admission);
            jQuery.ajax({
              url: "fetchReports.php",
              data: {
                admissionid: admissionid,
                admission: admission,
                discharge: discharge,
                vid: <?php echo $vid; ?>
              },
              method: "POST",
              dataType: "JSON",
              success: function(data) {
                //	console.log(data.bsDates);
                tpr = data.tpr;
                tprDate = data.tprDate;
                bsDates = data.bsDates;
                sugarReads = data.sugarReads;
                //	console.log(bsDates+"BS DATES");
                console.log(sugarReads);
                var obj = [];
                $.each(sugarReads, function(key, value) {
                  var color = "#" + Math.floor(Math.random() * 16777215).toString(16);
                  console.log(key + "key");
                  console.log(value + "value");
                  var jj = {
                    'label': key,
                    'data': value,
                    'borderColor': color,
                    'fill': false,

                  }
                  obj.push(jj);
                });

                console.log(obj);
                $("#test").html(data.html);
                new Chart(document.getElementById("line-chart"), {
                  type: 'line',
                  data: {
                    labels: bsDates,
                    datasets: obj,
                  },
                  options: {
                    title: {
                      display: true,
                      text: 'Blood Sugar'
                    }
                  },
                  scales: {
                    xAxes: [{
                      type: 'time',
                      time: {
                        displayFormats: {
                          day: 'yy-mm-dd',
                        }
                      }
                    }]
                  }
                });
                new Chart(document.getElementById("tpr-chart"), {
                  type: 'line',
                  data: {
                    labels: tprDate,
                    datasets: [{
                        label: 'TPR CHART',
                        data: tpr,
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
              },
              error: function() {}
            });
          });

          // $(document).on("click", ".medicineSugg", function () {
          //   $(this)
          // });
          // $(document).ready(function() {
          $(".autosuggest").on('input', function() {
           
            getAllValues($(this));
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