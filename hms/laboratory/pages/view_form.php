<?php include('../include/header.php');
$id = $_GET['id'];
 ?>
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">Admin | view form</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Admin</span>
								</li>
								<li class="active">
									<span> View Form</span>
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


<?php  //}?>  
				<form method="POST" action="">
                                    <?php
                                    $query = "SELECT * FROM `laboratoryTestList` where labFormID= '$id'";
                                    $result = $con->query($query);
                                    $fields_arr="";
                                    while ($row = mysqli_fetch_array($result)) {
                                        
                                    ?>

<div class="row">

<div class="col-sm-6 justify-content-start ">
<p class="title_style"> PATIENT NAME: - </p>
<p class="title_style">Ref. By: - St. Anthony Hospital & Research Center </p>
<p class="title_style">DATE: -  </p>



</div>


<div class="col-sm-6 justify-content-end font-weight-bold">

<p class="title_style">SEX: - </p>
<p class="title_style">AGE: -  </p>
<p class="title_style">Reg. no: -1363/02  </p>

</div>





</div>

 <div style=" border-width:2px; border-style: solid; "> </div>


                                        <h3 class="form_title_style"> <u> <?php echo $row['labTestName']; ?> </u></h3>
					<!-- <div class="wrapper_style">					 -->
<div class="row text-center">
                                        <?php
										$fields = $row['labFields'];
                                        $fields_arr = explode(",", $fields);
                                        $titles = $row['main_titles'];
                                        $title_arr = explode(",", $titles);
										$info = $row['test_more_info'];
										$b = html_entity_decode($info);
										
								

                                        $title_count=0;
                                        foreach ($title_arr as  $titles) {


											?>
											<div class="col-sm-3  ">
                                                
											<p class="main_title_style"> <?php echo $titles; ?></p>
								   
									</div>

									
								
								<?php 
							$title_count++;
							} ?></div>
								<div class="text-center">
									
					
				 </div> 
				 <table class="table table-hover" id="sample-table-1">
											<thead>
												
											</thead>
											<tbody id="valueShow">
											<?php
										$sql = mysqli_query($con, "SELECT * FROM `laboratoryTestList`;");
										$cnt = 1;
										while ($row = mysqli_fetch_array($sql)) {
										?>
<tr>
<?php
												if(!empty($row['labFields'])):
													$valuesDistribution = json_decode($row['labFields']);
													$i=0;
											foreach($valuesDistribution as $value) {
												print_r($value);
												$i++;
												     echo  $valuesDistribution[$i]->fieldName;
													 echo  $valuesDistribution[$i]->units;
													 echo  $valuesDistribution[$i]->referanceRange;
													 echo  $valuesDistribution[$i]->normalRange;
												}
												var_dump($value);
												endif;
						

												



											}?>
</tr>

											</tbody>
										</table>
<p> <?php echo $b; ?> </p>
<p class="text-center">~~ End of report ~~</p>
<?php
								
										$i++;
										}
									
										?>
                                     
<div>
	<p>  </p>
	


</div>




									 </div>   






                                </form>





									</tbody>
								</table> 
							</div>
						</div>
					</div>
				</div>
			</div> 
			<!-- end: BASIC EXAMPLE -->
			<!-- end: SELECT BOXES -->

	
	<?php include('../include/footer.php'); ?>
	