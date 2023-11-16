<?php
require_once("include/config.php");
$html = "";
function fetchTestName($testID)
{
    // include('include/config.php');
    global $con;
    $query = "SELECT * FROM `laboratoryTestList` where labFormID= '$testID'";
    $result = $con->query($query);
    while ($row = mysqli_fetch_array($result)) {
        $answer = $row['labTestName'];
    }
    return $answer;
}
if (!empty($_POST['admissionid'])) {
    $admissionid = $_POST['admissionid'];
    $admission = $_POST['admission'];
    $discharge = $_POST['discharge'];
    if ($discharge == "0000-00-00") {
        $discharge = date("Y-m-d");
    }
    $vid = $_POST['vid'];
    // BS Dates
    $period = new DatePeriod(
        new DateTime($admission),
        new DateInterval('P1D'),
        new DateTime($discharge)
    );
    $bsDates = array();


    foreach ($period as $key => $value) {
        array_push($bsDates, $value->format('Y-m-d'));
    }
    //BS TYPES AND DATA
    $queryBSTypes = "SELECT DISTINCT BSType FROM tblmedicalhistory";
    $resultTypes = $con->query($queryBSTypes);

    $data = array();
    $type = array();
    while ($rowTypes = $resultTypes->fetch_assoc()) {
       
        array_push($type, $rowTypes["BSType"]);

       
    }
    
    function array_push_assoc($array, $key, $sugarLevel, $x)
    {
        $array[$key][$x] = $sugarLevel;
        return $array;
    }
    $x = 0;
    foreach ($bsDates as  $value) {

        foreach ($type as  $valueType) {
            if ($valueType != "") {
                $query2 = "SELECT  `BloodSugar`,`CreationDate` FROM `tblmedicalhistory` WHERE BSType='" . $valueType . "' AND CreationDate LIKE '" . $value . '%' . "' AND PatientID='$vid'";

                $result1 = $con->query($query2);
                
                $valueSugar = 0;
                while ($row3 = $result1->fetch_assoc()) {

                    $valueSugar = $row3["BloodSugar"];

                    
                }
                $data = array_push_assoc($data, $valueType, $valueSugar, $x);
                

            }
        }
        $x++;
    }


    //medical History 
    $query = "SELECT * FROM `tblmedicalhistory` WHERE admissionID = '$admissionid' ORDER BY ID DESC";
    $result1 = $con->query($query);
    $html = '<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <tr align="center">
        <th colspan="8">Medical History</th>
    </tr>
    <tr>
        <th>Report Id</th>
        <th>Blood Pressure</th>
        <th>Weight</th>
        <th>Blood Sugar</th>
        <th>Body Temprature</th>
        <th>Doctors Observation</th>
        <th>Doctors Diagnosis</th>
        <th>Nurse Note</th>
        <th>Medical Prescription</th>
        <th>Visit Date</th>
    </tr>';
    $tpr = array();
    $visit = array();
    $tprDate = array();
    $pressureSys = array();
    $pressureDias = array();
    $medicalPres = array();
    $cnt = 1;
    while ($row = mysqli_fetch_array($result1)) {
        if ($row['Temperature']) {
            array_push($tpr, $row['Temperature']);
            array_push($tprDate, $row['CreationDate']);
            array_push($pressureSys, $row['BloodPressure']);
            array_push($pressureDias, $row['diastolic']);
            $MedicalPres = json_decode($row['MedicalPres']);
            array_push($medicalPres, $MedicalPres);

        }

        $prescribed_date = date('d/m/Y', strtotime($row['CreationDate']));
        $html = $html . '  <tr> <td>' . $row['ID'] . '</td> <td>' . $row['BloodPressure'] . '/'.$row["diastolic"].'</td> <td>' . $row['Weight'] . '</td>
            <td>' . $row['BloodSugar'] . '</td> <td>' . $row['Temperature'] . '</td><td>'.$row["doctorObservation"].'  <br><a href="editHistory.php?admissionID='.$row["ID"].'">EDIT OBSERVATION</a></td><td>'.$row["doctorDiagnosis"].'<br><a>EDIT DIAGNOSIS</a></td><td>'.$row["nurseNote"].'</td><td><a class="btn btn-default" href="prescription_print.php?reportId=' . $row['ID'] . '&patientId=' . $vid . '">View & Print</a></td> <td>' . $prescribed_date . '</td>
        </tr>';
        $cnt++;
    }
    $html = $html . '</table>';

    $testQuery = "SELECT * FROM `labTestRecord` WHERE admissionID= '" . $admissionid . "'";
    $testList = $con->query($testQuery);
    if ($testList) {
        $html = $html . '<table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; 
        border-spacing: 0; width: 100%;"><thead><tr><td>Sr No.</td><td>Assigned Date</td><td>Test Name</td><td>Test 
        Status</td><td>Results</td></tr></thead><tbody>';
        $srNum = 0;
        while ($row2 = mysqli_fetch_array($testList)) {
            $srNum++;
            $testname = fetchTestName($row2['performedTestID']);
            $html = $html . '<tr><td>' . $srNum . '</td><td>' . $row2['assignedDate'] . '</td><td>' . $testname . '</td><td>' . $row2['labTestStatus'] . '</td>';
            if ($row2['labTestStatus'] == 'complete') {
                $html = $html . '<td><a href="testResultReport.php?recID=' . $row2['recordID'] . '"> View Results</a></td><tr>';
            } else {
                $html = $html . '<td></td><tr>';
            }
        }
    }
    
    $html = $html . '</tbody></table>';



    $result["html"] = $html;
    $result['tpr'] = $tpr;
    $result['tprDate'] = $tprDate;
    $result['bsDates'] = $bsDates;
    $result['sugarReads'] = $data;
    $result['diastolic']= $pressureDias;
    $result['pressureSys']= $pressureSys;
    echo json_encode($result);
}
