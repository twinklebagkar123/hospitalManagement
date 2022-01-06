<?php

session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$data = [];
$s = $_GET['start'];
$getDataFromId = $s;
$g = $_GET['length'];
if((isset($_SESSION['lastPageIdAdmit'])) && $s > 0): 
  $getDataFromId = $_SESSION['lastPageIdAdmit'];
  $query="SELECT * FROM `patientAdmission` WHERE `unqId` <= " . $getDataFromId . " ORDER BY `unqId` ASC LIMIT " . $g;
else:
  $query="SELECT * FROM `patientAdmission` WHERE `unqId` >= " . $getDataFromId . " ORDER BY `unqId` ASC LIMIT " . $g;
endif;

$patientCountSql ="SELECT COUNT(`unqId`) FROM `patientAdmission`";
$sql = mysqli_query($con, $query);
$countSql = mysqli_query($con, $patientCountSql);
$resultOfAPatientCount = mysqli_fetch_array($countSql);

while ($row = mysqli_fetch_array($sql)) {

  $_SESSION['lastPageIdAdmit'] = $row['unqId'];

  $ID = $row['uid'];
  $doc =   $row['docID'];
  $ward = $row['wardNo'];
  $admissiondate = $row['dateofadmission'];
  $dischargedate = $row['dateofdischarge'];
  $advanve = $row['advance_paid'];
  $operation = "<button type='button' data-pid='".$row['ID']."' data-name='".$row['PatientName']."' class='btn btn-primary' href='operation-form.php'> Operation</button>";
 $discharge = '<a class="btn btn-primary"  class="btn btn-primary" href="discharge.php">Discharge</a>';
 $id = '<a class="btn btn-primary" data-pid="'.$row['ID'].'" data-name="'.$row['PatientName'].'" class="btn btn-primary" href="medical-history-documents.php">id</a>';
   
  $result = array($ID, $doc, $ward, $admissiondate, $dischargedate, $advanve,$operation,$id,  $discharge);
  array_push($data, $result);
}

$results = array(
  "start" => $s,
  "lengh" => $g,
  "recordsTotal" => $resultOfAPatientCount[0],
  "recordsFiltered" => $resultOfAPatientCount[0],
  "data" => $data
); 
echo json_encode($results);
?>