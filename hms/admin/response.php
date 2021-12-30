
<?php


$s=$_GET['start'];
$g=$_GET['length'];

$data = [
    [
        "Angelica",
        "Ramos",
        "System Architect",
        "London",
        "9th Oct 09",
        "$2,875"
    ],
    
   
    
];
            
 
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






