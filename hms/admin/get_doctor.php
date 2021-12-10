


<?php
include('include/config.php');
if(!empty($_POST["specilizationid"])) 
{

 $sql=mysqli_query($con,"select doctorName,id from doctors where specilization='".$_POST['specilizationid']."'");?>
 <option selected="selected">Select Doctor </option>
 <?php
 while($row=mysqli_fetch_array($sql))
 	{?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['doctorName']); ?></option>
  <?php
}
}


if(!empty($_POST["doctor"])) 
{

 $sql=mysqli_query($con,"select docFees from doctors where id='".$_POST['doctor']."'");
 while($row=mysqli_fetch_array($sql))
 	{?>
 <option value="<?php echo htmlentities($row['docFees']); ?>"><?php echo htmlentities($row['docFees']); ?></option>
  <?php
}
}

if(!empty($_POST["appDate"])) 

{
$appDate= $_POST["appDate"];
$docId= $_POST["docID"];
$sql="SELECT tblp.PatientName,doc.doctorName,apt.appointmentTime FROM appointment as apt INNER JOIN tblpatient AS tblp ON apt.userId = tblp.ID INNER JOIN doctors AS doc ON apt.doctorId = doc.id Where apt.doctorId = '$docId' AND apt.appointmentDate= '$appDate';";
$result=mysqli_query($con,$sql);


//strt

?>

<table class="table table-hover" id="sample-table-1">
	<thead>
		<tr>
			<th class="center">#</th>
			<th class="hidden-xs">Patient Name</th>
			
			<th>Doctor Name </th>
			<th>Appointment Time </th>
	
		</tr>
	</thead>
	<tbody>
<?php
$cnt=1;
  while($row=mysqli_fetch_array($result))
  	{
// echo $appDate;
?>
<tr>
<td class="center"><?php echo $cnt;?>.</td>
<td class="hidden-xs"><?php echo $row['PatientName'];?></td>
<td class="hidden-xs"><?php echo $row['doctorName'];?></td>

<td><?php echo $row['appointmentTime'];?> 
</td>
</tr>


			
	
		
		<?php 
$cnt++;
		 }?>
		
		
	</tbody>
</table>

  <?php
}







?>

