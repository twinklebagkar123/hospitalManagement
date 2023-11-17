<?php
include('include/header_structured.php');
$date =  $_POST['opDate'];
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
                <h1 class="mainTitle">Operation List </h1>

              </div>
            </div>
        </div>


        <div class="row">
          <div class="col-sm-8">
            <h1 class="mainTitle">Operation List |List By date</h1>
          </div>
          <ol class="breadcrumb">
            <li>
              <span>Operation List</span>
            </li>
            <li class="active">
              <span>List By date</span>
            </li>
          </ol>
        </div>
        </section>
        <div class="container-fluid container-fullw bg-white">
          <div class="row">
            <div class="col-md-12">
              <form role="form" method="post" name="search">

                <div class="form-group">
                  <label for="doctorname">
                    Search by Date.
                  </label>
                  <input type="date" name="opDate" id="opDate" value="" required='true'>
                </div>

                <button type="submit" name="search" id="submit" class="btn btn-o btn-primary">
                  Search
                </button>
              </form>
              <?php
              if (isset($_POST['search'])) {

                $sdata = $_POST['opDate'];
              ?>
                <h4 align="center">Result against "<?php echo $sdata; ?>" keyword </h4>
                <table class="table table-hover" id="sample-table-1">
                  <thead>
                    <tr>
                      <th class="center">#</th>
                      <th>Patient Name</th>
                      <th>Operation Date</th>
                      <th>Operation Title</th>
                      <th>Operation Time</th>
                      <th>Note</th>
                      <th> Doctor Name </th>



                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $sql = mysqli_query($con, "SELECT tblpatient.PatientName, patientoperation.opDate,patientoperation.opTitle,patientoperation.opTime,patientoperation.pRNote, doctors.doctorName FROM patientoperation INNER JOIN doctors ON patientoperation.docID = doctors.id INNER JOIN tblpatient ON tblpatient.ID =patientoperation.patientID where patientoperation.opDate= '$sdata'");
                    $num = mysqli_num_rows($sql);
                    if ($num > 0) {
                      $cnt = 1;
                      while ($row = mysqli_fetch_array($sql)) {
                    ?>
                        <tr>
                          <td class="center"><?php echo $cnt; ?>.</td>
                          <td class="hidden-xs"><?php echo $row['PatientName']; ?></td>
                          <td><?php echo $row['opDate']; ?></td>
                          <td><?php echo $row['opTitle']; ?></td>
                          <td><?php echo $row['opTime']; ?></td>
                          <td><?php echo $row['pRNote']; ?></td>
                          <td><?php echo $row['doctorName']; ?>
                          </td>

                        </tr>
                      <?php
                        $cnt = $cnt + 1;
                      }
                    } else { ?>
                      <tr>
                        <td colspan="8"> No record found against this search</td>

                      </tr>

                  <?php }
                  } ?>
                  </tbody>
                </table>
            </div>
          </div>
        </div>
        </span>
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
      $("#Submit").on("click", function() {
        // var name = $(this).data("name");
        // var id = $(this).data("pid");
        // $("#titleModal").html("Book " + name + "'s Appointment");
        // $("#idInput").val(id);

        console.log("heyyyyy");
      });


      $("#opDate").on("change", function() {
        console.log("heyyy");
      });
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