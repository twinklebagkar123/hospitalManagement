<?php
include('include/header_structured.php');

		print_r($_POST['tariff_cat_name']); 
		
		if(isset($_POST['submit']))
{
	
   $id3=$_POST['tariff_room_id'];

	$tariff_cat_id=$_POST['tariff_cat_id'];
	$tariff_class_name=$_POST['tariff_class_name'];
    $roomn=$_POST['roomn'];
	$total=$_POST['total'];
	$feeDistribution=$_POST['feeDistribution'];
	$is_fee_distributed=$_POST['isFeeDistributed'];
   
	

	$query = "UPDATE `tariff_room_info` SET  `tariff_cat_id`='$tariff_cat_id',`tariff_class_type_id`='$tariff_class_name', `tariff_room_name`=' $roomn',`tariff_room_fee`='$total',`tariff_fee_distribution`='$feeDistribution',`is_fee_distributed`=' $is_fee_distributed' WHERE tariff_room_id='$id3' ";
	print_r($query);
	$con->query($query);
	$stat = true;
	if($stat)
	{
		echo "<script>alert('Successfully Edited.');</script>";
	}
}
		
		
		?>

		
<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
                        <div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">

								<div class="row margin-top-30">
									<div class="col-lg-8 col-md-12">
										<div class="panel panel-white">
											<div class="panel-heading">
												<h5 class="panel-title">Add Tariff Class</h5>
											</div>
											</div>
											<div class="panel-body">

											<form method="POST" action="" id="package_submit" >
												<input type="hidden" name="tariff_room_id" value="<?php echo $_POST['tariff_room_id']; ?>" >

											<div class="form-group">
														<label for="">
															Tariff Category
														</label>
														<select name="tariff_cat_id" class="form-control" id="tariff_cat_id" required="true">
															<option value=" ">Select Tariff Category</option>
															<?php $ret = mysqli_query($con, "SELECT * FROM tariff_category where 1");
															while ($row = mysqli_fetch_array($ret)) {
															?>
																<option value="<?php echo htmlentities($row['tariff_cat_id']); ?>" <?php if($row['tariff_cat_name']==$_POST['tariff_cat_name']): echo "selected"; endif; ?>>
																	<?php echo htmlentities($row['tariff_cat_name']); ?>
																</option>
															<?php } ?>
														</select>
													</div>
													

                                                    <div class="form-group">
														<label for="doctor">
															Tariff Class
														</label>
														<select name="tariff_class_name" class="form-control" id="tariff_class_name" required="true">
															<option value="">Select Tariff Class</option>
															<?php $ret = mysqli_query($con, "SELECT * FROM `tariff_class` where 1");
															while ($row = mysqli_fetch_array($ret)) {
															?>
																<option value="<?php echo htmlentities($row['tariff_class_id']); ?>"<?php if($row['tariff_class_name']==$_POST['tariff_class_name']): echo "selected"; endif; ?>>
																	<?php echo htmlentities($row['tariff_class_name']); ?>
																</option>
															<?php } ?>
														</select>



													<div class="form-group">
														<label for="name">
															Room Name:
														</label>

														<input type="text" id="roomn" value="<?php echo $_POST['tariff_room_name'];?>" name="roomn" class="form-control" placeholder="Enter Room Name" required="true" >
														

													</div>
													
                                                    <div class="form-group">
														<label>
															Total:
														</label>
														<input type="text" name="total" value="<?php echo $_POST['tariff_room_fee'];?>" class="form-control" placeholder="total" required="true">
														

													</div>
													
                                                    <div class="wrapperDiv">
													
													
													<input type="checkbox" id="isFeeDistributed"   name="isFeeDistributed" value="1" <?php if(!empty($_POST['tariff_fee_distribution'])): echo "checked"; endif;?>>
													<label > Fee Distribution</label>
										
                                    <!-- <div id="medicalResult"></div>-->
                                    <input type="hidden" name="feeDistribution" id="feeDistribution" value=""> 
                                    <div class="feeDistribution" style=" <?php if(empty($row['tariff_fee_distribution']) ):  echo "display:none"; endif;?> margin-bottom: 8px;">
									<div class="row">
                                  <?php
								  if(!empty($_POST['tariff_fee_distribution'])):
									
								 $feeDistribution = json_decode($_POST['tariff_fee_distribution']); 
								  endif;
								 ?>

<input type="hidden" name="tariff_fee_distribution" value='<?php echo $_POST['tariff_fee_distribution']; ?>' >

<div class="col-md-4">
									  HOSPITALISATION
                                        <input type="text" id="hospitalisation" value="<?php if(!empty($_POST['tariff_fee_distribution'])): echo $feeDistribution[0]->hospitalisation; endif;?>"  class="form-control" autocomplete="off" style="margin-bottom: 5px;">

                                      </div>
                                      <div class="col-md-4">
                                      MEDICAL OFFICER
                                        <input type="text" id="medofficer" value="<?php if(!empty($_POST['tariff_fee_distribution'])): echo $feeDistribution[0]->medofficer; endif;?>"  class="form-control " autocomplete="off" style="margin-bottom: 5px;">

                                      </div>
                                      <div class="col-md-4">
                                        NURSING
                                        <input type="text" id="nursing" value="<?php if(!empty($_POST['tariff_fee_distribution'])): echo $feeDistribution[0]->nursing; endif;?>"  class="form-control medicineSugg" id="autosuggest" autocomplete="off" style="margin-bottom: 5px;">

                                      </div>
                                    </div>
									</div>
									
                               

                                  </div>
													<button type="submit" value="submit"  name="submit" class="btn btn-o btn-primary">
														Submit 
													</button>
												</form>
											</div>
                                                
                                              
								</div>
										</div>
									</div>

								</div>
							</div>
							







						</div>
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
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
			 var medList = [];
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
			$(document).on("change","#isFeeDistributed ", function(){
			if($('#isFeeDistributed').is(":checked")){
				
					$(".feeDistribution").show();

				}
        else
            {$(".feeDistribution").hide();}

			});

			$(document).one("submit","#package_submit", function(e){
        e.preventDefault();
        
        var hospitalisation = $('#hospitalisation').val();
        var medofficer = $('#medofficer').val();
        var nursing = $('#nursing').val();
        medList.push({hospitalisation: hospitalisation,medofficer: medofficer,nursing: nursing});
        $('#feeDistribution').val(JSON.stringify(medList));

        $(this).submit();
		
        
    });
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
