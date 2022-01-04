<?php

session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$data = [];
$s = $_GET['start'];
$g = $_GET['length'];
$query="SELECT tblp.ID,tblp.PatientName,doc.doctorName,doc.specilization,doc.docFees,apt.appointmentDate,apt.postingDate FROM appointment as apt INNER JOIN tblpatient AS tblp ON apt.userId = tblp.ID INNER JOIN doctors AS doc ON apt.doctorId = doc.id where tblp.ID  >= " . $s . " ORDER BY tblp.ID DESC LIMIT ". $g;
$sql = mysqli_query($con, $query);

while ($row = mysqli_fetch_array($sql)) {


  $ID = $row['ID'];
  $PatientName =   $row['PatientName'];
  $doctorName = $row['doctorName'];
  $specilization = $row['specilization'];
  $docFees = $row['docFees'];
  $appointmentDate = $row['appointmentDate'];
 $cancel = '<a href="appointment-history.php?id= echo '.$row['id'].' &cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')"class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Cancel</a>';
  $result = array($ID, $PatientName, $doctorName, $specilization, $docFees, $appointmentDate,$cancel);
  array_push($data, $result);
}

$results = array(
  "start" => $s,
  "lengh" => $g,
  "recordsTotal" => 100,
  "recordsFiltered" => 100,
  "data" => $data
); 
echo json_encode($results);
?>



