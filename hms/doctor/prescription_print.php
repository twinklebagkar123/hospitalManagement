<?php
session_start();
// error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>SAHRC | PRESCRIPTION</title>

    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>
<style>
    /* ROOT FONT STYLES */

    * {
        padding: 0;
        margin: 0 auto;
        box-sizing: border-box;
    }



    /* ==== GRID SYSTEM ==== */
    .container {
        width: 90%;
        margin-left: auto;
        margin-right: auto;
    }

    .row {
        position: relative;
        width: 100%;
    }

    .row [class^="col"] {
        float: left;
    }

    .row::after {
        content: "";
        clear: both;
        display: block;
    }

    .col-1 {
        width: 8.33%;
    }

    .col-2 {
        width: 16.66%;
    }

    .col-3 {
        width: 25%;
    }

    .col-4 {
        width: 33.33%;
    }

    .col-5 {
        width: 41.66%;
    }

    .col-6 {
        width: 50%;
    }

    .col-7 {
        width: 58.33%;
    }

    .col-8 {
        width: 66.66%;
    }

    .col-9 {
        width: 75%;
    }

    .col-10 {
        width: 83.33%;
    }

    .col-11 {
        width: 91.66%;
    }

    .col-12 {
        width: 100%;
    }

    /* Custom */

    .container {
        /* min-height: 84px; */
        border: 1px solid black;
        /* max-width: 420px; */
        margin: 0 auto;
        margin-top: 40px;
    }

    header {
        min-height: 83px;
        border-bottom: 1px solid black;

    }

    .doc-details {
        margin-top: 5px;
        margin-left: 15px;

    }

    .clinic-details {
        margin-top: 5px;
        margin-left: 15px;
    }

    .doc-name {
        font-weight: bold;
        margin-bottom: 5px;

    }

    .doc-meta {
        font-size: 12px;
    }

    .datetime {
        font-size: 12px;
        margin-top: 5px;

    }

    .row.title {
        font-weight: bold;
        padding-left: 10px;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .prescription {
        min-height: 380px;
        margin-bottom: 12px;
    }

    table {
        text-align: left;
        width: 90%;
        min-height: 25px;
    }

    table th {
        font-size: 13px;
        font-weight: bold;
    }

    table tr {
        margin-top: 20px;
    }

    table td {
        font-size: 12px;

    }

    .instruction {
        font-size: 12px;
    }
</style>

<body>
    <section>
    <?php 
        $reportId = $_GET["reportId"];
        $patientId = $_GET["patientId"];
        
        $query = "SELECT tblmedicalhistory.MedicalPres,tblmedicalhistory.CreationDate,tblpatient.PatientAge,tblpatient.PatientGender,tblpatient.PatientName,doctors.doctorName FROM `tblmedicalhistory` INNER JOIN patientAdmission ON patientAdmission.unqId = tblmedicalhistory.admissionID INNER JOIN tblpatient ON tblpatient.ID = patientAdmission.uid INNER JOIN doctors ON doctors.id = tblmedicalhistory.doctorID WHERE tblmedicalhistory.ID = '".$reportId."'";
        $result = $con->query($query);
        // echo $query." QUERY UPDATE ";
        while ($row = mysqli_fetch_array($result)) {
            $MedicalPres = json_decode($row['MedicalPres']);
            $prescribed_date = date('d/m/Y', strtotime($row['CreationDate']));
            $prescribed_time = date('h:i A', strtotime($row['CreationDate']));
            $PatientName = $row['PatientName'];
            $doctorName = $row['doctorName'];
            $PatientAge = $row['PatientAge'];
            $PatientGender = $row['PatientGender'];
    ?>
        <div class="container">
            <header class="row">
                <div class="col-10">
                    <div class="doc-details">
                        <p class="doc-name">St. Anthony's Hospital & Research Center</p>
                        <p class="doc-meta">General Hospital</p>
                        <p class="doc-meta">Rgn: 2341</p>
                    </div>

                    <div class="clinic-details">
                        <p class="doc-meta">Doctor Name: <?php echo $doctorName;?></p>
                    </div>

                </div>
                <div class="col-2 datetime">
                    <p>Date: <?php echo $prescribed_date; ?></p>
                    <p>Time: <?php echo $prescribed_time; ?></p>
                </div>
            </header>
            <div class="prescription">
                <p style="margin-left:15px;font-size:10px;font-weight:bold;">Rx <?php echo $PatientName." ,".$PatientGender."/".$PatientAge;?></p>
                <table>
                    <?php if($MedicalPres[0]->prescription_type == "hourly_prescription"): ?>
                        <th></th>
                        <th>Name of the drug</th>
                        <th>Start From </th>
                        <th>Dosage</th>
                        <th>Interval</th>
                    <?php else: ?>
                        <tr>
                        <th></th>
                        <th>Name of the drug</th>
                        <th>Dosage</th>
                        <th>Frequency</th>
                        <th>Period</th>
                    </tr>
                        
                    <?php endif; ?>
                   <?php  
                   $i = 0;
                    foreach($MedicalPres as $medicalDetail){ $i++; 
                    if($medicalDetail->prescription_type == "hourly_prescription"){ ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $medicalDetail->medicineName; ?></td>
                            <td><?php echo $medicalDetail->start_from; ?></td>
                            <td><?php echo $medicalDetail->dosage; ?></td>
                            <td><?php echo $medicalDetail->interval_hourly; ?></td>
                        </tr>
                   <?php } else{ ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $medicalDetail->medicineName; ?></td>
                            <td><?php echo $medicalDetail->dosage; ?></td>
                            <td><?php echo $medicalDetail->frequency; ?></td>
                            <td><?php echo $medicalDetail->period; ?></td>
                        </tr>
                    <?php } } ?>
                </table>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php 
                    foreach ($MedicalPres as $medicineDetail) {
                        $date = '2012-09-09 03:09:00';
                        $createDate = new DateTime($date);
                        $strip = $createDate->format('d');
                        $increasedDate = '2012-09-09 03:09:00';
                        $increasedDateFormatted = new DateTime($increasedDate);
                        $dateTimeLoop = $createDate->format('d');
                        while($strip == $dateTimeLoop){
                            $increasedDate =  date('Y-m-d H:i:s',strtotime('+2 hour',strtotime($increasedDate)));
                            // $dateTimeLoop =  date('d',strtotime('+2 hour',strtotime($date)));
                            $increasedDateFormatted = new DateTime($increasedDate);
                            $dateTimeLoop = $increasedDateFormatted->format('d');
                            echo $increasedDateFormatted->format('H:i')."<br>";
                        }
                    }
                    ?>
                </div>
            </div>
            <p style="font-size:12px;text-align:right;padding-bottom:15px;padding-right:25px;"><?php echo $doctorName;?></p>
            <p style="font-size:10px;text-align:center;padding-bottom:20px;">This is a digitally generated Prescription</p>
        </div>
        
        <?php } ?>
    </section>
    
     <!-- <h2 style="background-color: #333;">The window.print() Method</h2>

    <p>Click the button to print the current page.</p> -->
    <div class="row" id="goBackRow" style="display:none;">
        <div class="col-md-12 text-center">
            <a href="view-patient.php?viewid=<?php echo $patientId ?>" class="btn btn-default">Go Back</a>
        </div>
    </div>
    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    window.onload = function() {
      console.log("DOcument loaded");
      window.print();
      document.getElementById("goBackRow").setAttribute("style", "display: block;");
    }
</script>
</body>

</html>