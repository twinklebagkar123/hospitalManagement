<?php
require_once("include/config.php");
$html = "";
if(!empty($_POST['admissionid'])){
    $admissionid = $_POST['admissionid'];
    $query = "SELECT * FROM `tblmedicalhistory` WHERE admissionID = '$admissionid'";
    $result1 = $con->query($query);
 


  $html = '<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <tr align="center">
        <th colspan="8">Medical History</th>
    </tr>
    <tr>
        <th>#</th>
        <th>Blood Pressure</th>
        <th>Weight</th>
        <th>Blood Sugar</th>
        <th>Body Temprature</th>
        <th>Medical Prescription</th>
        <th>Visit Date</th>
    </tr>';
    // $tpr = array();
    // $visit = array();
    $cnt = 0;
    while ($row = mysqli_fetch_array($result1)) {
    
    // array_push($tpr,$row['Temperature']);
    //    array_push($visit,$row['CreationDate']);
  
    $html = $html. '  <tr> <td><?php echo $cnt; ?></td> <td>' .$row['BloodPressure'].'</td> <td>'.$row['Weight'].'</td>
            <td>'.$row['BloodSugar'].'</td> <td>'.$row['Temperature'].'</td><td>'. $row['MedicalPres'].'</td> <td>'.$row['CreationDate'].'</td>
        </tr>';
   $cnt++;
    } 
$html = $html. '</table>';
$result["html"] = $html;

echo json_encode($result);
}

?>