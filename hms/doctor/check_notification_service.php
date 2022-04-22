<?php 
session_start();
include('include/config.php');
include('include/checklogin.php');
check_login();

$sql = "SELECT * FROM `notification_detail` WHERE `notification_type` = 'doctor' AND `read_receipt` = 0 AND `user_id` = '".$_SESSION['dlogin']."'";
$result = mysqli_query($con, $sql);
$emparray = array();
while($row =mysqli_fetch_assoc($result))
{
    $emparray[] = $row;
}
echo json_encode($emparray);
?>