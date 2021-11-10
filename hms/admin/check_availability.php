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

//pattcontact

if(!empty($_POST["phone"])) {
	$phno= $_POST["phone"];
	 //$qury = "SELECT ID FROM tblpatient WHERE PatientContno='$phno'";
		$result =mysqli_query($con,"SELECT * FROM tblpatient WHERE PatientContno='$phno'");
		$count=mysqli_num_rows($result);
if($count>0)
{
//echo "<span style='color:red'> Contact Number  already exists .</span>";
 //echo "<script>$('#submit').prop('disabled',true);</script>";
  while($row = mysqli_fetch_array($result))
 {
  $data["name"] = $row["PatientName"];
 
  $data["address"] = $row["PatientAdd"];
  $data["gender"] = $row["PatientGender"];
 
  $data["email"] = $row["PatientEmail"];
  $data["age"] = $row["PatientAge"];
 }

}

 //echo $qury;
 else{
	
	echo "<span style='color:green'> Contact Number for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
 //echo $qury;
}
 echo json_encode($data);
}





?>
