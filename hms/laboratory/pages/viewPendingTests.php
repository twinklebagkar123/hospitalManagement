
<?php 

function fetchPatientName($admissionID){
    include('include/config.php');
    $query = "SELECT tblpatient.PatientName FROM `patientAdmission` as tab1 INNER JOIN tblpatient ON tab1.uid = tblpatient.ID WHERE tab1.unqId = '$admissionID'";
    $result =  $con->query($query);
    while ($row = mysqli_fetch_array($result)) {
        $answer = $row['PatientName'];
    }
    return $answer;
}

?>
<body>
    <div id="app">
       
        <div class="app-content">
           
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Admin | View Tests</h1>
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
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-sm-12">
                            <?php
									$admissionQuery = "SELECT assignedDate,labTestName,admissionID,labTestStatus,recordID,performedTestID FROM labTestRecord as table1 INNER JOIN laboratoryTestList as table2 ON table1.performedTestID = table2.labFormID;";
									$result = $con->query($admissionQuery);
									?>
									<table class="table table-bordered dt-responsive nowrap">
										<thead>
											<th>#</th>
											<th>Assigned Date</th>
											<th>Test Type</th>
											<th>Patient Name</th>
											<th>Status</th>
											<th>Action</th>
											<th>Reports</th>
										</thead>
										<tbody id="viewReport">
											<?php
											$sr = 1;
											while ($row = mysqli_fetch_array($result)) {
											?>
												<tr>
													<td><?php echo $sr; ?></td>
													<td id="date"><?php echo $row['assignedDate']; ?></td>
													<td><?php echo $row['labTestName'];?></td>
													<td><?php echo fetchPatientName($row['admissionID']) ;?></td>
													<td><?php echo $row['labTestStatus']; ?></td>
													<td>
                                                    <?php if($row['labTestStatus'] == "pending"){
                                                        ?>
                                                            <a href="performTest.php?recID=<?php echo $row['recordID']?>&adID=<?php echo $row['admissionID']; ?>&testID=<?php echo $row['performedTestID'];?>">Perform test</a> | <a href="">Decline</a> 
                                                        <?php
                                                    }?>    
                                                    </td>
													<td><?php
                                                        if($row['labTestStatus'] == "complete"){
                                                            ?>
                                                             <a href="testResultReport.php?recID=<?php echo $row['recordID']?>">View Results</a>
                                                            <?php
                                                        }
                                                    
                                                    ?></td>
												</tr>
											<?php
												$sr++;
											}
											?>
										</tbody>
									</table>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <!-- start: CLIP-TWO JAVASCRIPTS -->
    <script src="assets/js/main.js"></script>
    <!-- start: JavaScript Event Handlers for this page -->
    <script src="assets/js/form-elements.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"></script>
    <script>
        jQuery(document).ready(function() {});
    </script>
</body>