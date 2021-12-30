
<?php


$s=$_GET['start'];
$g=$_GET['length'];
$sql = mysqli_query($con, "SELECT * FROM `tblpatient` WHERE `ID` >= '$S' ORDER BY `ID` ASC LIMIT '$g'");
										$cnt = 1;
										while ($row = mysqli_fetch_array($sql)) {
										?>
											<tr>
												<td class="center"><?php echo $cnt; ?>.</td>
												<td class="hidden-xs"><?php echo $row['PatientName']; ?></td>
												<td><?php echo $row['PatientContno']; ?></td>
												<td><?php echo $row['PatientGender']; ?></td>
												<td><?php echo $row['CreationDate']; ?></td>
												<td><?php echo $row['UpdationDate']; ?>
												</td>

												<td><button type="button" data-pid="<?php echo $row['ID']; ?>" data-name="<?php echo $row['PatientName']; ?>" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
														Book
													</button></td>


												<td>

													<a href="view-patient.php?viewid=<?php echo $row['ID']; ?>"><i class="fa fa-eye"></i></a>

												</td>
											</tr>
										<?php
											$cnt = $cnt + 1;
										} 

$data = [
    [
       
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






