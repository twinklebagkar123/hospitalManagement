<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
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
                            <div class="col-sm-8">
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
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="over-title margin-bottom-15">Patient <span class="text-bold">Information</span></h5>

                                <table class="table table-hover" id="sample-table-1">
                                    <thead>
                                        <tr>
                                            <th>Patient Id </th>
                                            <th>Patient Name</th>
                                            <th>Phone Number</th>
                                            <th>Email Address</th>
                                            <th>Adhar Card</th>
                                            <th>Gender</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody id="delete">
                                        <?php
                                        $billPayable = 0;
                                        $sql = mysqli_query($con, "SELECT tblpatient.ID, tblpatient.PatientName,tblpatient.PatientContno,tblpatient.PatientEmail,tblpatient.adharCardNo,tblpatient.PatientGender,tblpatient.PatientAdd FROM `patientAdmission` INNER JOIN tblpatient ON tblpatient.ID = patientAdmission.uid WHERE patientAdmission.unqId = 6");
                                       
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
                            <div class="col-md-12">
                                <h5 class="over-title margin-bottom-15">Admission <span class="text-bold">Information</span></h5>

                                <table class="table table-hover" id="sample-table-1">
                                    <thead>
                                        <tr>
                                            <th>Admission Type</th>
                                            <th>Doctor Name</th>
                                            <th>Ward Number</th>
                                            <th>Admitted Date</th>
                                            <th>Advance Paid</th>
                                            <th>Admission (Cost Per Day)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="delete">
                                        <?php
                                        $sql = mysqli_query($con, "SELECT patientAdmission.admissionType, doctors.doctorName,patientAdmission.wardNo,patientAdmission.dateofadmission,patientAdmission.advance_paid,patientAdmission.cpd FROM `patientAdmission` INNER JOIN doctors ON patientAdmission.docID = doctors.id where unqId = 6");
                                        
                                        while ($row = mysqli_fetch_array($sql)) {
                                            $month = date('m');
                                            $day = date('d');
                                            $year = date('Y');
                                            $today = $year . '-' . $month . '-' . $day;
                                             $datetime1 = date_create($row['dateofadmission']);
                                             $datetime2 = date_create($today);
                                            
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
                            <div class="col-md-12">
                                <h5 class="over-title margin-bottom-15">Appointment <span class="text-bold">Information</span></h5>

                                <table class="table table-hover" id="sample-table-1">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Consultancy Fee</th>
                                            <th>Doctor Name</th>
                                        </tr>
                                    </thead>
                                    <tbody id="delete">
                                        <?php
                                        $sql = mysqli_query($con, "SELECT appointment.appointmentDate,appointment.appointmentTime,appointment.consultancyFees,doctors.doctorName FROM `appointment` INNER JOIN `doctors` ON appointment.doctorId = doctors.id where appointment.admission_id = '6' AND appointment.doctorStatus = 1");
                                        
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
                            <div class="col-md-12">
                                <h5 class="over-title margin-bottom-15">Operation <span class="text-bold">Information</span></h5>

                                <table class="table table-hover" id="sample-table-1">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Ward Number</th>
                                            <th>Operation</th>
                                            <th>Charges</th>
                                            <th>Doctor Name</th>
                                            <th>Consultant Name</th>
                                        </tr>
                                    </thead>
                                    <tbody id="delete">
                                        <?php
                                        $sql = mysqli_query($con, "SELECT patientoperation.opDate,patientoperation.opTime,patientoperation.ward,procedureList.name,procedureList.charges,doctors.doctorName, consultant.doctorName as consultantName FROM `patientoperation` INNER JOIN `procedureList` ON procedureList.procedureID = patientoperation.opTitle INNER JOIN doctors ON doctors.id = patientoperation.docID LEFT JOIN doctors as consultant ON consultant.id = patientoperation.consultantID WHERE `patient_admission_id` = 6 ORDER BY operationID DESC");
                                     
                                        while ($row = mysqli_fetch_array($sql)) {
                                            $billPayable +=  $row['charges'];
                                        ?>
                                            <tr>
                                                <td><?php echo $row['opDate']; ?></td>
                                                <td><?php echo $row['opTime']; ?></td>
                                                <td><?php echo $row['ward']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['charges']; ?></td>
                                                <td><?php echo $row['doctorName']; ?></td>
                                                <td><?php echo $row['consultantName']; ?></td>
                                            </tr>

                                        <?php } ?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="over-title margin-bottom-15">Lab Test <span class="text-bold">Information</span></h5>

                                <table class="table table-hover" id="sample-table-1">
                                    <thead>
                                        <tr>
                                            <th>Test Name</th>
                                            <th>Assigned Date</th>
                                            <th>Performed Date</th>
                                            <th>Performed By</th>
                                            <th>Charges</th>
                                        </tr>
                                    </thead>
                                    <tbody id="delete">
                                        <?php
                                        $sql = mysqli_query($con, "SELECT laboratoryTestList.labTestName,labTestRecord.assignedDate,labTestRecord.performedDate,labTestRecord.performedBy,labTestRecord.charges from labTestRecord INNER JOIN patientAdmission ON patientAdmission.unqId = labTestRecord.admissionID INNER JOIN laboratoryTestList ON laboratoryTestList.labFormID = labTestRecord.performedTestID WHERE labTestRecord.admissionID = 6 AND labTestRecord.labTestStatus = 'complete'");
                                    
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
                                <div>
                                    <?php echo "********".$billPayable."********"; ?>
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
    <?php //include('include/setting.php'); 
    ?>

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
    <!-- start: JavaScript Event Handlers for this page -->
    <script src="assets/js/form-elements.js"></script>

    <!-- end: JavaScript Event Handlers for this page -->

    <!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>