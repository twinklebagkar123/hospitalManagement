<?php

include('include/config.php');
include('include/checklogin.php');
$id = $_POST['docID'];
$fromDate = $_POST['fromDate'];
$toDate = $_POST['toDate'];

?>
<h6>Your Appointments for the date: <?php echo $fromDate. " - ".$toDate ;?> are: </h6>
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
	<tbody>
		<?php
		$query = "select tblpatient.PatientName as fname,appointment.*  from appointment join tblpatient on tblpatient.ID=appointment.userId where appointment.doctorId='" . $id . "'";
		print_r($query);
		//$sql = mysqli_query($con, $query);
		$cnt = 1;
		while ($row = mysqli_fetch_array($sql)) {
		?>

			<tr>
				<td class="center"><?php echo $cnt; ?>.</td>
				<td class="hidden-xs"><?php echo $row['fname']; ?></td>
				<td><?php echo $row['doctorSpecialization']; ?></td>
				<td><?php echo $row['consultancyFees']; ?></td>
				<td><?php echo $row['appointmentDate']; ?> / <?php echo
																$row['appointmentTime']; ?>
				</td>
				<td><?php echo $row['postingDate']; ?></td>
				<td>
					<?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
						echo "Active";
					}
					if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 1)) {
						echo "Cancel by Patient";
					}

					if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 0)) {
						echo "Cancel by you";
					}
					if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 0)) {
						echo "Attending";
					}



					?></td>
				<td>
					<div class="visible-md visible-lg hidden-sm hidden-xs">
						<?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) { ?>


							<a href="appointment-history.php?id=<?php echo $row['id'] ?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')" class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Cancel</a>
						<?php } else {

							echo "Canceled";
						} ?>
					</div>
					<div class="visible-md visible-lg hidden-sm hidden-xs">
						<?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 0)) { ?>


							<a href="appointment-history.php?id=<?php echo $row['id'] ?>&attend=update" onClick="return confirm('Are you sure you want to attend this appointment ?')" class="btn btn-transparent btn-xs tooltips" title="Attend Appointment" tooltip-placement="top" tooltip="Remove">Attend</a>
						<?php } else {

							echo "Attending";
						} ?>
					</div>
				</td>
			</tr>

		<?php
			$cnt = $cnt + 1;
		} ?>


	</tbody>
</table>
