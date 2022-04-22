<?php
session_start();
error_reporting(0);
include('../include/header.php');
include('../include/config.php');
check_login();
?>
<?php
if(isset($_POST['fluidcount'])){
    $editid = $_GET['editid'];
    $iv = $_POST['iv'];
    $oral = $_POST['oral'];
    $rt = $_POST['rt'];
    $urine = $_POST['urine'];
    $others = $_POST['others'];
  //  $admissionID = $_POST['admissionID'];
  //  $date = date("Y-m-d h:i:s");
  //  $date2 = date("Y-m-d");
    $sql = "UPDATE `fluidintakelog` SET `iv`='$iv',`oral`='$oral',`rt`='$rt',`urine`='$urine',`others`='$others' WHERE logid = $editid";
    $query = mysqli_query($con,$sql);
  }

?>
<div class="wrap-content container" id="container">
    <!-- start: PAGE TITLE -->
    <section id="page-title">
        <div class="row">
            <div class="col-sm-8">
                <h1 class="mainTitle">Nurse | View Patients</h1>
            </div>
            <ol class="breadcrumb">
                <li>
                    <span>Nurse</span>
                </li>
                <li class="active">
                    <span>edit records</span>
                </li>
            </ol>
        </div>
    </section>
    <?php 
    $editid = $_GET['editid'];
    $query = "SELECT * FROM `fluidintakelog` WHERE logid = '$editid'";
    $queryResult = $con->query($query);
    $row = mysqli_fetch_assoc($queryResult);
    ?>
    <div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-md-12">
                <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Patients</span></h5>
            </div>
            <div class="col-md-6">
            <form method="post">
                            <div class="input">
                              <input type="hidden" value="" id="fluidadmissionID" name="admissionID">
                            <h5 class="panel-title">INPUT</h5>
                              <div class="form-group">
                                <label>IV</label>
                                <input name="iv" placeholder="IV" class="form-control" value="<?php echo $row['iv'];?>">
                              </div>
                              <div class="form-group">
                                <label>Oral</label>
                                <input name="oral" placeholder="oral" class="form-control"  value="<?php echo $row['oral'];?>">
                              </div>
                              <div class="form-group">
                                <label>RT</label>
                                <input name="rt" placeholder="rt" class="form-control"  value="<?php echo $row['rt'];?>">
                              </div>
                            </div>
                            <div class="output">
                            <h5 class="panel-title">OUTPUT</h5>
                              <div class="form-group">
                              <label>Urine</label>
                              <input name="urine" placeholder="urine" class="form-control"  value="<?php echo $row['urine'];?>">
                              </div>
                              <div class="form-group">
                              <label>Others</label>
                              <input name="others" placeholder="others" class="form-control"  value="<?php echo $row['others'];?>">
                              </div>
                            </div>
                            <div>
                              <input type="submit" name="fluidcount">
                            </div>
                          </form>
            </div>
        </div>
    </div>
</div>