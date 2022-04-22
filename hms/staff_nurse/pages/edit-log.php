<?php
session_start();
error_reporting(0);
include('../include/header.php');
include('../include/config.php');
check_login();
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
                    <span>Doctor</span>
                </li>
                <li class="active">
                    <span>Manage Patients</span>
                </li>
            </ol>
        </div>
    </section>
    <div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-md-12">
                <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Patients</span></h5>
            </div>
            <div class="col-md-12">
            <form method="post">
                            <div class="input">
                              <input type="hidden" value="" id="fluidadmissionID" name="admissionID">
                            <h5 class="panel-title">INPUT</h5>
                              <div class="form-group">
                                <label>IV</label>
                                <input name="iv" placeholder="IV" class="form-control wd-450" required="true">
                              </div>
                              <div class="form-group">
                                <label>Oral</label>
                                <input name="oral" placeholder="oral" class="form-control wd-450" required="true">
                              </div>
                              <div class="form-group">
                                <label>RT</label>
                                <input name="rt" placeholder="rt" class="form-control wd-450" required="true">
                              </div>
                            </div>
                            <div class="output">
                            <h5 class="panel-title">OUTPUT</h5>
                              <div class="form-group">
                              <label>Urine</label>
                              <input name="urine" placeholder="urine" class="form-control wd-450" required="true">
                              </div>
                              <div class="form-group">
                              <label>Others</label>
                              <input name="others" placeholder="others" class="form-control wd-450" required="true">
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