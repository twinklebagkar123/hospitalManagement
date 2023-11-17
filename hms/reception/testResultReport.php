<?php
include('include/header_structured.php');

function fetchPatientName($admissionID)
{
    include('include/config.php');
    $query = "SELECT tblpatient.PatientName FROM `patientAdmission` as tab1 INNER JOIN tblpatient ON tab1.uid = tblpatient.ID WHERE tab1.unqId = '$admissionID'";
    $result =  $con->query($query);
    while ($row = mysqli_fetch_array($result)) {
        $answer = $row['PatientName'];
    }
    return $answer;
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
<style>
    .resultSection header {
        min-height: 83px;
        border-bottom: 1px solid black;

    }

    .doc-details {
        margin-top: 5px;
        margin-left: 15px;

    }

    .clinic-details {
        margin-top: 5px;
        margin-left: 15px;
    }

    .doc-name {
        font-weight: bold;
        margin-bottom: 5px;

    }

    .doc-meta {
        font-size: 10px;
    }

    .datetime {
        font-size: 12px;
        margin-top: 5px;

    }

    .row.title {
        font-weight: bold;
        padding-left: 10px;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .prescription {
        min-height: 380px;
        margin-bottom: 10px;
    }

    .border {
        border: 1px solid black;
    }

    .reportHeader {
        border: 1px solid black;
    }

    .instruction {
        font-size: 12px;
    }
</style>

                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Laboratory | Test Result</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Admin</span>
                                </li>
                                <li class="active">
                                    <span>View Tests</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <section class="resultSection border">
                        <div class="container border">
                            <header class="row">
                                <div class="col-md-10">
                                    <div class="doc-details">
                                        <p class="doc-name">St. Anthony's Hospital & Research Center</p>
                                        <p class="doc-meta">General Hospital</p>
                                        <p class="doc-meta">Rgn: 2341</p>
                                    </div>

                                    <div class="clinic-details">
                                        <p class="doc-meta">Doctor Name: </p>
                                        <p class="doc-meta">Anjana Gupta</p>
                                    </div>

                                </div>
                                <div class="col-md-2 datetime">
                                    <p>Date: <?php echo date("Y/m/d"); ?></p>
                                    <p>Time: <?php echo date("h:i:sa"); ?></p>
                                </div>
                            </header>
                        </div>
                        <div class="container bg-white ">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php
                                    $recID = $_GET['recID'];
                                    $queryRec = "SELECT * FROM `labTestRecord` where recordID='$recID'";
                                    $result = $con->query($queryRec);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <table border="1" class="table table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Patient Name </th>
                                                    <th>Test Name</th>
                                                    <th>Test Assigned Date</th>
                                                    <th>Test Performed Date</th>
                                                    <th>Report Status</th>
                                                    <th>Report Remarks</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo fetchPatientName($row['admissionID']); ?></td>
                                                    <td><?php echo fetchTestName($row['performedTestID']); ?></td>
                                                    <td><?php echo $row['assignedDate']; ?></td>
                                                    <td><?php echo $row['performedDate']; ?></td>
                                                    <td><?php echo $row['labTestStatus']; ?></td>
                                                    <td><?php echo $row['remark']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <h5>Lab Test Findings: </h5>
                                        <table border="1" class="table table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Field Name </th>
                                                    <th>Finding</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                <?php
                                                $recResult =  json_decode($row['testResult']);
                                                foreach ($recResult as $key => $value) {
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $key; ?>
                                                        </td>
                                                        <td><?php echo $value; ?></td>
                                                    </tr>

                                                <?php
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h5>Report Summary:</h5>
                                                    <p>
                                                        <?php echo $row['findings']; ?>

                                                    </p>
                                                </div>
                                                <div class="col-sm-6" align="right">
                                                    <h5>
                                                        Laboratory/Test Incharge:
                                                    </h5>
                                                    <p>
                                                        <?php echo $row['performedBy']; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </section>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <!-- start: CLIP-TWO JAVASCRIPTS -->
    <script src="assets/js/main.js"></script>
    <!-- start: JavaScript Event Handlers for this page -->
    <script src="assets/js/form-elements.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"></script>
</body>

</html>