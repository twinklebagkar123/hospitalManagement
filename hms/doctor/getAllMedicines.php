<?php 
require_once("include/config.php");
if(!empty($_POST["med"])) {
	$med= $_POST["med"];
	
        $result =mysqli_query($con,"SELECT code,medname FROM medicine_table WHERE medname LIKE '%$med%'");
		$count=mysqli_num_rows($result);
if($count>0)
{
    while ($row=mysqli_fetch_array($result)) {
    
   ?>
   <?php
    echo "<span class='label label-warning mr-2' data-pillID='".$row['code']."'  data-name='".$row['medname']."'>".$row['medname']."</span>";
    
// echo "<span style='color:red'> Email already exists .</span>";
//  echo "<script>$('#submit').prop('disabled',true);</script>";
}
} else{
	
    echo "<span class='label label-danger'>No Medicine Found</span>";
}
}


?>
