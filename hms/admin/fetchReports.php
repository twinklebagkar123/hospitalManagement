<?php
require_once("include/config.php");
$html = "";
if (!empty($_POST['admissionid'])) {
    $admissionid = $_POST['admissionid'];
    $admission = $_POST['admission'];
    $discharge = $_POST['discharge'];
    $vid = $_POST['vid'];
    // BS Dates
    $period = new DatePeriod(
        new DateTime($admission),
        new DateInterval('P1D'),
        new DateTime($discharge)
    );
    $bsDates = array();


    foreach ($period as $key => $value) {
        array_push($bsDates, $value->format('Y-m-d'));
    }
    //BS TYPES AND DATA
    $queryBSTypes = "SELECT DISTINCT BSType FROM tblmedicalhistory";
    $resultTypes = $con->query($queryBSTypes);

    $data = array();
    $type = array();
    while ($rowTypes = $resultTypes->fetch_assoc()) {
        //$i = 1;
         array_push($type,$rowTypes["BSType"]) ;

        // if ($type != "") {
        // 	$query2 = "SELECT  `BloodSugar`,`CreationDate` FROM `tblmedicalhistory` WHERE BSType='" . $type . "' AND PatientID='$vid'";

        // 	$result1 = $con->query($query2);
        // 	$x = 0;
        // 	while ($row2 = $result1->fetch_assoc()) {
        // 	$value = $row2["BloodSugar"];
        // 	$data = array_push_assoc($data, $type, $value, $x);
        // 	$x++;
        // 	}
        // }
        //$i++;
    }
    //print_r($type);
    function array_push_assoc($array, $key, $sugarLevel, $x)
    {
    $array[$key][$x] = $sugarLevel;
    return $array;
    }
    $x=0;
    foreach ($bsDates as  $value) {
        
        foreach ($type as  $valueType) {
            if ($valueType != "") {
                $query2 = "SELECT  `BloodSugar`,`CreationDate` FROM `tblmedicalhistory` WHERE BSType='" . $valueType . "' AND CreationDate LIKE '" . $value .'%'. "' AND PatientID='$vid'";
               
                $result1 = $con->query($query2);
               // $z = 0;
               //echo $valueType."<br>";
               $valueSugar = 0;
                // if($row3 = $result1->fetch_assoc()){
                    while ($row3 = $result1->fetch_assoc()) {
                            
                            $valueSugar = $row3["BloodSugar"];
                           
                           // $data = array_push_assoc($data, $valueType, $valueSugar, $x);
                     
                    //$z++;
                    }
                   // echo $valueSugar.":Sugar, Type:".$valueType."<br>";
                    $data = array_push_assoc($data, $valueType, $valueSugar, $x);
              //  }
                // else{
                //   //  echo $valueSugar.":Sugar, Type:".$valueType."<br>";
                //     $data = array_push_assoc($data, $valueType, $valueSugar, $x);
                // }
                
            }
           
        }
        $x++;
    }
    
   print_r($data);

    //medical History 
    $query = "SELECT * FROM `tblmedicalhistory` WHERE admissionID = '$admissionid'";
    $result1 = $con->query($query);
    $html = '<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <tr align="center">
        <th colspan="8">Medical History</th>
    </tr>
    <tr>
        <th>#</th>
        <th>Blood Pressure</th>
        <th>Weight</th>
        <th>Blood Sugar</th>
        <th>Body Temprature</th>
        <th>Medical Prescription</th>
        <th>Visit Date</th>
    </tr>';
    $tpr = array();
    $visit = array();
    $tprDate = array();
    $cnt = 1;
    while ($row = mysqli_fetch_array($result1)) {
        if ($row['Temperature']) {
            array_push($tpr, $row['Temperature']);
            array_push($tprDate, $row['CreationDate']);
        }
        // array_push($tpr,$row['Temperature']);
        // array_push($visit,$row['CreationDate']);

        $html = $html . '  <tr> <td>' . $cnt . '</td> <td>' . $row['BloodPressure'] . '</td> <td>' . $row['Weight'] . '</td>
            <td>' . $row['BloodSugar'] . '</td> <td>' . $row['Temperature'] . '</td><td>' . $row['MedicalPres'] . '</td> <td>' . $row['CreationDate'] . '</td>
        </tr>';
        $cnt++;
    }
    $html = $html . '</table>';
    $result["html"] = $html;
    $result['tpr'] = $tpr;
    $result['tprDate'] = $tprDate;
    $result['bsDates'] = $bsDates;
    $result['sugarReads'] = $data;
    // $query = "SELECT DISTINCT BSType FROM tblmedicalhistory";
    // 		$result = $con->query($query);
    // 		//$result=mysqli_query($con,"SELECT DISTINCT BSType FROM tblmedicalhistory");
    // 		$data = array();
    // 		while ($row = $result->fetch_assoc()) {
    // 		$i = 1;
    // 		$type = $row["BSType"];
    // 		if ($type != "") {
    // 			$query2 = "SELECT  `BloodSugar`,`CreationDate` FROM `tblmedicalhistory` WHERE BSType='" . $type . "' AND PatientID='$vid'";

    // 			$result1 = $con->query($query2);
    // 			$x = 0;
    // 			while ($row2 = $result1->fetch_assoc()) {
    // 			$value = $row2["BloodSugar"];
    // 			$data = array_push_assoc($data, $type, $value, $x);
    // 			$x++;
    // 			}
    // 		}
    // 		$i++;
    // 		}
    // 		function array_push_assoc($array, $key, $value, $x)
    // 		{
    // 		$array[$key][$x] = $value;
    // 		return $array;
    // 		}
    echo json_encode($result);
}
