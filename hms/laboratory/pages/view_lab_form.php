<?php include('../include/header.php'); ?>
<div class="wrap-content container" id="container">
	<!-- start: PAGE TITLE -->
	<section id="page-title">
		<div class="row">
			<div class="col-sm-8">
				<h1 class="mainTitle">Admin | Admission Fee</h1>
			</div>
			<ol class="breadcrumb">
				<li>
					<span>Admin</span>
				</li>
				<li class="active">
					<span> Laboratory Form</span>
				</li>
			</ol>
		</div>
	</section>
	<!-- end: PAGE TITLE -->
	<!-- start: BASIC EXAMPLE -->
	<div class="container-fluid container-fullw bg-white">


		<div class="row">
			<div class="col-md-12">
				<h5 class="over-title margin-bottom-15">View <span class="text-bold">Form</span></h5>
				<p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
					<?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
				<table class="display" id="myTable">
					<thead>
						<tr>
							<th class="center">#</th>
							<th>lab Test Name </th>
							<th>lab Charges </th>
							<th>Action</th>

						</tr>
					</thead>
					<tbody>
						<?php
						$sql = mysqli_query($con, "SELECT * FROM laboratoryTestList ");
						$cnt = 1;
						while ($row = mysqli_fetch_array($sql)) {
						?>

							<tr>
								<td class="center"><?php echo $cnt; ?>.</td>
								<td><?php echo $row['labTestName']; ?></td>

								<td><?php echo $row['labCharges']; ?></td>


								<td>
									<div class="visible-md visible-lg hidden-sm hidden-xs">
										<a href="view_form.php?id=<?php echo $row['labFormID']; ?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-eye"></i></a>



										<a href="view_lab_form.php?id=<?php echo $row['labFormID'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
									</div>

								</td>
							</tr>

						<?php
							$cnt = $cnt + 1;
						} ?>


					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- end: BASIC EXAMPLE -->
<!-- end: SELECT BOXES -->

<?php include('include/footer.php'); ?>
<script>
$(document).ready(function() {
			$('#myTable').DataTable();
		});
		</script>