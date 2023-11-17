<?php
require_once("include/config.php");
if (!empty($_POST["emailid"])) {
	$email = $_POST["emailid"];

	$result = mysqli_query($con, "SELECT docEmail FROM doctors WHERE docEmail='$email'");
	$count = mysqli_num_rows($result);
	if ($count > 0) {
		echo "<span style='color:red'> Email already exists .</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	} else {

		echo "<span style='color:green'> Email available for Registration .</span>";
		echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}
if (!empty($_POST["nameTest"])) {
	$nameTest = $_POST["nameTest"];

	$result = mysqli_query($con, "SELECT labTestName FROM laboratoryTestList WHERE labTestName='$nameTest'");
	$count = mysqli_num_rows($result);
	if ($count > 0) {
		echo "<span style='color:red'> Test already exists .</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	} else {

		echo "<span style='color:green'> Test available for Registration .</span>";
		echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}
if (!empty($_POST["med"])) {
	$med  = $_POST["med"];

	$result = mysqli_query($con, "SELECT medname FROM medicine_table WHERE medname='$med'");
	$count = mysqli_num_rows($result);
	if ($count > 0) {
		echo "<span style='color:red'> Medicine Already exists .</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	} else {

		echo "<span style='color:green'> Register as new medicine .</span>";
		echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}
if (!empty($_POST["name"])) {
	$name  = $_POST["name"];

	$result = mysqli_query($con, "SELECT Name FROM nearbyAmbulance WHERE Name='$name'");
	$count = mysqli_num_rows($result);
	if ($count > 0) {
		echo "<span style='color:red'> Ambulance Already exists .</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	} else {

		echo "<span style='color:green'> Register as new Ambulance .</span>";
		echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}


//pattcontact

if (!empty($_POST["phone"])) {
	$phno = $_POST["phone"];
	//$qury = "SELECT ID FROM tblpatient WHERE PatientContno='$phno'";
	$result = mysqli_query($con, "SELECT * FROM tblpatient WHERE PatientContno='$phno'");
	$count = mysqli_num_rows($result);
	if ($count > 0) {
		//echo "<span style='color:red'> Contact Number  already exists .</span>";
		//echo "<script>$('#submit').prop('disabled',true);</script>";
		while ($row = mysqli_fetch_array($result)) {
			$data["name"] = $row["PatientName"];

			$data["address"] = $row["PatientAdd"];
			$data["gender"] = $row["PatientGender"];
			$data["email"] = $row["PatientEmail"];
			$data["age"] = $row["PatientAge"];
			$data["uid"] = $row["ID"];
			$data["adharCard"] = $row["adharCardNo"];
		}
	}

	//echo $qury;
	else {

		echo "<span style='color:green'> Contact Number for Registration .</span>";
		echo "<script>$('#submit').prop('disabled',false);</script>";
		//echo $qury;
	}
	echo json_encode($data);
}

//doctorSpecialization
if (!empty($_POST["doctorspecilization"])) {
	$doctorspecilization = $_POST["doctorspecilization"];

	$result = mysqli_query($con, "SELECT specilization FROM `doctorspecilization` WHERE specilization = '$doctorspecilization'");
	$count = mysqli_num_rows($result);
	if ($count > 0) {
		echo "<span style='color:red'> Specilization already exists .</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	} else {

		echo "<span style='color:green'> Specilization available for Registration .</span>";
		echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}
