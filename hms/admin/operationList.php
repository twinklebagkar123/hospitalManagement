<?php
include('include/header_structured.php');
$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
?>
        <div class="wrap-content container" id="container">
          <!-- start: PAGE TITLE -->
          <section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Admin  | Operation List</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>View</span>
									</li>
									<li class="active">
										<span>Operations</span>
									</li>
								</ol>
							</div>
						</section>
        <div class="container-fluid container-fullw bg-white">
          <div class="row">
            <div class="col-md-12">
              <table class="display" id="oc">
                <thead>
                  <tr>
                    <th class="center">#</th>
                    <th>Patient Name</th>
                    <th>Date</th>
                    <th>Operation</th>
                    <th>Time </th>
                    <th> Note </th>
                    <th> Doctor </th>



                  </tr>
                </thead>
                <tbody id="patientList">

                  <?php

                  $sql = mysqli_query($con, "SELECT tblpatient.PatientName, patientoperation.opDate,patientoperation.opTitle,patientoperation.opTime,patientoperation.pRNote, doctors.doctorName FROM patientoperation INNER JOIN doctors ON patientoperation.docID = doctors.id INNER JOIN tblpatient ON tblpatient.ID =patientoperation.patientID where patientoperation.opDate= '$today'");

                  $cnt = 1;
                  while ($row = mysqli_fetch_array($sql)) {
                  ?>
                    <tr>
                      <td class="center"><?php echo $cnt; ?>.</td>
                      <td class="hidden-xs"><?php echo $row['PatientName']; ?></td>
                      <td><?php echo $row['opDate']; ?></td>
                      <td><?php echo $row['opTitle']; ?></td>
                      <td><?php echo $row['opTime']; ?></td>
                      <td><?php echo $row['pRNote']; ?>
                      <td><?php echo $row['doctorName']; ?>
                      </td>





                    </tr>
                  <?php
                    $cnt = $cnt + 1;
                  } ?>
                </tbody>


            </div>
          </div>
        </div>
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
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

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
  <script>
    $(document).ready(function() {
      $('#oc').DataTable();
    });
  </script>
  <!-- end: JavaScript Event Handlers for this page -->
  <!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>