<?php 
require_once("include/config.php");
if(!empty($_POST["phone"])) {
	$phone= $_POST["phone"];
	
		$result =mysqli_query($con,"SELECT phoneNumber FROM users WHERE phoneNumber='$phone'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Number already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> User available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
