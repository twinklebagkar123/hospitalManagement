<?php
include "../include/config.php";
$con;
$inputKey = $_POST['inputKey'];
$searchBy = $_POST['searchBy'];
function getCustomerDetails($inputKey,$searchBy){
    switch ($inputKey) {
        case 'id':
            global $con;
            $sql = "SELECT `PatientName` FROM tblpatient WHERE ID='$searchBy'";
            $result = mysqli_fetch_array(mysqli_query($con,$sql));
            $arrayResponse = array('patientID' => $inputKey,'patientName'=> $result[0]['PatientName']);
            return json_encode($arrayResponse);
            break;
        case 'contact':
            global $con;
            $sql = "SELECT `ID`,`PatientName` FROM tblpatient WHERE PatientContno='$searchBy'";
            $result = mysqli_query($con,$sql);
            while ($row = mysqli_fetch_array($result)) {
                return $row['PatientName'].$inputKey."  ".$searchBy;
            }
            // $arrayResponse = array('patientID' => $result['ID'],'patientName'=> $result['PatientName']);
            // return json_encode($arrayResponse);
            break;
        
        default:
            global $con;
            $sql = "SELECT `ID`,`PatientName` FROM tblpatient WHERE adharCardNo='$searchBy'";
            $result = mysqli_fetch_array(mysqli_query($con,$sql));
            // $arrayResponse = array('patientID' => $result[0]['ID'],'patientName'=> $result[0]['PatientName']);
            echo $searchBy;
            // return json_encode($arrayResponse);
            break;
    }
}
echo getCustomerDetails($inputKey,$searchBy);
?>