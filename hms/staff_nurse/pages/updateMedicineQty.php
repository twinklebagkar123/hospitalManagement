<?php
include('../include/config.php');
$admissionID = $_POST["admissionID"];
$medicineID = $_POST["medicineID"];
$totalQty = $_POST["totalQty"];

$query = "UPDATE `pharmatable` SET `qty`='".$totalQty."' WHERE admissionID = '".$admissionID."' AND medID = '".$medicineID."'";
//$sql = mysqli_query($con, $query);
	//$num = mysqli_fetch_array($con,$sql);
	if ($con->query($query) === TRUE) {
		$result["result"] = true;
	} else {
		$result["result"] = false;
	}
    echo json_encode($result);
?>