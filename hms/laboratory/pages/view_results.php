<?php include('../include/header.php');
$id = $_GET['recID'];
function fetchPatientName($admissionID)
{
    include('../include/config.php');
    $query = "SELECT tblpatient.PatientName,tblpatient.PatientGender,tblpatient.PatientAge FROM `patientAdmission` as tab1 INNER JOIN tblpatient ON tab1.uid = tblpatient.ID WHERE tab1.unqId = '$admissionID'";
    $result =  $con->query($query);
    $resultarray=[];

    while ($row = mysqli_fetch_array($result)) {
        $resultarray['name'] = $row['PatientName'];
        $resultarray['gender'] = $row['PatientGender'];
        $resultarray['age'] = $row['PatientAge'];
    }
    return $resultarray;
}
?>
<style type="text/css">
    .title_style {
        color: #333;
        font-size: 16px;
        font-weight: bold;
    }

    .form_title_style {

        font-weight: bold;
        color: #333;
        text-align: center;
        margin-top: 6px;
    }

    p {
        font-size: 16px;
    }

    .field_style {

        font-size: 16px;
    }

    .main_title_style {

        font-size: 16px;
        color: #333;
        text-decoration: underline;
        font-weight: bold;
    }
</style>
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
                <p style="color:red;"> <?php echo htmlentities($_SESSION['msg']); ?>
                    <?php echo htmlentities($_SESSION['msg'] = ""); ?></p>

                <?php
                $query = "SELECT laboratoryTestList.labFormID,labTestRecord.performedTestID, labTestRecord.testResult, laboratoryTestList.labFields, laboratoryTestList.test_more_info, laboratoryTestList.main_titles, labTestRecord.admissionID, labTestRecord.testResult, labTestRecord.findings, labTestRecord.assignedDate, labTestRecord.performedDate, labTestRecord.performedBy FROM laboratoryTestList INNER JOIN labTestRecord ON laboratoryTestList.labFormID= labTestRecord.performedTestID And labTestRecord.recordID = '$id'";
                $result = $con->query($query);
                $fields_arr = "";
                while ($row = mysqli_fetch_array($result)) {
                    $resultarray2= fetchPatientName($row['admissionID']);
                ?>

                    <div class="row">

                        <div class="col-sm-6 justify-content-start ">
                            <p class="title_style"> PATIENT NAME: - <?php echo $resultarray2['name']; ?></p>
                            <p class="title_style">Ref. By: - St. Anthony Hospital & Research Center </p>
                            <p class="title_style">DATE: - <?php echo $row['performedDate'] ?> </p>



                        </div>


                        <div class="col-sm-6 justify-content-end font-weight-bold">

                            <p class="title_style">SEX: - <?php echo $resultarray2['gender']; ?></p>
                            <p class="title_style">AGE: - <?php echo $resultarray2['age']; ?></p>
                            <p class="title_style">Reg. no: -1363/02 </p>

                        </div>





                    </div>

                    <div style=" border-width:2px; border-style: solid; "> </div>


                    <h3 class="form_title_style"> <u> <?php echo $row['labTestName']; ?> </u></h3>
                    <!-- <div class="wrapper_style">					 -->
                    <div class="row text-center">
                        <?php
                        //$fields = $row['labFields'];
                        //	$fields_arr = explode(",", $fields);
                        $titles = $row['main_titles'];
                        $title_arr = explode(",", $titles);
                        $info = $row['test_more_info'];
                        $b = html_entity_decode($info);



                        $title_count = 0; ?> <div class="col-sm-3  ">

                            <p class="main_title_style">Test</p>

                        </div>
                        <div class="col-sm-3  ">

                            <p class="main_title_style"> Result</p>

                        </div>
                        <?php
                        foreach ($title_arr as  $titles) {


                        ?>
                            <div class="col-sm-3  ">

                                <p class="main_title_style"> <?php echo $titles; ?></p>

                            </div>



                        <?php
                            $title_count++;
                        } ?>
                    </div>
                    <div class="row">
                        <div class="col-sm-3"></div>
                    </div>
                    <table class="table table-hover" id="sample-table-1">
                        <thead>

                        </thead>
                        <tbody id="valueShow">
                            <?php

                            $cnt = 1;
                            ?>
                            <tr>
                            <?php
                            if (!empty($row['labFields'])) :
                                $recResult =  $row['testResult'];
                                $recResult =  json_decode($recResult,false);
                              
                                // var_dump($recResult);
                                // echo "__________".$recResult->sodium."____________";
                                // foreach ($recResult as $key => $value) {
                                //     print_r($recResult['Sodium']);

                                // }
                                $valuesDistribution = json_decode($row['labFields']);
                                $i = 0;
                                foreach ($valuesDistribution as $value) {
                                    $temp = $valuesDistribution[$i]->fieldName;
                                    $temp = str_replace(' ', '_', $temp );
                                   // echo $recResult['$temp'];
                                    echo "<div class='row text-center'>";
                                    if (!(strpos($valuesDistribution[$i]->fieldName, "*"))) {

                                        echo isset($valuesDistribution[$i]->fieldName) ? "<div class='col-sm-3'>" . $valuesDistribution[$i]->fieldName . "</div>" :  "";
                                        // foreach ($recResult as $key => $value) {
                                            echo "<div class='col-sm-3'> ".$recResult->$temp." </div>";
                                            
                                        // }
                                        echo isset($valuesDistribution[$i]->units) ? "<div class='col-sm-3'>" . $valuesDistribution[$i]->units . "</div>" :  "";
                                        echo isset($valuesDistribution[$i]->referanceRange) ? "<div class='col-sm-3'>" . $valuesDistribution[$i]->referanceRange . "</div>" :  "";
                                        echo isset($valuesDistribution[$i]->normalRange) ? "<div class='col-sm-3'>" . $valuesDistribution[$i]->normalRange . "</div>" :  "";
                                    } else {
                                        echo isset($valuesDistribution[$i]->fieldName) ? "<div class='col-sm-3 text-bold'>" .         substr($valuesDistribution[$i]->fieldName, 0, -1) . "</div>" :  "";
                                        // foreach ($valuesDistribution as $value) {
                                            echo "<div class='col-sm-3'> ".$recResult->$temp." </div>";
                                        // }
                                        echo isset($valuesDistribution[$i]->units) ? "<div class='col-sm-3'>" . $valuesDistribution[$i]->units . "</div>" :  "";
                                        echo isset($valuesDistribution[$i]->referanceRange) ? "<div class='col-sm-3'>" . $valuesDistribution[$i]->referanceRange . "</div>" :  "";
                                        echo isset($valuesDistribution[$i]->normalRange) ? "<div class='col-sm-3'>" . $valuesDistribution[$i]->normalRange . "</div>" :  "";
                                    }
                                    echo "</div>";
                                    $i++;
                                }
                            // var_dump($value);
                            endif;
                        } ?>
                            </tr>

                        </tbody>
                    </table>
                    <p> <?php echo $b; ?> </p>
                    <p class="text-center">~~ End of report ~~</p>
                    <?php

                    $i++;


                    ?>

                    <div>
                        <p> </p>



                    </div>




            </div>






            </form>





            </tbody>
            </table>
        </div>
    </div>
</div>

<!-- end: BASIC EXAMPLE -->
<!-- end: SELECT BOXES -->


<?php include('../include/footer.php'); ?>