<?php 
require_once("include/config.php");
if(!empty($_POST["emailid"])) {
	$email= $_POST["emailid"];
	
		$result =mysqli_query($con,"SELECT docEmail FROM doctors WHERE docEmail='$email'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Email already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Email available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
if(!empty($_POST["med"])) {
	$med  = $_POST["med"];
	
		$result =mysqli_query($con,"SELECT medname FROM medicine_table WHERE medname='$med'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Medicine Already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Register as new medicine .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
