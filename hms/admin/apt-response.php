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
if((isset($_SESSION['lastPageId'])) && $s > 0): 
  $getDataFromId = $_SESSION['lastPageId'];
  $query="SELECT apt.id,tblp.PatientName,doc.doctorName,doc.specilization,doc.docFees,apt.appointmentDate,apt.postingDate FROM appointment as apt INNER JOIN tblpatient AS tblp ON apt.userId = tblp.ID INNER JOIN doctors AS doc ON apt.doctorId = doc.id where tblp.ID  <= " . $getDataFromId . " ORDER BY apt.id DESC LIMIT ". $g;
else:
  $query="SELECT apt.id,tblp.PatientName,doc.doctorName,doc.specilization,doc.docFees,apt.appointmentDate,apt.postingDate FROM appointment as apt INNER JOIN tblpatient AS tblp ON apt.userId = tblp.ID INNER JOIN doctors AS doc ON apt.doctorId = doc.id where tblp.ID  >= " . $getDataFromId . " ORDER BY apt.id DESC LIMIT ". $g;
endif;

$appointmentCountSql ="SELECT COUNT(`id`) as totalAppointments FROM `appointment`";
$sql = mysqli_query($con, $query);
$countSql = mysqli_query($con, $appointmentCountSql);
$resultOfAppointmentCount = mysqli_fetch_array($countSql);

while ($row = mysqli_fetch_array($sql)) {

 
    $_SESSION['lastPageId'] = $row['id'];
  
  $ID = $row['id'];
  $PatientName =   $row['PatientName'];
  $doctorName = $row['doctorName'];
  $specilization = $row['specilization'];
  $docFees = $row['docFees'];
  $appointmentDate = $row['appointmentDate'];
 $cancel = '<a href="view-patient.php?viewid='.$ID.'"><i class="fa fa-eye"></i></a>';
 $result = array($ID, $PatientName, $doctorName, $specilization, $docFees, $appointmentDate,$cancel);
  array_push($data, $result);
}

$results = array(
  "start" => $s,
  "lengh" => $g,
  "recordsTotal" => $resultOfAppointmentCount[0],
  "recordsFiltered" => $resultOfAppointmentCount[0],
  "data" => $data
); 
echo json_encode($results);
?>



