<?php 
require_once("include/config.php");
if(!empty($_POST["med"])) {
	$med= $_POST["med"];
	
        $result =mysqli_query($con,"SELECT medname FROM medicine_table WHERE medname LIKE '%$med%'");
		$count=mysqli_num_rows($result);
if($count>0)
{
    while ($row=mysqli_fetch_array($result)) {
    
   
  echo" <div class='chip'> <span class='mr-2' data-name='".$row['medname']."'>".$row['medname']."</span></div>";

    
// echo "<span style='color:red'> Email already exists .</span>";
//  echo "<script>$('#submit').prop('disabled',true);</script>";
}
} else{
	
    echo "<span class='label label-danger'>No Medicine Found</span>";
}
}


?>
