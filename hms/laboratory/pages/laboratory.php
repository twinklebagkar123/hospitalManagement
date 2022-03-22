<?php include('../include/header.php'); 

if (isset($_POST['submit'])) {
    $labTestName = $_POST['name'];
    $labFields = $_POST['fieldArray'];
    $charges = $_POST['charges'];
    $referance_range = $_POST['referance_range'];
    $units = $_POST['units'];
    $main_title = implode(',', $_POST['main_titles']);

    $mt = "";

    $html_test_default_info = htmlentities($_POST['html_test_default_info'], ENT_QUOTES);

     $query = "INSERT INTO `laboratoryTestList`(`labTestName`, `labFields`, `labCharges`, `test_more_info`,`main_titles`) VALUES ('".$labTestName."','".$labFields."','".$charges."','".$html_test_default_info."','".$main_title."')";
     $con->query($query);



}


?>
<style>
        .no_value_style {
            margin-top: 26px;
            font-size: 23px;

        }

        .no_value_style>input {
            width: 20px;
            height: 20px;
        }
    </style>

<div class="wrap-content container" id="container">
	<!-- start: PAGE TITLE -->
	<section id="page-title">
		<div class="row">
			<div class="col-sm-8">
				<h1 class="mainTitle">Admin | Procedure Section</h1>
			</div>
			<ol class="breadcrumb">
				<li>
					<span>Admin</span>
				</li>
				<li class="active">
					<span>Create Test</span>
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
								<h5 class="panel-title">Add Test Details</h5>
							</div>
							<div class="panel-body">

								<form role="form" name="addmed" id="addmed" method="post">

									<div class="form-group">
										<label for="name">
											Test Name:
										</label>

										<input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" required="true">


									</div>


									<div>

										<input type="checkbox" id="units" name="main_titles[]" value="Units">
										<label for=""> Units</label>
										<input type="checkbox" id="ref" name="main_titles[]" value="Referance Range">
										<label for=""> Referance Range</label>
										<input type="checkbox" id="normalRange" name="main_titles[]" value="Normal Range">
										<label for=""> Normal Range</label>
									</div>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">

												<label>
													Field Name:
												</label>
												<input type="text" id="fieldName" name="fieldName" class="form-control" placeholder="Add Test Field Name" required="true" onkeypress="return blockSpecialChar(event)">
												<input type="hidden" id="fieldArray" name="fieldArray" class="form-control">
												<br>
												<a class="btn btn-o btn-primary" id="addField">Add Field</a>

												<br>
											</div>
										</div>
										<!-- <div class="wrapperDiv">
													

													<input type="checkbox" id="isFeeDistributed"   name="isFeeDistributed"  value="1">
													<label > Fee Distribution</label>
														<div class="feeDistribution" style="display:none; margin-bottom: 8px;">
															<div class="row">
														
															<div class="col-md-4">
															HOSPITALISATION
																<input type="text" id="hospitalisation" placeholder="hospitalisation Charges " class="form-control" autocomplete="off" style="margin-bottom: 5px;">

															</div>
															<div class="col-md-4">
															MEDICAL OFFICER
																<input type="text" id="medofficer" placeholder=" MEDICAL OFFICER Charges" class="form-control " autocomplete="off" style="margin-bottom: 5px;">

															</div>
															<div class="col-md-4">
																NURSING
																<input type="text" id="nursing" placeholder="NURSING Charges" class="form-control medicineSugg" id="autosuggest" autocomplete="off" style="margin-bottom: 5px;">

															</div>
															</div>
															</div>
														</div> -->
										<div class="col-sm-3 referance_r" style="display:none; ">
											<div class="form-group">

												<label>
													Reference Range:
												</label>
												<input type="text" id="referance_value" name="referance_value" class="form-control" placeholder="Add Reference Range" >
												<!-- <input type="hidden" id="referance_range" name="referance_range" class="form-control" placeholder="Add Reference Range" >  -->
												<br>

												<br>
											</div>

										</div>
										<div class="col-sm-3 units" style="display:none; ">
											<div class="form-group">

												<label>
													Units:
												</label>
												<input type="text" id="units_value" name="units_value" class="form-control" placeholder="Add Reference Range" >
												<!-- <input type="hidden" id="referance_range" name="referance_range" class="form-control" placeholder="Add Reference Range" >  -->
												<br>

												<br>
											</div>

										</div>
										<div class="col-sm-3 normalRange" style="display:none; ">
											<div class="form-group">

												<label>
													Normal Range:
												</label>
												<input type="text" id="normalRange_value" name="normalRange_value" class="form-control" placeholder="Add Normal Range" >
												<!-- <input type="hidden" id="referance_range" name="referance_range" class="form-control" placeholder="Add Reference Range" >  -->
												<br>

												<br>
											</div>

										</div>
										<!--
													<div class="col-sm-3">
														<div class="form-group">
														
														<label>
															Units :
														</label>
														<input type="text" id="units" name="units" class="form-control" placeholder="Add units" required="true" onkeypress="return blockSpecialChar(event)">
														 <input type="hidden" id="units" name="units" class="form-control" placeholder="Add  units" > 
														<br>
														
														<br>
													</div>
													
													</div> -->

										<div class="col-sm-3">
											<div class="no_value_style">
												<label> No value</label>
												<input type="checkbox" value="*" id="noValueCheckbox" placeholder="No value">

											</div>
										</div>
									</div>
									<div class="form-group">
										<label>
											Test Charges:
										</label>
										<input type="text" name="charges" class="form-control" placeholder="Add Test Field Name" required="true">


									</div>
									<div class="wrapperDiv">


										<input type="checkbox" id="test_more_info" name="test_more_info" value="1">
										<label> Test More Info</label>
										<div id="editor">

										</div>
									</div>
									<!-- <div>
														<input type="checkbox" id="main_titles" name="main_titles[]" value="Test">
														<label for="vehicle1"> Test</label>
														<input type="checkbox" id="main_titles" name="main_titles[]" value="Result">
														<label for="vehicle2"> Result</label>
														<input type="checkbox" id="main_titles" name="main_titles[]" value="Units">
														<label for="vehicle3"> Units</label>
														<input type="checkbox" id="main_titles" name="main_titles[]" value="Referance_Range">
														<label for="vehicle3"> Referance Range</label></div>
														<input type="checkbox" id="main_titles" name="main_titles[]" value="Normal_Range">
														<label for="vehicle3"> Normal  Range</label></div> -->

									<button type="submit" name="submit" class="btn btn-o btn-primary">
										Submit Test
									</button>
									<input type="hidden" name="html_test_default_info" id="html_test_default_info">
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

									<th>Field Name</th>
									<th> Units</th>
									<th> Reference Range</th>
									<th> Normal Range</th>
									<th>Action</th>

								</tr>
							</thead>
							<tbody id="fieldShow">



							</tbody>
						</table>
					</div>

				</div>
			</div>


		</div>
	</div>
</div>
<!-- end: BASIC EXAMPLE -->




<!-- end: SELECT BOXES -->

<?php include('../include/footer.php'); ?>
