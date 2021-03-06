<?php
include('include/header_structured.php');
if (isset($_POST['submit'])) {

	$name = $_POST['name'];
	$price = $_POST['price'];
	$sql = mysqli_query($con, "INSERT INTO `procedureList`( `name`, `charges`) VALUES ('$name','$price')");
	if ($sql) {
		echo "<script>alert('Data added Successfully');</script>";
		echo "<script>window.location.href ='addProcedure.php'</script>";
	}
}

?><script type="text/javascript">
	function valid() {
		if (document.adddoc.npass.value != document.adddoc.cfpass.value) {
			alert("Password and Confirm Password Field do not match  !!");
			document.adddoc.cfpass.focus();
			return false;
		}
		return true;
	}

	function checkemailAvailability() {
		$("#loaderIcon").show();
		jQuery.ajax({
			url: "check_availability.php",
			data: 'name=' + $("#name").val(),
			type: "POST",
			success: function(data) {
				$("#email-availability-status").html(data);
				$("#loaderIcon").hide();
			},
			error: function() {}
		});
	}
</script>


<div class="wrap-content container" id="container">
	<!-- start: PAGE TITLE -->
	<section id="page-title">
		<div class="row">
			<div class="col-sm-8">
				<h1 class="mainTitle">Admin | Operation Procedure</h1>
			</div>
			<ol class="breadcrumb">
				<li>
					<span>Operation</span>
				</li>
				<li class="active">
					<span>Procedure</span>
				</li>
			</ol>
		</div>
	</section>
	<!-- end: PAGE TITLE -->
	<!-- start: BASIC EXAMPLE -->
	<div class="container-fluid container-fullw bg-white">
		<div class="row">
			<div class="col-md-12">

				<div class="row margin-top-30">
					<div class="col-lg-8 col-md-12">
						<div class="panel panel-white">
							<div class="panel-heading">
								<h5 class="panel-title">Procedure Details</h5>
							</div>
							<div class="panel-body">

								<form role="form" name="addmed" method="post" onSubmit="return valid();">

									<div class="form-group">
										<label for="name">
											Procedure Name:
										</label>

										<input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" required="true" onchange="checkemailAvailability()">
										<span id="email-availability-status"></span>

									</div>
									<div class="form-group">
										<label>
											Price:
										</label>
										<input type="text" id="ph" name="price" class="form-control" placeholder="Enter Phone No." required="true">


									</div>



									<button type="submit" name="submit" class="btn btn-o btn-primary">
										Submit
									</button>
								</form>
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="col-lg-12 col-md-12">
				<div class="panel panel-white allMedicines">


				</div>
			</div>



			<div class="container-fluid container-fullw bg-white">


				<div class="row">
					<div class="col-md-12">
						<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Procedures</span></h5>
						<p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
							<?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
						<table class="table table-hover" id="sample-table-1">
							<thead>
								<tr>
									<th class="center">#</th>
									<th>Name</th>
									<th>Charges</th>

									<th>Action</th>

								</tr>
							</thead>
							<tbody id="delete">
								<?php
								$sql = mysqli_query($con, "select * from procedureList");
								$cnt = 1;
								while ($row = mysqli_fetch_array($sql)) {
								?>

									<tr>
										<td class="center"><?php echo $cnt; ?>.</td>
										<td><?php echo $row['name']; ?></td>
										<td><?php echo $row['charges']; ?></td>

										<td>
											<div class="visible-md visible-lg hidden-sm hidden-xs">
												<a href="editProcedure.php?id=<?php echo $row['procedureID']; ?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>
												<!-- add-medicine.php?code=<?php //echo $row['code']
																			?>&del=delete										 -->
												<a href="#" class="btn btn-transparent btn-xs tooltips dellClass " data-id='<?php echo $row['procedureID']; ?>' id="del" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
											</div>
											<div class="visible-xs visible-sm hidden-md hidden-lg">
												<div class="btn-group" dropdown is-open="status.isopen">
													<button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
														<i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
													</button>
													<ul class="dropdown-menu pull-right dropdown-light" role="menu">
														<li>
															<a href="#">
																Edit
															</a>
														</li>
														<li>
															<a href="#">
																Share
															</a>
														</li>
														<li>
															<a href="#">
																Remove
															</a>
														</li>
													</ul>
												</div>
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
	</div>
</div>
</div>
</div>
</div>
<!-- end: BASIC EXAMPLE -->






<!-- end: SELECT BOXES -->

</div>
</div>
</div>
<!-- start: FOOTER -->
<?php include('include/footer.php'); ?>
<!-- end: FOOTER -->

<!-- start: SETTINGS -->
<?php include('include/setting.php'); ?>

<!-- end: SETTINGS -->
</div>
<!-- start: MAIN JAVASCRIPTS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/modernizr/modernizr.js"></script>
<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="vendor/switchery/switchery.min.js"></script>

<!-- end: MAIN JAVASCRIPTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="vendor/autosize/autosize.min.js"></script>
<script src="vendor/selectFx/classie.js"></script>
<script src="vendor/selectFx/selectFx.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- start: CLIP-TWO JAVASCRIPTS -->
<script src="assets/js/main.js"></script>
<!-- start: JavaScript Event Handlers for this page -->
<script src="assets/js/form-elements.js"></script>
<script>
	jQuery(document).ready(function() {
		Main.init();
		FormElements.init();
		$('#delete').on("click", ".dellClass", function() {
			console.log("heyyyy");


			var deleteid = $(this).data('id');
			console.log(deleteid);
			var confirmalert = confirm("Are you sure?");
			if (confirmalert == true) {
				// AJAX Request
				$.ajax({
					url: 'delete.php',
					type: 'POST',
					data: {
						procedureID: deleteid
					},
					success: function(response) {

						if (response == 1) {
							// Remove row from HTML Table
							$(el).closest('tr').fadeOut(800, function() {
								$(this).remove();
							});
						} else {
							alert('Invalid ID.');
						}

					}
				});
			}

		});

	});
</script>
<!-- end: JavaScript Event Handlers for this page -->
<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>