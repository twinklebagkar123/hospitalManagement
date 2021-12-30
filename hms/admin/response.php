
<?php

session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$data = ["hello"];
$s=$_GET['start'];
$g=$_GET['length'];
$query="SELECT * FROM `tblpatient` WHERE `ID` >= ".$s." ORDER BY `ID` ASC LIMIT ".$g;
$sql = mysqli_query($con, $query);
										
										while ($row = mysqli_fetch_array($sql)) {
										print_r($row);
                      
                    //   $ID=$row['ID']; 
										// $PatientName=	 $row['PatientName']; 
										// 	 $PatientContno= $row['PatientContno']; 
										// 	 $PatientGender= $row['PatientGender']; 
                    //    $CreationDate= $row['CreationDate']; 
                    //    $UpdationDate= $row['UpdationDate']; 
                      
                    //    $result=array($ID,$PatientName,$PatientContno,$PatientGender,$CreationDate,$UpdationDate);
                       

											
										
									
													} 

// $data = [
//     [
//         "Angelica",
//         "Ramos",
//         "System Architect",
//         "London",
//         "9th Oct 09",
//         "$2,875"
//     ],
    
   
    
// ];
            
array_push($data,$query);
$results = array(
    "start"=>$s,
    "lengh"=>$g,
            "recordsTotal" => 100,
        "recordsFiltered" => 100,
        
          "data"=>$data);
/*while($row = $result->fetch_array(MYSQLI_ASSOC)){
  $results["data"][] = $row ;
}*///
 
echo json_encode($results);



?>


<!-- 


$book =`<button type="button" data-pid="<?php //echo row['ID']; ?>" data-name="<?php //echo $row['PatientName']; ?>" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Book</button>`;


										

$viewdata=	`<a href="view-patient.php?viewid=<?php //echo $row['ID']; ?>"><i class="fa fa-eye"></i></a>`; -->
