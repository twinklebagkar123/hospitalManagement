<?php
include('include/header_structured.php');
if (isset($_GET['del'])) {
	mysqli_query($con, "delete from tariff_room_info where tariff_room_id = '" . $_GET['id'] . "'");
	$_SESSION['msg'] = "data deleted ! !!";
}
?>
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">Admin | View Packages</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>View</span>
								</li>
								<li class="active">
									<span> Packages</span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">


						<div class="row">
							<div class="col-md-12">
								<h5 class="over-title margin-bottom-15">View <span class="text-bold">Package</span></h5>
								<p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
									<?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
								<table class="display" id="myTable">
									<thead>
										<tr>
											<th class="center">#</th>
											<th>Tariff Category</th>
											<th>Tariff class</th> </th>	
											<th>Package Name</th>
											<th>Total Price</th>
											<th> Distributed fee </th>
											<th>Action</th>

										</tr>
									</thead>
									<tbody>
										<?php
										$sql = mysqli_query($con, "SELECT * FROM `tariff_room_info` INNER JOIN tariff_category ON tariff_category.tariff_cat_id=tariff_room_info.tariff_cat_id INNER JOIN tariff_class ON tariff_class.tariff_class_id=tariff_room_info.tariff_class_type_id;");
										$cnt = 1;
										while ($row = mysqli_fetch_array($sql)) {
										?>

											<tr>
												<td class="center"><?php echo $cnt; ?>.</td>
												<td class="hidden-xs"><?php echo $row['tariff_cat_name']; ?></td>
												<td class="hidden-xs"><?php echo $row['tariff_class_name']; ?></td>
												<td class="hidden-xs"><?php echo $row['tariff_room_name']; ?></td>
												<td><?php echo $row['tariff_room_fee']; ?></td>
												<td><?php
												if(!empty($row['tariff_fee_distribution'])):
													$feeDistribution = json_decode($row['tariff_fee_distribution']);
													
													echo "Hospitalition: ".$feeDistribution[0]->hospitalisation;
													echo	"  Medical Officer: " .$feeDistribution[0]->medofficer;
													echo "  Nursing :" 	.$feeDistribution[0]->nursing; 
												endif;
						

												



													?>
												</td>

												<td>
													<div class="visible-md visible-lg hidden-sm hidden-xs">
														<form action="edit_package.php" method="post"  enctype="multipart/form-data">
														
														<input type="hidden" name="tariff_cat_name" value="<?php echo $row['tariff_cat_name']; ?>">
														<input type="hidden" name="tariff_class_name" value="<?php echo $row['tariff_class_name']; ?>">
														<input type="hidden" name="tariff_room_name" value="<?php echo $row['tariff_room_name']; ?>">
														<input type="hidden" name="tariff_room_fee" value="<?php echo $row['tariff_room_fee']; ?>">
														<input type="hidden" name="isFeeDistributed" value="<?php echo $row['is_fee_distributed']; ?>">

														<input type="hidden" name="tariff_fee_distribution" value='<?php echo $row['tariff_fee_distribution']; ?>'>
														<input type="hidden" name="tariff_room_id" value="<?php echo $row['tariff_room_id']; ?>">



														<input type="submit" class="btn btn-transparent btn-xs" value="Edit" tooltip-placement="top" tooltip="Edit">
														
													
													</form>
														<a href="view_package.php?id=<?php echo $row['tariff_room_id'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
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
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

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
		});
	</script>
	<script>
		$(document).ready(function() {
			$('#myTable').DataTable();
		});
	</script>
	<!-- end: JavaScript Event Handlers for this page -->
	<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>