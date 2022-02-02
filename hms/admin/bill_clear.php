<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$admissionId = $_POST['admissionId'];
$today = date('Y-m-d H:i:s');
$sql = "UPDATE `patientAdmission` SET `status` = 'paid', `dateofdischarge` = '".$today."' WHERE `patientAdmission`.`unqId` = '".$admissionId."'";
$con->query($sql);
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
$extra = 'discharge_patient.php?admissionId='.$admissionId;
header("location:http://$host$uri/$extra");