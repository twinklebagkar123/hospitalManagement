
<?php

$data = [];
$s=$_GET['start'];
$g=$_GET['length'];
$sql = mysqli_query($con, "SELECT * FROM `tblpatient` WHERE `ID` >= $s ORDER BY `ID` ASC LIMIT $g");
										
										while ($row = mysqli_fetch_array($sql)) {
										
                      
                      $ID=$row['ID']; 
										$PatientName=	 $row['PatientName']; 
											 $PatientContno= $row['PatientContno']; 
											 $PatientGender= $row['PatientGender']; 
                       $CreationDate= $row['CreationDate']; 
                       $UpdationDate= $row['UpdationDate']; 
                      
                       $result=array($ID,$PatientName,$PatientContno,$PatientGender,$CreationDate,$UpdationDate);
                       array_push($data,$result);

											
										
									
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
