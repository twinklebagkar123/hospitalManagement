<?php
include "../include/config.php";
$con;
$inputKey = $_POST['inputKey'];
$searchBy = $_POST['searchBy'];

function getCustomerDetails($inputKey,$searchBy){
    switch ($searchBy) {
        case 'id':
            global $con;
            $sql = "SELECT `PatientName` FROM tblpatient WHERE ID='$inputKey'";
            $result = mysqli_fetch_array(mysqli_query($con,$sql));
            $arrayResponse = array('patientID' => $inputKey,'patientName'=> $result['PatientName'],'multiResult' => false);
            return json_encode($arrayResponse);
            break;
        case 'contact':
            global $con;
            $sql = "SELECT `ID`,`PatientName` FROM tblpatient WHERE PatientContno='$inputKey'";
            $mysqlResult = mysqli_query($con,$sql);
            $num=mysqli_num_rows($mysqlResult);
            if($num > 1){
                $allResults = [];
                while($row=mysqli_fetch_array($mysqlResult)){
                    $output = array('patientID' => $row['ID'],'patientName'=> $row['PatientName'],'multiResult' => true);
                    array_push($allResults,$output);
                }
                return json_encode($allResults);
            }else{
                $row=mysqli_fetch_array($mysqlResult);
                return json_encode(array('patientID' => $row['ID'],'patientName'=> $row['PatientName'],'multiResult' => false));
            }
            break;
        case 'Patientdob':
            global $con;
            $sql = "SELECT `ID`,`PatientName` FROM tblpatient WHERE Patientdob='$inputKey'";
            $mysqlResult = mysqli_query($con,$sql);
            $num=mysqli_num_rows($mysqlResult);
            if($num > 1){
                $allResults = [];
                while($row=mysqli_fetch_array($mysqlResult)){
                    $output = array('patientID' => $row['ID'],'patientName'=> $row['PatientName'],'multiResult' => true);
                    array_push($allResults,$output);
                }
                return json_encode($allResults);
            }else{
                $row=mysqli_fetch_array($mysqlResult);
                return json_encode(array('patientID' => $row['ID'],'patientName'=> $row['PatientName'],'multiResult' => false));
            }
            break;     
        default:
            global $con;
            $sql = "SELECT `ID`,`PatientName` FROM tblpatient WHERE adharCardNo='$inputKey'";
            $result = mysqli_fetch_array(mysqli_query($con,$sql));
            $arrayResponse = array('patientID' => $result['ID'],'patientName'=> $result['PatientName'],'multiResult' => false);
            return json_encode($arrayResponse);
            break;
    }
}
echo getCustomerDetails($inputKey,$searchBy);
?>