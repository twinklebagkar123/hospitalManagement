<?php
include "../include/config.php";
$inputKey = $_POST['adhar_card_num'];
$sql = "SELECT `PatientName` FROM tblpatient WHERE adharCardNo='$searchBy'";
$result = mysqli_fetch_array(mysqli_query($con,$sql));
if($result['ID'] == '' || $result['ID'] == null):
    $arrayResponse = array('patientID' => null,'patientName'=> null);
    return json_encode($arrayResponse);
endif;
$arrayResponse = array('patientID' => $result['ID'],'patientName'=> $result['PatientName']);
return json_encode($arrayResponse);
?>