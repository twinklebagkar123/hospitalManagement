<?php
include('include/header_structured.php');
$vid = intval($_GET['tariff_room_id']); // get room id
?>
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">

								<div class="row margin-top-30">
									<div class="col-lg-8 col-md-12">
										<div class="packageSelection">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Package Selection</h5>
												</div>
												<div class="panel-body">

													<form role="form" action="" method="post">

														<div class="form-group">
															<label for="doctor">
																Tariff Class
															</label>
															<select name="tariff_class_name" class="form-control" id="tariff_class_name" required="true">
																<option value="">Select Tariff Class</option>
																<?php $ret = mysqli_query($con, "SELECT * FROM `tariff_class` where 1");
																while ($row = mysqli_fetch_array($ret)) {
																	$classdata = $row['tariff_class_id'] . "|" . $row['tariff_class_name'];
																?>
																	<option value="<?php echo $classdata; ?>">
																		<?php echo htmlentities($row['tariff_class_name']); ?>
																	</option>
																<?php } ?>
															</select>
														</div>

														<div class="form-group">
															<label for="doctor">
																Tariff Category
															</label>
															<select name="tariff_cat_id" class="form-control" id="tariff_cat_id" required="true">
																<option value="">Select Tariff Category</option>
																<?php $ret = mysqli_query($con, "SELECT * FROM tariff_category where 1");
																while ($row = mysqli_fetch_array($ret)) {
																	$catdata = $row['tariff_cat_id'] . "," . $row['tariff_cat_name'];
																?>
																	<option value="<?php echo $catdata; ?>">
																		<?php echo htmlentities($row['tariff_cat_name']); ?>
																	</option>
																<?php } ?>
															</select>
														</div>




														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Submit
														</button>
													</form>
												</div>
												<?php
												if (isset($_POST['tariff_cat_id'])) {

													$sdata = $_POST['tariff_cat_id'];
													//$cat=$_POST['tariff_cat_name'];
													$cdata = $_POST['tariff_class_name'];
													$explodedClassData = explode("|", $cdata);
													//echo "category id: ".$sdata." class id : ".$explodedClassData[0]." className: ".$explodedClassData[1];
													$explodedCatData = explode(",", $sdata);
													//echo "category id: ".$sdata." class id : ".$explodedCatData[0]." catName: ".$explodedCatData[1];
												?>
													<!-- <h4 align="center">Result against  </h4> -->
													<table class="table table-hover" id="sample-table-1">
														<thead>

															<tr>
																<th>ID</th>
																<th>name</th>
																<th>Fee distribution</th>
																<th>total price</th>

																<th>Action</th>
															</tr>
														</thead>
														<tbody id="hello">
															<?php

															$sql = mysqli_query($con, "select * from tariff_room_info where tariff_cat_id = '$sdata' AND tariff_class_type_id = '$cdata'");
															$num = mysqli_num_rows($sql);
															if ($num > 0) {
																$cnt = 1;
																while ($row = mysqli_fetch_array($sql)) {
															?>
																	<tr>



																		<td><?php echo $row['tariff_room_id']; ?></td>
																		<td><?php echo $row['tariff_room_name']; ?></td>
																		<td><button type="button" data-admissionID="<?php echo $row['unqId']; ?>" class="btn btn-primary assignTest" data-toggle="modal" data-target="#myModal">view</button></td>
																		<td><?php echo $row['tariff_room_fee']; ?></td>


																		</td>
																		<td>
																			<button id="selectId" class=" btn btn-primary" style="padding: 0px 10px;">Select</button>


																		</td>
																	</tr>
																<?php
																	$cnt = $cnt + 1;
																}
															} else { ?>
																<tr>
																	<td colspan="8"> No record found against this search</td>

																</tr>

														<?php }
														} ?>
														</tbody>
													</table>


											</div>
										</div>
										<div id="displayResults" style="display:none;">

											<h2> The class is <?php
																echo $explodedClassData[1];
																echo "</br>";


																?> </h2>
											<input type="hidden" id="packageId" autocomplete="off">
											<h2>The Category is<?php echo $explodedCatData[1]; ?></h2>
											<h3>Package : <p id="roomName"></p>
											</h3>
											<h3>Total : <p id="total"></p>
											</h3>
											<div></div>


										</div>
									</div>


								</div>
							</div>








						</div>
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
			<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
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
			});
		</script>
		<script>
			$(document).ready(function() {
				var className = $('#tariff_class_name').change(function() {
					console.log($(this));

				});
				var medList = [];

				$(document).on("click", "#selectId", function() {
					$('.packageSelection').css("display", "none");





					var medRow = $(this).parent().parent().closest('tr').find('td').first().text();
					var medIndex = medList.map(function(e) {
						return e.medicineName;
					}).indexOf(medRow);
					medList.splice(medIndex, 1);

					$('#medicinePrescription').val(JSON.stringify(medList));
					var id = $(this).parent().parent().closest('tr').children().first()[0].innerText;
					var roomName = $(this).parent().parent().closest('tr').children().eq(1)[0].innerText;
					var totalPrice = $(this).parent().parent().closest('tr').children().eq(3)[0].innerText;

					$('#packageId').val(id);
					$('#roomName').text(roomName);
					$('#total').text(totalPrice);


					$('#displayResults').css("display", "block");




				});
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>