<?php

include('include/config.php');
include('include/checklogin.php');
$id = $_POST['docID'];
$fromDate = $_POST['fromDate'];
$toDate = $_POST['toDate'];

?>
<!-- <h6>Your Appointments for the date: <?php echo $fromDate. " - ".$toDate ;?> are: </h6>
<table class="table table-hover" id="sample-table-1">
	<thead>
		<tr>
			<th class="center">#</th>
			<th class="hidden-xs">Patient Name</th>
			<th>Specialization</th>
			<th>Consultancy Fee</th>
			<th>Appointment Date / Time </th>
			<th>Appointment Creation Date </th>
			<th>Current Status</th>
			<th>Action</th>

		</tr>
	</thead>
	<tbody> -->
		<?php
		$query = "select tblpatient.PatientName as fname,appointment.*  from appointment join tblpatient on tblpatient.ID=appointment.userId where appointment.doctorId='" . $id . "'";
		print_r($query);
		//$sql = mysqli_query($con, $query);
        ?>
