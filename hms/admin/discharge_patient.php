<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$admissionId = $_GET['admissionId'];
$paymentStatus = "pending";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin | Discharge Patients</title>
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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>
<style>
    
    * {
        padding: 0;
        margin: 0 auto;
        box-sizing: border-box;
    }



    /* ==== GRID SYSTEM ==== */
    .container {
        width: 90%;
        margin-left: auto;
        margin-right: auto;
    }

    .row {
        position: relative;
        width: 100%;
    }

    .row [class^="col"] {
        float: left;
    }

    .row::after {
        content: "";
        clear: both;
        display: block;
    }

    .col-1 {
        width: 8.33%;
    }

    .col-2 {
        width: 16.66%;
    }

    .col-3 {
        width: 25%;
    }

    .col-4 {
        width: 33.33%;
    }

    .col-5 {
        width: 41.66%;
    }

    .col-6 {
        width: 50%;
    }

    .col-7 {
        width: 58.33%;
    }

    .col-8 {
        width: 66.66%;
    }

    .col-9 {
        width: 75%;
    }

    .col-10 {
        width: 83.33%;
    }

    .col-11 {
        width: 91.66%;
    }

    .col-12 {
        width: 100%;
    }

    /* Custom */

    .container {
        /* min-height: 84px; */
        /* border: 1px solid black; */
        /* max-width: 420px; */
        margin: 0 auto;
        margin-top: 40px;
    }

    header {
        min-height: 83px;
        /* border-bottom: 1px solid black; */

    }
    .reportHeader header {
        min-height: 83px;
        /* border-bottom: 1px solid black; */

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
    table {
        text-align: left;
        width: 90%;
        min-height: 25px;
    }

    table th {
        font-size: 13px;
        font-weight: bold;
    }

    table tr {
        margin-top: 20px;
    }

    table td {
        font-size: 12px;

    }
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
</style>

<body>
    <div id="app">
        <?php include('include/sidebar.php'); ?>
        <div class="app-content">
            <?php include('include/header.php'); ?>
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-8">
                                <h1 class="mainTitle">Admin | Discharge Patients</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Admin</span>
                                </li>
                                <li class="active">
                                    <span>Discharge Patients</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <section class="">
                        <div class="container border print_header">
                            <header class="row">
                                <div class="col-10">
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
                                <div class="col-2 datetime">
                                    <p>Date: <?php echo date("Y/m/d"); ?></p>
                                    <p>Time: <?php echo date("h:i a");?></p>
                                </div>
                            </header>
                        </div>
                        <div class="container bg-white">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="over-title margin-bottom-15"> <span class="text-bold">Patient </span>Information</h5>

                                    <table class="table table-hover" id="sample-table-1">
                                        <!-- <thead>
                                            
                                        </thead> -->
                                        <tbody id="delete">
                                        <tr>
                                                <th>Patient Id </th>
                                                <th>Patient Name</th>
                                                <th>Phone Number</th>
                                                <th>Email Address</th>
                                                <th>Adhar Card</th>
                                                <th>Gender</th>
                                                <th>Address</th>
                                            </tr>
                                            <?php
                                            $billPayable = 0;
                                            $advancePaid = 0;
                                            $sql = mysqli_query($con, "SELECT tblpatient.ID, tblpatient.PatientName,tblpatient.PatientContno,tblpatient.PatientEmail,tblpatient.adharCardNo,tblpatient.PatientGender,tblpatient.PatientAdd FROM `patientAdmission` INNER JOIN tblpatient ON tblpatient.ID = patientAdmission.uid WHERE patientAdmission.unqId = '".$admissionId."'");

                                            while ($row = mysqli_fetch_array($sql)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['ID']; ?></td>
                                                    <td><?php echo $row['PatientName']; ?></td>
                                                    <td><?php echo $row['PatientContno']; ?></td>
                                                    <td><?php echo $row['PatientEmail']; ?></td>
                                                    <td><?php echo $row['adharCardNo']; ?></td>
                                                    <td><?php echo $row['PatientGender']; ?></td>
                                                    <td><?php echo $row['PatientAdd']; ?></td>
                                                </tr>

                                            <?php } ?>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="over-title margin-bottom-15"> <span class="text-bold">Admission</span> Information</h5>

                                    <table class="table table-hover" id="sample-table-1">
                                        <!-- <thead>
                                            
                                        </thead> -->
                                        <tbody id="delete">
                                        <tr>
                                                <th>Admission Type</th>
                                                <th>Doctor Name</th>
                                                <th>Ward Number</th>
                                                <th>Admitted Date</th>
                                                <th>Advance Paid</th>
                                                <th>Admission (Cost Per Day)</th>
                                            </tr>
                                            <?php
                                            $sql = mysqli_query($con, "SELECT patientAdmission.status,patientAdmission.admissionType, doctors.doctorName,patientAdmission.wardNo,patientAdmission.dateofadmission,patientAdmission.advance_paid,patientAdmission.cpd FROM `patientAdmission` INNER JOIN doctors ON patientAdmission.docID = doctors.id where unqId = '".$admissionId."'");

                                            while ($row = mysqli_fetch_array($sql)) {
                                                $paymentStatus = $row['status'];
                                                $month = date('m');
                                                $day = date('d');
                                                $year = date('Y');
                                                $today = $year . '-' . $month . '-' . $day;
                                                $datetime1 = date_create($row['dateofadmission']);
                                                $datetime2 = date_create($today);
                                                $advancePaid += $row['advance_paid'];
                                                // Calculates the difference between DateTime objects
                                                $interval = date_diff($datetime1, $datetime2);
                                                $daysDiff = $interval->format('%a days');
                                                $daysDiffNumeric = $interval->format('%a');
                                                $billPayable += ($row['cpd'] * $daysDiffNumeric);


                                            ?>
                                                <tr>
                                                    <td><?php echo $row['admissionType']; ?></td>
                                                    <td><?php echo $row['doctorName']; ?></td>
                                                    <td><?php echo $row['wardNo']; ?></td>
                                                    <td><?php echo $row['dateofadmission']; ?></td>
                                                    <td><?php echo $row['advance_paid']; ?></td>
                                                    <td><?php echo $row['cpd']; ?> (Admitted for <?php echo $daysDiff ?>)</td>
                                                </tr>

                                            <?php } ?>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="over-title margin-bottom-15"> <span class="text-bold">Appointment </span>Information</h5>

                                    <table class="table table-hover" id="sample-table-1">
                                        <!-- <thead>
                                            
                                        </thead> -->
                                        <tbody id="delete">
                                        <tr>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Consultancy Fee</th>
                                                <th>Doctor Name</th>
                                            </tr>
                                            <?php
                                            $sql = mysqli_query($con, "SELECT appointment.appointmentDate,appointment.appointmentTime,appointment.consultancyFees,doctors.doctorName FROM `appointment` INNER JOIN `doctors` ON appointment.doctorId = doctors.id where appointment.admission_id = '".$admissionId."' AND appointment.doctorStatus = 1");

                                            while ($row = mysqli_fetch_array($sql)) {
                                                $billPayable += $row['consultancyFees'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['appointmentDate']; ?></td>
                                                    <td><?php echo $row['appointmentTime']; ?></td>
                                                    <td><?php echo $row['consultancyFees']; ?></td>
                                                    <td><?php echo $row['doctorName']; ?></td>
                                                </tr>

                                            <?php } ?>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="over-title margin-bottom-15"> <span class="text-bold">Operation</span> Information</h5>

                                    <table class="table table-hover" id="sample-table-1">
                                        <!-- <thead>
                                           
                                        </thead> -->
                                        <tbody id="delete">
                                        <tr>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Ward Number</th>
                                                <th>Operation</th>
                                                <th>Charges</th>
                                                <th>Doctor Name</th>
                                                <th>Consultant Name</th>
                                                <th>Operation Amount Received</th>
                                            </tr>
                                            <?php
                                            $sql = mysqli_query($con, "SELECT patientoperation.operationFeeRecieved,patientoperation.opDate,patientoperation.opTime,patientoperation.ward,procedureList.name,procedureList.charges,doctors.doctorName, consultant.doctorName as consultantName FROM `patientoperation` INNER JOIN `procedureList` ON procedureList.procedureID = patientoperation.opTitle INNER JOIN doctors ON doctors.id = patientoperation.docID LEFT JOIN doctors as consultant ON consultant.id = patientoperation.consultantID WHERE `patient_admission_id` = '".$admissionId."' ORDER BY operationID DESC");

                                            while ($row = mysqli_fetch_array($sql)) {
                                                $billPayable += $row['charges'];
                                                $advancePaid += $row['operationFeeRecieved'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['opDate']; ?></td>
                                                    <td><?php echo $row['opTime']; ?></td>
                                                    <td><?php echo $row['ward']; ?></td>
                                                    <td><?php echo $row['name']; ?></td>
                                                    <td><?php echo $row['charges']; ?></td>
                                                    <td><?php echo $row['doctorName']; ?></td>
                                                    <td><?php echo $row['consultantName']; ?></td>
                                                    <td><?php echo $row['operationFeeRecieved']; ?></td>
                                                </tr>

                                            <?php } ?>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="over-title margin-bottom-15"><span class="text-bold">Lab Test </span>Information</h5>

                                    <table class="table table-hover" id="sample-table-1">
                                        <!-- <thead>
                                            
                                        </thead> -->
                                        <tbody id="delete">
                                        <tr>
                                                <th>Test Name</th>
                                                <th>Assigned Date</th>
                                                <th>Performed Date</th>
                                                <th>Performed By</th>
                                                <th>Charges</th>
                                            </tr>
                                            <?php
                                            $sql = mysqli_query($con, "SELECT laboratoryTestList.labTestName,labTestRecord.assignedDate,labTestRecord.performedDate,labTestRecord.performedBy,labTestRecord.charges from labTestRecord INNER JOIN patientAdmission ON patientAdmission.unqId = labTestRecord.admissionID INNER JOIN laboratoryTestList ON laboratoryTestList.labFormID = labTestRecord.performedTestID WHERE labTestRecord.admissionID = '".$admissionId."' AND labTestRecord.labTestStatus = 'complete'");

                                            while ($row = mysqli_fetch_array($sql)) {
                                                $billPayable += $row['charges'];

                                            ?>
                                                <tr>
                                                    <td><?php echo $row['labTestName']; ?></td>
                                                    <td><?php echo $row['assignedDate']; ?></td>
                                                    <td><?php echo $row['performedDate']; ?></td>
                                                    <td><?php echo $row['performedBy']; ?></td>
                                                    <td><?php echo $row['charges']; ?></td>
                                                </tr>

                                            <?php } ?>

                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-12 text-right ">
                                            <h5 class=" margin-top-15" style="font-size: 18px;">
                                                <span class="text-bold">Total: </span><?php echo number_format($billPayable) . "/-"; ?>
                                            </h5>
                                            <?php if($paymentStatus == 'pending'): ?>
                                            <h5 class=" margin-top-15" style="font-size: 18px;">
                                                <span class="text-bold">Advance Paid: </span><?php echo number_format($advancePaid) . "/-"; ?>
                                            </h5>
                                            <h5 class=" margin-top-15" style="font-size: 18px;">
                                                <span class="text-bold">Total Payable: </span><?php echo number_format($billPayable - $advancePaid) . "/-"; ?>
                                            </h5>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php  if($paymentStatus == 'pending'):  ?>
                                        <div class="col-md-6 text-center" id="clear_bill_btn">
                                            <form action="bill_clear.php" method="POST"> 
                                                <input type="hidden" name="admissionId" value="<?php echo $admissionId; ?>">
                                                <button class="btn btn-default">Clear Bill</button>
                                            </form>
                                        </div>
                                        <?php endif; ?>
                                        <div class="col-md-6 text-center">
                                            <button class="btn btn-default" id="clear_print">Print</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!-- </div> -->

        <!-- start: FOOTER -->
        <?php include('include/footer.php'); ?>
        <!-- end: FOOTER -->
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
    <!-- <script src="assets/js/doctor.js"></script> -->
    <!-- start: JavaScript Event Handlers for this page -->
    <script src="assets/js/form-elements.js"></script>
    <script>
        $(document).on("click", "#clear_print" , function() {
        $('#page-title').css('display', 'none');
        $('#clear_bill_btn').css('display', 'none');
        $('#clear_print').css('display', 'none');
        $('.print_header').css('margin', 0);
        window.print();
        $('#clear_bill_btn').css('display', 'block');
        $('#page-title').css('display', 'block');
        $('#clear_print').css('display', 'block');
        $('.print_header').css('margin', auto);
    });
    </script>
    <!-- end: JavaScript Event Handlers for this page -->

    <!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>