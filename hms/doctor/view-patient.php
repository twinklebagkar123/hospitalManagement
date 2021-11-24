<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
  {
    
    $vid=$_GET['viewid'];
    $bp=$_POST['bp'];
    $bs=$_POST['bs'];
    $weight=$_POST['weight'];
    $type=$_POST['type'];
    $temp=$_POST['temp'];
   $pres=$_POST['pres'];
   $nn=$_POST['nn'];
 
      $query.=mysqli_query($con, "insert   tblmedicalhistory(PatientID,BloodPressure,BSType,BloodSugar,Weight,Temperature,MedicalPres,nurseNote)value('$vid','$bp','$type','$bs','$weight','$temp','$pres','$nn')");
    if ($query) {
    echo '<script>alert("Medicle history has been added.")</script>';
    echo "<script>window.location.href ='manage-patient.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Doctor | Manage Patients</title>
    
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
    <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/styleext.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
  </head>
  <body>
    <script type="text/javascript">
      function getAllValues(){
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "getAllMedicines.php",
            data:'med='+$("#autosuggest").val(),
            type: "POST",
            success:function(data){
            $("#pillResult").html(data);
            $("#loaderIcon").hide();
           
            },
            error:function (){}
        });
      } 

  
  </script>
    <div id="app">    
<?php include('include/sidebar.php');?>
<div class="app-content">
<?php include('include/header.php');?>
<div class="main-content" >
<div class="wrap-content container" id="container">
            <!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-8">
<h1 class="mainTitle">Doctor | Manage Patients</h1>
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
<?php
                               $vid=$_GET['viewid'];
                               $ret=mysqli_query($con,"select * from tblpatient where ID='$vid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
                               ?>
<table style="border:1" class="table table-bordered">
 <tr style="align : center">
<td colspan="4" style="font-size:20px;color:blue">
 Patient Details</td></tr>

    <tr>
    <th scope>Patient Name</th>
    <td><?php  echo $row['PatientName'];?></td>
    <th scope>Patient Email</th>
    <td><?php  echo $row['PatientEmail'];?></td>
  </tr>
  <tr>
    <th scope>Patient Mobile Number</th>
    <td><?php  echo $row['PatientContno'];?></td>
    <th>Patient Address</th>
    <td><?php  echo $row['PatientAdd'];?></td>
  </tr>
    <tr>
    <th>Patient Gender</th>
    <td><?php  echo $row['PatientGender'];?></td>
    <th>Patient Age</th>
    <td><?php  echo $row['PatientAge'];?></td>
  </tr>
  <tr>
    
    <th>Patient Medical History(if any)</th>
    <td><?php  echo $row['PatientMedhis'];?></td>
     <th>Patient Reg Date</th>
    <td><?php  echo $row['CreationDate'];?></td>
  </tr>
 
<?php }?>
</table>
<?php  

$ret=mysqli_query($con,"select * from tblmedicalhistory  where PatientID='$vid'");



 ?>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr style="align : center">
   <th colspan="8" >Medical History</th> 
  </tr>
  <tr>
    <th>#</th>
<th>Blood Pressure</th>
<th>Weight</th>
<th>Blood Sugar</th>
<th>Blood Sugar Type</th>
<th>Body Temprature</th>
<th>Medical Prescription</th>
<th>Nurse Note</th>
<th>Visit Date</th>
</tr>
<?php  
while ($row=mysqli_fetch_array($ret)) { 
  ?>
<tr>
  <td><?php echo $cnt;?></td>
 <td><?php  echo $row['BloodPressure'];?></td>
 <td><?php  echo $row['Weight'];?></td>
 <td><?php  echo $row['BloodSugar'];?></td> 
 <td><?php  echo $row['BSType'];?></td>
  <td><?php  echo $row['Temperature'];?></td>
  <td><?php  echo $row['MedicalPres'];?></td>
  <td><?php  echo $row['nurseNote'];?></td>
  <td><?php  echo $row['CreationDate'];?></td> 
</tr>
<?php $cnt=$cnt+1;} ?>
</table>

<p align="center">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Add Medical History</button></p>  



 <?php  
 $query = "SELECT DISTINCT BSType FROM tblmedicalhistory";
 $result = $con->query($query);
//$result=mysqli_query($con,"SELECT DISTINCT BSType FROM tblmedicalhistory");
$data = array();
while($row= $result->fetch_assoc())
{
$i=1;
$type = $row["BSType"];
print_r($type);
if($type != ""){
  $query2 = "SELECT  `BloodSugar` FROM `tblmedicalhistory` WHERE BSType='".$type."' AND PatientID='$vid'";
  echo "<br>";
  print_r($query2);
  $result1 = $con->query($query2);
  while($row2=$result1-> fetch_assoc())
{
$value = $row2["BloodSugar"];
echo "<br>";
var_dump($value);
$data[$type][] = $value;
//$data [] = array_push($value);

}

}

// 



$i++;
}

print_r($data["Type4"]);
// $data "$i"= array();



// $cart = array();
// while ($row=mysqli_fetch_array($chr)) { 
//   $value = $row['BloodSugar'];

// array_push($cart, $value);

// }


 ?>
 <?php  
// $chr=mysqli_query($con,"SELECT DISTINCT `BloodSugar` FROM `tblmedicalhistory` WHERE BSType='Type2' AND PatientID='$vid'");
// $c = array();
// while ($row=mysqli_fetch_array($chr)) { 
//   $v = $row['BloodSugar'];

// array_push($c, $v);

// }


//  ?>
//  <?php  
// $chr=mysqli_query($con,"SELECT DISTINCT BloodSugar FROM tblmedicalhistory WHERE BSType='Type3' AND PatientID='$vid'");
// $thirdd = array();
// while ($row=mysqli_fetch_array($chr)) { 
//   $vv = $row['BloodSugar'];

// array_push($thirdd, $vv);

// }


//  ?>
//  <?php  
// $chr=mysqli_query($con,"SELECT DISTINCT `BloodSugar` FROM `tblmedicalhistory` WHERE BSType='Type4' AND PatientID='$vid'");
// $fourth = array();
// while ($row=mysqli_fetch_array($chr)) { 
//   $vv = $row['BloodSugar'];

// array_push($fourth, $vv);

// }


//  ?>
//  <?php  
// $chr=mysqli_query($con,"SELECT DISTINCT `BloodSugar` FROM `tblmedicalhistory` WHERE BSType='Type5' AND PatientID='$vid'");
// $fifth = array();
// while ($row=mysqli_fetch_array($chr)) { 
//   $vv = $row['BloodSugar'];

// array_push($fifth, $vv);

// }


//  ?>
//   <?php  
// $chr=mysqli_query($con,"SELECT DISTINCT `BloodSugar` FROM `tblmedicalhistory` WHERE BSType='Type6' AND PatientID='$vid'");
// $sixth = array();
// while ($row=mysqli_fetch_array($chr)) { 
//   $vv = $row['BloodSugar'];

// array_push($sixth, $vv);

// }


 ?>
<canvas id="line-chart" width="400" height="100"></canvas>







<?php  ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add Medical History</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="table table-bordered table-hover data-tables">

                                 <form method="post" name="submit">













      <tr>
    <th>Blood Pressure :</th>
    <td>
    <input name="bp" placeholder="Blood Pressure" class="form-control wd-450" required="true"></td>
  </tr>
<tr>
    <th>Blood Sugar Type :</th>
    
    <td>
    
 <select name="type" >
  <option value="Type1">Type1</option>
  <option value="Type2">Type2</option>
  <option value="Type3">Type3</option>
   <option value="Type4">Type4</option>  
<option value="Type5">Type5</option>
 <option value="Type6">Type6</option>

  
</select></td>

  </tr>

     <tr>
    <th>Blood Sugar :</th>
    
    <td><input name="bs" placeholder="Blood Sugar" class="form-control wd-450" required="true"></td>
  </tr> 
  <tr>
    <th>Weight :</th>
    <td>
    <input name="weight" placeholder="Weight" class="form-control wd-450" required="true"></td>
  </tr>
  <tr>
    <th>Body Temprature :</th>
    <td>
    <input name="temp" placeholder="Blood Sugar" class="form-control wd-450" required="true"></td>
  </tr>
                         
     <tr>
    <th>Prescription :</th>
    <td>
    <input type="text" id="autosuggest" onkeydown="getAllValues()" autocomplete="off">
    <div id="pillResult"></div>

    <textarea name="pres" id="result" placeholder="Medical Prescription" rows="4" cols="14" class="form-control wd-450" required="true"></textarea>
    
  </td>
  </tr>  
   
<tr>
    <th>Nurse Note :</th>
    <td>
    <textarea name="nn" id="nn" placeholder="Nurse Note" rows="8" cols="14" class="form-control wd-450" required="true"></textarea>
  </tr>



</table>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  
  </form>
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
    <script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <!-- start: CLIP-TWO JAVASCRIPTS -->
    <script src="assets/js/main.js"></script>
    <!-- start: JavaScript Event Handlers for this page -->
    <script src="assets/js/form-elements.js"></script>
    <script src="assets/js/doctor.js"></script>
    <script>
      jQuery(document).ready(function() {
        Main.init();
        FormElements.init();
        console.log("hello");
        
      });
    </script>
    
<script>
new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: [10,20,30,40,50,60,70,80,90,100,110,120,130],
    datasets: [{ 
        data: [<?php foreach($cart as $val){echo $val; echo ",";}?>],
        label: "Type1",
        borderColor: "#3e95cd",
        fill: false
      },
      { 
        data: [<?php foreach($c as $val){echo $val; echo ",";}?>],
        label: "Type2",
        borderColor: "#8e5ea2",
        fill: false
      }
      , { 
         data: [<?php foreach($thirdd as $val){echo $val; echo ",";}?>],
        label: "Type3",
        borderColor: "#3cba9f",
        fill: false
      }
      , { 
         data: [<?php foreach($fourth as $val){echo $val; echo ",";}?>],
        label: "Type4",
        borderColor: "#ffff00",
        fill: false
      }
      , { 
         data: [<?php foreach($fifth as $val){echo $val; echo ",";}?>],
        label: "Type5",
        borderColor: "#ff0000",
        fill: false
      }
      , { 
         data: [<?php foreach($sixth as $val){echo $val; echo ",";}?>],
        label: "Type6",
        borderColor: "#99ff33",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'Blood Sugar'
    }
  }
});
</script>
    <!-- end: JavaScript Event Handlers for this page -->
    <!-- end: CLIP-TWO JAVASCRIPTS -->
  </body>
</html>
