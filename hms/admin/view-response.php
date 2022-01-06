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
if((isset($_SESSION['lastPageIdPatient'])) && $s > 0): 
  $getDataFromId = $_SESSION['lastPageIdPatient'];
  $query="SELECT * FROM `patiendAdmission` WHERE `ID` <= " . $getDataFromId . " ORDER BY `ID` ASC LIMIT " . $g;
else:
  $query="SELECT * FROM `patiendAdmission` WHERE `ID` >= " . $getDataFromId . " ORDER BY `ID` ASC LIMIT " . $g;
endif;

$patientCountSql ="SELECT COUNT(`unqId`) FROM `patiendAdmission`";
$sql = mysqli_query($con, $query);
$countSql = mysqli_query($con, $patientCountSql);
$resultOfAPatientCount = mysqli_fetch_array($countSql);

while ($row = mysqli_fetch_array($sql)) {

  $_SESSION['lastPageId'] = $row['unqId'];

  $ID = $row['unqId'];
  $PatientName =   $row['PatientName'];
  $PatientContno = $row['PatientContno'];
  $PatientGender = $row['PatientGender'];
  $CreationDate = $row['CreationDate'];
  $UpdationDate = $row['UpdationDate'];
  $bookAppointment = "<button type='button' data-pid='".$row['ID']."' data-name='".$row['PatientName']."' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Book</button>";
  $addFiles = '<a class="btn btn-primary" data-pid="'.$row['ID'].'" data-name="'.$row['PatientName'].'" class="btn btn-primary" href="medical-history-documents.php">Add</a>';
  $discharge = '<a class="btn btn-primary" data-pid="'.$row['ID'].'" data-name="'.$row['PatientName'].'" class="btn btn-primary" href="discharge.php">Discharge</a>';
  $viewInfo = '<a href="view-patient.php?viewid='.$row['ID'].'"><i class="fa fa-eye"></i></a>';
  $result = array($ID, $PatientName, $PatientContno, $PatientGender, $CreationDate, $UpdationDate,$bookAppointment,$addFiles,  $discharge,$viewInfo);
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