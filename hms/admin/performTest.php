<?php
include('include/header_structured.php');
?>
<?php

if (isset($_POST['submit'])) {
    $testID = $_GET['testID'];
    $recID = $_GET['recID'];
    $performedBy = $_POST['performedBy'];
    $findings = $_POST['findings'];
    $query = "SELECT * FROM `laboratoryTestList` where labFormID= '$testID'";
    $result = $con->query($query);
    while ($row = mysqli_fetch_array($result)) {
        $fields = $row['labFields'];
      
       $fields_arr = explode(",", $fields);
       foreach ($fields_arr as  $value) {
           $str = str_replace(' ', '_', $value);
           $postVAl = $_POST["$str"];
           $testresult[$value] = $postVAl;
          
       }
       $charges = $row['labCharges'];

    }
    $date = date("Y-m-d");
    $testJson = json_encode($testresult);
    $updateQuery = "UPDATE `labTestRecord` SET `labTestStatus`='complete',`testResult`='$testJson',`findings`='$findings',`performedDate`='$date',`performedBy`='$performedBy',`charges`='$charges' WHERE recordID = '$recID'";
    //print_r($updateQuery);
    $result = $con->query($updateQuery);
}

$adID = $_GET['adID'];
$testID = $_GET['testID'];
function fetchPatientName($admissionID)
{
    include('include/config.php');
    $query = "SELECT tblpatient.PatientName FROM `patientAdmission` as tab1 INNER JOIN tblpatient ON tab1.uid = tblpatient.ID WHERE tab1.unqId = '$admissionID'";
    $result =  $con->query($query);
    while ($row = mysqli_fetch_array($result)) {
        $answer = $row['PatientName'];
      
    }
    return $answer;
}

?>

                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Laboratory | Perform Tests</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Admin</span>
                                </li>
                                <li class="active">
                                    <span>View Tests</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-sm-6">

                                <form method="POST" action="">
                                    <?php
                                    $query = "SELECT * FROM `laboratoryTestList` where labFormID= '$testID'";
                                    $result = $con->query($query);
                                    $fields_arr="";
                                    while ($row = mysqli_fetch_array($result)) {
                                        
                                    ?>
                                        <h3> <?php echo $row['labTestName']; ?> | <?php echo fetchPatientName($adID); ?></h3>

                                        <?php
                                        $fields = $row['labFields'].",".$row['main_titles'] ;
                                        $fields_arr = explode(",", $fields);
                                        $i=1;
                                        foreach ($fields_arr as  $field) {
                                        ?>
                                            <div class="form-group">
                                                <label for="<?php echo $field; ?>">
                                                    <?php echo $field; ?>
                                                </label>

                                                <input type="text" id="field_lab_<?php echo $i; ?>" name="<?php echo $field; ?>" class="form-control" placeholder="Enter <?php echo $field; ?>">

                                                   
                                            </div>

                                    <?php
                                    $i++;
                                        }?>
                                        <input type="hidden" name="field_lab_counter" id="field_lab_counter" value="<?php echo $i-1;?>">
                                        <?php

                                    }
                                    ?>
                                        								<?php


                                                                        $titles = $row['main_titles'];
                                                                        $titles_arr = explode(",", $titles);
                                                                        $i=1;

                                                                        foreach ($titles_arr as  $title) {

                                                                            ?> <div class="row">
                                                                                <div class="col-sm-3 justify-content-center">
                                                                                <?php
                                                                            if(strpos ($title, '*')!==false) {
                                                                                ?>

                                                                        <p class="field_style text-bold">	 </p>
                                                                                <?php



                                                                            }
                                                                            else{
                                                                        ?>
                                                                            
                                                                                <p class="field_style">	<?php echo $field; ?> </p>
                                                                            
                                                                        <?php
                                                                            }
                                                                            ?>
                                                                            </div>
                                                                            </div>

                                                                        <?php
                                                                        $i++;
                                                                        }?>
                                    <div class="form-group">
                                        <label for="performedBy">
                                           Laboratory Incharge
                                        </label>
                                        <input type="text" id="performedBy" name="performedBy" class="form-control" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="findings">
                                           Laboratory Findings
                                        </label>
                                        <input type="text" id="findings" name="findings" class="form-control" required="true">
                                    </div>
                                    <input type="submit" class="btn btn-o btn-primary" name="submit" value="SUBMIT">
                                </form>
                            </div>
                            <div class="col-sm-6">

                            <a class="btn btn-o btn-primary" id ="addTestfield">+ Add Test</a>

                            </div>
                        </div>
                        <div class="container-fluid container-fullw bg-white">


								<div class="row">
									<div class="col-md-12">
										<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Procedures</span></h5>
										<p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
											<?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
										<table class="table table-hover" id="table_field">
											<thead>
												<tr>
													<?php
                                                    foreach ($fields_arr as  $field) {
                                                        echo "<th>$field<th>";
                                                    }
                                                    
                                                    ?>
                                                    
													
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <!-- start: CLIP-TWO JAVASCRIPTS -->
    <script src="assets/js/form-elements.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"></script> -->
    <script src="assets/js/main.js"></script>
    <script>


           
			
            $(document).ready(function(){
                Main.init();
			FormElements.init();
            var jsonFieldDetails = [];
                $("#addTestfield").on("click", function(){
                var j=1;
                 console.log("hello");
				 var counter = $("#field_lab_counter").val();
                 var data = "<tr>";
                while (j<=counter){


                    var textName = $("#field_lab_"+j).val();

                    data = data+"<td>" +textName+ "</td>";
                    
                    // $("#table_field #fieldShow").append(data);
                    // // $("#fieldShow . tr").last(td);
                    j++;
             
                }
                data = data+"</tr>";
                
                $("#table_field").append(data);
                // $("#fieldShow").append("#field_lab_"+j);
                // var trow = "<tr><td>"+counter+j+"</td><td class='remove' data-name='"+counter+"'>X</td></tr>";
				// $("#fieldShow").append(trow);
				// jsonFieldDetails.push(counter);
				// jsonFieldDetailsString = jsonFieldDetails.toString();
				// $("#fieldArray").val(jsonFieldDetailsString);

				
				//console.log(jsonFieldDetails);
				
			});
            $(document).on("click" ,".remove",function(){
				var shanti = $(this).data("name");
              var index = jsonFieldDetails.indexOf(shanti);
			  if (index > -1) {
				jsonFieldDetails.splice(index, 1);
			}
			  console.log(jsonFieldDetails);
			  jsonFieldDetailsString = jsonFieldDetails.toString();
				$("#fieldArray").val(jsonFieldDetailsString);
			   $(this).parent().remove();

			});
            });
			
			

    </script>
    <!-- start: JavaScript Event Handlers for this page -->
   
   
</body>
</html>