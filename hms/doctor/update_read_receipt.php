<?php 
session_start();
include('include/config.php');
include('include/checklogin.php');
check_login();
$sql = "UPDATE `notification_detail` SET `read_receipt`= '1' WHERE `notification_type` = 'doctor' AND `read_receipt` = '0'";
$result = mysqli_query($con, $sql);
echo "Success";
?>