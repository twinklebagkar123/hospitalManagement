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
if ((isset($_SESSION['lastPageIdAdmit'])) && $s > 0) :
  $getDataFromId = $_SESSION['lastPageIdAdmit'];
  $query = "SELECT patientAdmission.unqId,patientAdmission.admissionType,patientAdmission.uid,patientAdmission.wardNo,patientAdmission.dateofadmission,patientAdmission.dateofdischarge,patientAdmission.status,patientAdmission.advance_paid,tblpatient.PatientName FROM `patientAdmission` INNER JOIN `tblpatient` ON tblpatient.ID = patientAdmission.uid WHERE `unqId` <= " . $getDataFromId . " ORDER BY `unqId` desc LIMIT " . $g;
else :
  $query = "SELECT patientAdmission.unqId,patientAdmission.admissionType,patientAdmission.uid,patientAdmission.wardNo,patientAdmission.dateofadmission,patientAdmission.dateofdischarge,patientAdmission.status,patientAdmission.advance_paid,tblpatient.PatientName FROM `patientAdmission` INNER JOIN `tblpatient` ON tblpatient.ID = patientAdmission.uid WHERE `unqId` >= " . $getDataFromId . " ORDER BY `unqId` desc LIMIT " . $g;
endif;

$patientCountSql = "SELECT COUNT(`unqId`) FROM `patientAdmission`";
$sql = mysqli_query($con, $query);
$countSql = mysqli_query($con, $patientCountSql);
$resultOfAPatientCount = mysqli_fetch_array($countSql);

while ($row = mysqli_fetch_array($sql)) {

  $_SESSION['lastPageIdAdmit'] = $row['unqId'];

  $ID = $row['uid'];
  $patientName = $row['PatientName'];
  $ward = $row['wardNo'];
  $admissiondate = $row['dateofadmission'];
  $dischargedate = $row['dateofdischarge'];
  $admission_status = $row['status'];
  $advanve = $row['advance_paid'];
  $operation = '<a class="btn btn-primary"  href="patientOperationConsent.php?admissionId=' . $row['unqId'] . '" >Operation</a>';
  $bookAppointment = '<a class="btn btn-primary"  href="bookAppointment.php?admissionId=' . $row['unqId'] . '" >Book</a>';
  $discharge = '<a class="btn btn-primary"  class="btn btn-primary" href="discharge_patient.php?admissionId='. $row['unqId'] .'">Discharge</a>';
  $getReport = '<a class="btn btn-primary"  class="btn btn-primary" href="discharge_patient.php?admissionId='. $row['unqId'] .'">Get Report</a>';
  $discharge_getreport = ($admission_status == 'pending') ? $discharge : $getReport;
  $switchToIDE = '<a class="btn btn-primary"  class="btn btn-primary" href="view-admit-patient.php?id=' . $row['unqId'] . '&switch_to_ide=true">Switch to IDE</a>';
  $admissionType = ($row['admissionType'] == 'opd') ? $switchToIDE : '';
  //  $id = '<a class="btn btn-primary" data-pid="'.$row['ID'].'" data-name="'.$row['PatientName'].'" class="btn btn-primary" href="medical-history-documents.php">id</a>';

  // $result = array($ID, $doc, $ward, $admissiondate, $dischargedate, $advanve,$operation,$id,  $discharge_getreport);

  $result = array($patientName, $ward, $admissiondate, $dischargedate, $advanve, $admissionType, $operation,$bookAppointment, $discharge_getreport);
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
