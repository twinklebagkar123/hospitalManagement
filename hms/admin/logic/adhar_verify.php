<?php
include "../include/config.php";
$inputKey = $_POST['adhar_card_num'];
$sql = "SELECT `PatientName` FROM tblpatient WHERE adharCardNo='$inputKey'";
$result = mysqli_fetch_array(mysqli_query($con,$sql));
if($result['ID'] == '' || $result['ID'] == null):
    $arrayResponse = array('patientID' => null,'patientName'=> null);
    echo json_encode($arrayResponse);
else:
        $arrayResponse = array('patientID' => $result['ID'],'patientName'=> $result['PatientName']);
        echo json_encode($arrayResponse);
endif;
?>