<?php

session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$data = [];
$s = $_GET['start'];
$g = $_GET['length'];
$query = "SELECT * FROM `tblpatient` WHERE `ID` >= " . $s . " ORDER BY `ID` ASC LIMIT " . $g;
$sql = mysqli_query($con, $query);

while ($row = mysqli_fetch_array($sql)) {


  $ID = $row['ID'];
  $PatientName =   $row['PatientName'];
  $PatientContno = $row['PatientContno'];
  $PatientGender = $row['PatientGender'];
  $CreationDate = $row['CreationDate'];
  $UpdationDate = $row['UpdationDate'];
  $button = '<button>test button</button>';

  $result = array($ID, $PatientName, $PatientContno, $PatientGender, $CreationDate, $UpdationDate,$button);
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