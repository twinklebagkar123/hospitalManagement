<?php
include('include/header_structured.php');
$resultArray = [];
$admissionID = 9;
$query = "SELECT tblpatient.PatientName , tblpatient.PatientGender, tblpatient.Patientdob , patientAdmission.dateofadmission, patientAdmission.dateofdischarge FROM `patientAdmission` INNER JOIN tblpatient ON patientAdmission.uid = tblpatient.ID WHERE patientAdmission.unqId = '$admissionID'";
$result = $con->query($query);
while ($row = mysqli_fetch_array($result)) {
   $resultArray["PatientName"]  = $row['PatientName'];
   $resultArray["PatientGender"]  = $row['PatientGender'];
   $resultArray["Patientdob"]  = $row['Patientdob'];
   $resultArray["dateofadmission"]  = $row['dateofadmission'];
}
var_dump($resultArray);
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
            <h5>Name: </h5>
          </div>
          
        </div>
        <div class="row">
        <div class="col-sm-4">
            <h5>DOB: </h5>
          </div>
          <div class="col-sm-4">
            <h5>SEX: </h5>
          </div>
          
        </div>
        <div class="row">
        <div class="col-sm-4">
            <h5>DOA: </h5>
          </div>
          <div class="col-sm-4">
            <h5>DOD: </h5>
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

                    </div>
              </div>
          </div>
          <div class="col-sm-12">
              <div class="">
                    <h5>
                      INVESTIGATIONS
                    </h5>
                    <div class="content">

                    </div>
              </div>
          </div>
          <div class="col-sm-12">
              <div class="">
                    <h5>
                      TREATMENT
                    </h5>
                    <div class="content">

                    </div>
              </div>
          </div>
          <div class="col-sm-12">
              <div class="">
                    <h5>
                      ADVICE ON DISCHARGE
                    </h5>
                    <div class="content">

                    </div>
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
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- start: CLIP-TWO JAVASCRIPTS -->
<script src="assets/js/main.js"></script>
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