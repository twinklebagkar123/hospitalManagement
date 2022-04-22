<?php
include('include/header_structured.php');

if (isset($_POST['submit'])) {
    $specilization = $_POST['Doctorspecialization'];
    $admissionID = $_GET['admissionId'];
    $doctorid = $_POST['doctor'];
    $userid = $_POST['idpatient'];
    $fees = $_POST['fees'];
    $appdate = $_POST['appdate'];
    $time = $_POST['apptime'];
    $userstatus = 1;
    $docstatus = 1;
    $todaysDate = date("Y-m-d H:i:s");
    $query = "insert into appointment(admission_id,doctorSpecialization,doctorId,userId,consultancyFees,appointmentDate,appointmentTime,userStatus,doctorStatus,postingDate) values('$admissionID','$specilization','$doctorid','$userid','$fees','$appdate','$time','$userstatus','$docstatus','$todaysDate')";
    $result = $con->query($query);
    $notify_doctor = "INSERT INTO `notification_detail` ( `notification_type`, `notification_message`, `read_receipt`, `user_id`) VALUES ('doctor', 'Appointment Assigned by admin for the date: $appdate', '0', NULL);";
    $result_notify = $con->query($notify_doctor);
    // print_r($query);
    if ($result) {
        echo "<script>alert('Your appointment successfully booked');</script>";
    }
}
?> <script type="text/javascript">
        function valid() {
            if (document.adddoc.npass.value != document.adddoc.cfpass.value) {
                alert("Password and Confirm Password Field do not match  !!");
                document.adddoc.cfpass.focus();
                return false;
            }
            return true;
        }
        function getdoctor(val) {
            // console.log("hi");
            $.ajax({
                type: "POST",
                url: "get_doctor.php",
                data: 'specilizationid=' + val,
                success: function(data) {
                    $("#doctor").html(data);
                }
            });
        }
        function getfee(val) {
            $.ajax({
                type: "POST",
                url: "get_doctor.php",
                data: 'doctor=' + val,
                success: function(data) {
                    $("#fees").html(data);
                }
            });
        }
    </script>

                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Admin | Book Appointment</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Admin</span>
                                </li>
                                <li class="active">
                                    <span>Book Appointment</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <!-- end: PAGE TITLE -->
                    <!-- start: BASIC EXAMPLE -->
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row margin-top-30">
                                    <div class="col-lg-8 col-md-12">
                                        <div class="panel panel-white">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">Book Appointment</h5>
                                            </div>
                                            <div class="panel-body">
                                                <?php
                                                $admissionIDin = $_GET['admissionId'];
                                                $queryAdmission = "SELECT * FROM patientAdmission where unqId='$admissionIDin'";
                                                $result = $con->query($queryAdmission);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $patientIDin = $row['uid'];
                                                }

                                                ?>
                                                <form role="form" name="book" method="post">

                                                    <input id="idInput" type="hidden" name="idpatient" value="<?php echo $patientIDin; ?>">

                                                    <div class="form-group">
                                                        <label for="DoctorSpecialization">
                                                            Doctor Specialization
                                                        </label>
                                                        <select name="Doctorspecialization" class="form-control" onChange="getdoctor(this.value);" required="required">
                                                            <option value="">Select Specialization</option>
                                                            <?php $ret = mysqli_query($con, "select * from doctorspecilization");
                                                            while ($row = mysqli_fetch_array($ret)) {
                                                            ?>
                                                                <option value="<?php echo htmlentities($row['specilization']); ?>">
                                                                    <?php echo htmlentities($row['specilization']); ?>
                                                                </option>
                                                            <?php } ?>

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="doctor">
                                                            Doctors
                                                        </label>
                                                        <select name="doctor" class="form-control" id="doctor" onChange="getfee(this.value);" required="require">
                                                            <option value="">Select Doctor</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="consultancyfees">
                                                            Consultancy Fees
                                                        </label>
                                                        <select name="fees" class="form-control" id="fees" readonly>

                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="AppointmentDate">
                                                            Date
                                                        </label>
                                                        <input class="form-control datepicker" name="appdate" id="appointment_date" autocomplete="off" required="required" data-date-format="yyyy-mm-dd">

                                                    </div>

                                                    <div class="form-group">
                                                        <label for="Appointmenttime">

                                                            Time

                                                        </label>
                                                        <input class="form-control" name="apptime" id="timepicker1" required="required" autocomplete="off">eg : 10:00 PM
                                                    </div>

                                                    <button type="submit" name="submit" class="btn btn-o btn-primary">
                                                        Book Appointment
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="panel panel-white">
                                    <div id="resultFetch"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: BASIC EXAMPLE -->






            <!-- end: SELECT BOXES -->

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
    <script src="assets/js/custom.js"></script>
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