<?php
include('include/header_structured.php');
$resultArray = [];
$admissionID = $_GET['admissionId'];
$query = "SELECT tblpatient.PatientName , tblpatient.PatientGender, tblpatient.Patientdob ,patientAdmission.chiefComplaint, patientAdmission.dateofadmission, patientAdmission.dateofdischarge FROM `patientAdmission` INNER JOIN tblpatient ON patientAdmission.uid = tblpatient.ID WHERE patientAdmission.unqId = '$admissionID'";
$result = $con->query($query);
while ($row = mysqli_fetch_array($result)) {
  $resultArray["PatientName"]  = $row['PatientName'];
  $resultArray["PatientGender"]  = $row['PatientGender'];
  $resultArray["Patientdob"]  = $row['Patientdob'];
  $resultArray["dateofadmission"]  = $row['dateofadmission'];
  $resultArray["dateofdischarge"]  = $row['dateofdischarge'];
  $resultArray["chiefComplaint"]  = $row['chiefComplaint'];
}
//var_dump($resultArray);
$dischargesummmaryandadvice = "SELECT * FROM `patdischargesummary` WHERE admissionID = '$admissionID'";
$summaryandadvice = $con->query($dischargesummmaryandadvice);
while ($row3 = mysqli_fetch_array($summaryandadvice)) {
  $summary = $row3['summary'];
  $advice = $row3['dischargeadvice'];
}
function fetchTestName($testID)
{
    include('include/config.php');
    $query = "SELECT * FROM `laboratoryTestList` where labFormID= '$testID'";
    $result = $con->query($query);
    while ($row = mysqli_fetch_array($result)) {
        $answer = $row['labTestName'];
    }
    return $answer;
}
?>
<div class="wrap-content container" id="container">
  <!-- start: PAGE TITLE -->
  <div class="container-fluid container-fullw bg-white">
    <div class="row">
      <div class="col-sm-12">
        <h4 class="text-right">DATE : <?php echo date('Y-m-d') ?></h4>
        <h2 class="text-center">DISCHARGE SUMMARY</h2>
        <div class="row">
          <div class="col-sm-12">
            <h5>Name: <span><?php echo $resultArray["PatientName"]; ?></span> </h5>
          </div>

        </div>
        <div class="row">
          <div class="col-sm-4">
            <h5>DOB: <span><?php echo $resultArray["Patientdob"]; ?></span></h5>
          </div>
          <div class="col-sm-4">
            <h5>SEX: <span><?php echo $resultArray["PatientGender"]; ?></span></h5>
          </div>
          <div class="col-sm-4">
            <h5>DOA: <span><?php echo $resultArray["dateofadmission"]; ?></span></h5>
          </div>
        </div>
        <div class="row">

          <div class="col-sm-4">
            <h5>DOD: <span><?php echo $resultArray["dateofdischarge"]; ?></span></h5>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <h5>Diagnosis: </h5>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-12">
            <div class="">
              <h5>
                HISTORY / CHIEF COMPLAINTS
              </h5>
              <div class="content">
                <?php echo $resultArray["chiefComplaint"]; ?>
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="">
              <h5>
                ON EXAMINATION VITALS
              </h5>
              <div class="content">

              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="">
              <h5>
                SYSTEMIC EXAMINATION
              </h5>
              <div class="content">
                  <?php echo $summary; ?>
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="">
              <h5>
                INVESTIGATIONS
              </h5>
              <div class="content">
                <?php

                $testQuery = "SELECT * FROM `labTestRecord` WHERE admissionID= '" . $admissionID . "'";
                $testList = $con->query($testQuery);
                if ($testList) {
                ?>
                  <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                      <tr>
                        <td>Sr No.</td>
                        <td>Assigned Date</td>
                        <td>Test Name</td>
                        <td>Test
                          Status</td>
                        <td>Results</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $srNum = 0;
                      while ($row2 = mysqli_fetch_array($testList)) {
                        $srNum++;
                        $testname = fetchTestName($row2['performedTestID']);
                      ?>
                        <tr>
                          <td> <?php echo $srNum; ?> </td>
                          <td><?php echo $row2['assignedDate']; ?> </td>
                          <td> <?php echo $testname; ?></td>
                          <td><?php echo $row2['labTestStatus']  ?> </td>
                          <?php
                          if ($row2['labTestStatus'] == 'complete') {
                          ?>
                            <td><a href="testResultReport.php?recID=<?php echo $row2['recordID']; ?>"> View Results</a></td>
                        <tr>
                        <?php
                          } else {
                        ?><td></td>
                        <tr><?php
                          }
                        }
                      }
                            ?>
                    </tbody>
                  </table>


              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="">
              <h5>
                TREATMENT
              </h5>
              <div class="content">
                      <?php
                      $medicalPres = "SELECT MedicalPres FROM `tblmedicalhistory` WHERE admissionID = '$admissionID'";
                      $testList = $con->query($medicalPres);
                      while ($row2 = mysqli_fetch_array($testList)) {
                       $MedicalPres = json_decode($row2['MedicalPres']);
                       foreach($MedicalPres as $medicalDetail){
                        echo $medicalDetail->medicineName; echo ",";
                       }
                      }
                      
                      ?>
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="">
              <h5>
                ADVICE ON DISCHARGE
              </h5>
              <div class="content">
              <?php echo $advice; ?>
              </div>
            </div>
          </div>
          <div class="col-sm-12">
                      <form method="post">
                        <button type="submit" id="printSummary" name="printSummary">PRINT SUMMARY</button>
                      </form>
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
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- start: CLIP-TWO JAVASCRIPTS -->
<script src="assets/js/main.js"></script>
<!-- start: JavaScript Event Handlers for this page -->
<script src="assets/js/form-elements.js"></script>
<?php
if(isset($_POST['printSummary'])){?>
  <script>
  window.onload = function() {
    document.getElementById("printSummary").setAttribute("style", "display: none;");
    //console.log("DOcument loaded");
    window.print();
    
  }
</script>
<?php
}

?>
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