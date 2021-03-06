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
                <h1 class="mainTitle">Admin | Appointment Search By Date</h1>
              </div>
              <ol class="breadcrumb">
                <li>
                  <span>View</span>
                </li>
                <li class="active">
                  <span>Appointments</span>
                </li>
              </ol>
            </div>
          </section>
          <div class="container-fluid container-fullw bg-white">
            <div class="row">
              <div class="col-md-12">
                <form role="form" method="post">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputPassword1">
                          From Date:
                        </label>
                        <input type="date" name="fromdate" id="fromdate" value="" required='true'>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputPassword1">
                          To Date::
                        </label>
                        <input type="date" name="todate" id="todate" value="" required='true'>

                      </div>
                    </div>
                    <div class="col-md-4">
                      <button type="submit" name="search" id="submit" class="btn btn-o btn-primary">
                        Submit
                      </button>
                    </div>
                  </div>
                </form>
                <div class="row">
                  <form role="form" method="post">
                    <div class="col-md-4">
                      <button type="submit" name="quicksearch" value="yesterday" id="submit" class="btn btn-o btn-primary">
                        Yesterday
                      </button>
                    </div>
                    <div class="col-md-4">
                      <button type="submit" name="quicksearch" value="today" id="submit" class="btn btn-o btn-primary">
                        Today
                      </button>
                    </div>
                    <div class="col-md-4">
                      <button type="submit" name="quicksearch" value="tomorrow" id="submit" class="btn btn-o btn-primary">
                        Tomorrow
                      </button>
                    </div>
                  </form>
                </div>
                <?php
                if (isset($_POST['search']) || isset($_POST['quicksearch'])) {
                  if (isset($_POST['search'])) {
                    $todate = $_POST['todate'];
                    $fromdate = $_POST['fromdate'];
                    echo '<h4 align="center">Result from ' . $fromdate . ' to  ' . $todate . ' </h4>';
                  } else {
                    $quicksearch = $_POST['quicksearch'];
                    echo '<h4 align="center">Result from ' . $quicksearch . '</h4>';
                  }
                ?>
                  <table class="table table-hover" id="sample-table-1">
                    <thead>
                      <tr>
                        <th class="hidden-xs">Patient Name</th>
                        <th>Doctor</th>
                        <th>Specialization</th>
                        <th>Doctor Fees</th>
                        <th>Appointment Date - Time </th>
                        <th>More Detail</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($_POST['search'])) {
                        $sql = mysqli_query($con, "SELECT apt.id,apt.appointmentTime,tblp.PatientName,doc.doctorName,doc.specilization,doc.docFees,apt.appointmentDate,apt.postingDate FROM appointment as apt INNER JOIN tblpatient AS tblp ON apt.userId = tblp.ID INNER JOIN doctors AS doc ON apt.doctorId = doc.id where date(apt.appointmentDate) between '$fromdate' and '$todate'");
                      } else {
                        $dateFiltered = date("Y-m-d");
                        switch ($quicksearch) {
                          case 'yesterday':
                            $dateFiltered = date('Y-m-d', strtotime("-1 days"));
                            break;
                          case 'tomorrow':
                            $dateFiltered = date('Y-m-d', strtotime("+1 days"));
                            break;

                          default:
                            $dateFiltered = date("Y-m-d");
                            break;
                        }
                        $sql = mysqli_query($con, "SELECT apt.id,apt.appointmentTime,tblp.PatientName,doc.doctorName,doc.specilization,doc.docFees,apt.appointmentDate,apt.postingDate FROM appointment as apt INNER JOIN tblpatient AS tblp ON apt.userId = tblp.ID INNER JOIN doctors AS doc ON apt.doctorId = doc.id where date(apt.appointmentDate) ='$dateFiltered'");
                      }
                      $num = mysqli_num_rows($sql);
                      if ($num > 0) {
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($sql)) {
                      ?>
                          <tr>
                            <td class="hidden-xs"><?php echo $row['PatientName']; ?></td>
                            <td><?php echo $row['doctorName']; ?></td>
                            <td><?php echo $row['specilization']; ?></td>
                            <td><?php echo $row['docFees']; ?></td>
                            <td><?php echo $row['appointmentDate'].' - '.$row['appointmentTime']; ?></td>
                            <td><a href="view-patient.php?viewid=<?php echo $row['id']; ?>"><i class="fa fa-eye"></i></a></td>

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