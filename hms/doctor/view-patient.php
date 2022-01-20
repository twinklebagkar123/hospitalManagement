<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if (isset($_POST['submit'])) {

  $vid = $_GET['viewid'];
  $admissionID = $_GET['admissionID'];
  $bp = $_POST['bp'];
  $bs = $_POST['bs'];
  $weight = $_POST['weight'];
  $type = $_POST['type'];
  $temp = $_POST['temp'];
  $pres = $_POST['pres'];
  $nn = $_POST['nn'];

  $query .= mysqli_query($con, "insert tblmedicalhistory(PatientID,admissionID,BloodPressure,BSType,BloodSugar,Weight,Temperature,MedicalPres,nurseNote)value('$vid','$admissionID','$bp','$type','$bs','$weight','$temp','$pres','$nn')");
  if ($query) {
    echo '<script>alert("Medical history has been added.")</script>';
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
  <link rel="stylesheet" href="assets/css/styleext.css?ver=<?php echo rand(); ?>">
  <link rel="stylesheet" href="assets/css/plugins.css">
  <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
</head>

<body>
  <script type="text/javascript">
    function getAllValues() {
      $("#loaderIcon").show();
      if ($('#autosuggest').val() == "") {
        $("#pillResult").html(' ');
      } else {
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
                          <td><?php echo $sr; ?></td>
                          <td id="date"><?php echo $row['dateofadmission']; ?></td>
                          <td><?php echo $row['admissionType']; ?></td>
                          <td><?php //echo $row['dateofadmission'];
                              ?></td>
                          <td><?php echo $row['dateofdischarge']; ?></td>
                          <td><button type="button" data-admissionID="<?php echo $row['unqId']; ?>" class="btn btn-primary assignTest" data-toggle="modal" data-target="#myModal">Assign Test</button></td>
                          <td><button type="button" data-admission="<?php echo $row['dateofadmission']; ?>" data-discharge="<?php echo $row['dateofdischarge']; ?>" data-admissionID="<?php echo $row['unqId']; ?>" class="btn btn-primary">View</button></td>
                          <td>
                            <?php
                            if ($row['dateofdischarge']=="0000-00-00") {
                            ?>
                              <button data-admissionID="<?php echo $row['unqId']; ?>" class="addMedHistory btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Add Medical History</button>
                            <?php
                            }

                            ?>
                          </td>
                        </tr>
                      <?php
                        $sr++;
                      }
                      ?>
                    </tbody>
                  </table>
                  <div id="test"></div>
                  <div>
                    <canvas id="line-chart" width="400" height="100"></canvas>
                    <canvas id="tpr-chart" width="400" height="100"></canvas>
                  </div>
                  <!-- old table structure -->





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
                              <input type="hidden" id="admissionIDHis" name="admissionID" value="">
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
                                    <input type="text" placeholder="Type here..." class="form-control wd-450" id="autosuggest" autocomplete="off" style="margin-bottom: 5px;">
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
          $(".addMedHistory").click(function(){
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


          // $(document).ready(function() {
          $("#autosuggest").on('input', function() {
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