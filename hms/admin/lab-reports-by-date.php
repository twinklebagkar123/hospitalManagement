<?php
include('../include/header_structured.php');
function fetchPatientName($admissionID)
{
    include('../include/config.php');
    $query = "SELECT tblpatient.PatientName FROM `patientAdmission` as tab1 INNER JOIN tblpatient ON tab1.uid = tblpatient.ID WHERE tab1.unqId = '$admissionID'";
    $result =  $con->query($query);
    while ($row = mysqli_fetch_array($result)) {
        $answer = $row['PatientName'];
    }
    return $answer;
}

?>

<div class="wrap-content container" id="container">
    <!-- start: PAGE TITLE -->
    <section id="page-title">
        <div class="row">
            <div class="col-sm-8">
                <h1 class="mainTitle">Admin | Lab Records</h1>
            </div>
            <ol class="breadcrumb">
                <li>
                    <span>Admin</span>
                </li>
                <li class="active">
                    <span>All Records</span>
                </li>
            </ol>
        </div>
    </section>
    <div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-sm-12">
                <form role="form" method="post" name="search">

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
                <?php
                if(isset($_POST["search"])):
                $todate = $_POST['todate'];
                $fromdate = $_POST['fromdate'];
                $admissionQuery = "SELECT assignedDate,labTestName,admissionID,labTestStatus,recordID,performedTestID FROM labTestRecord as table1 INNER JOIN laboratoryTestList as table2 ON table1.performedTestID = table2.labFormID AND table1.labTestStatus = 'complete' where date(table1.assignedDate) between '$fromdate' and '$todate'";
                $result = $con->query($admissionQuery);
                ?>
                 <h4 align="center">Result from <?php echo $fromdate ?> to <?php echo $todate ?> based on Assigned Test Date</h4>
                <table class="display" id="myTable">
                    <thead>
                        <th>#</th>
                        <th>Assigned Date</th>
                        <th>Test Type</th>
                        <th>Patient Name</th>
                        <th>Status</th>
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
                                <td><?php echo $row['labTestName']; ?></td>
                                <td><?php echo fetchPatientName($row['admissionID']); ?></td>
                                <td><?php echo $row['labTestStatus']; ?></td>
                                <td><?php
                                    if ($row['labTestStatus'] == "complete") {
                                    ?>
                                        <a href="view_results.php?recID=<?php echo $row['recordID'] ?>">View Results</a>
                                    <?php
                                    }

                                    ?>
                                </td>
                            </tr>
                        <?php
                            $sr++;
                        }
                        ?>
                    </tbody>
                </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- start: FOOTER -->
<?php include('../include/footer_structured.php'); ?>