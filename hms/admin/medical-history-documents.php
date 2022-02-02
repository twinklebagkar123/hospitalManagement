<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$docid = $_GET['docId'];
if (isset($_POST['submit'])) {
    $file_title = $_POST['fTitle'];
    $patient_id = $_POST['pID'];
    $uploaded_at = $_POST['date'];

    $file_url = $_FILES['patientDoc']["name"];
    $tempname = $_FILES["patientDoc"]["tmp_name"];

    $upload_dir = '/';
    $imgExt = strtolower(pathinfo($file_url, PATHINFO_EXTENSION));
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
    $picProfile = rand(1000, 1000000) . "." . $file_url;
    echo "tempname:" . $tempname;
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    echo "ext:" . $ext;
    echo "/n/n" . $_SERVER['DOCUMENT_ROOT'];
    $path = '/home/u298126064/domains/adpigo.com/public_html/hospital/uploads/' . $picProfile;
    $month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
    try {
        if (move_uploaded_file($tempname, '/home/u298126064/domains/adpigo.com/public_html/hospital/uploads/' . $picProfile)) :
           $query = "INSERT INTO `patient_medical_files`( `file_title`, `file_url`, `patient_id`, `uploaded_at`) VALUES ('".$_POST['fTitle']."','".$path."','".$docid."','".$today."')";
           $result = $con->query($query);
           echo "Succefully uploaded";
        else :
            echo "Something went wrong";
        endif;
    } catch (\Throwable $th) {
        echo "ERROR WHILE UPLOADING: " . $th;
    }


   // print_r($_FILES);


    //     $sql=mysqli_query($con,"INSERT INTO `patient_medical_files`( `file_title`, `file_url`, `patient_id`, `uploaded_at`) values('$file_title','$file_url','$patient_id','$uploaded_at')");
    // if ($query) {
    //         echo "<script>alert('Your Documents added successfully ');</script>";
    //     }
}
$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin | Medical History Documents</title>

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
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
</head>

<body>
    <div id="app">
        <?php include('include/sidebar.php'); ?>
        <div class="app-content">

            <?php include('include/header.php'); ?>

            <!-- end: TOP NAVBAR -->
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Medical History Documents</h1>

                            </div>
                        </div>
                </div>




                <div class="panel-body">
                    <form role="form" name="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="fess">
                                File Title
                            </label>
                            <input type="text" id="fTitle" name="fTitle" class="form-control" placeholder="Enter File Title" required="true">

                        </div>

                        <div class="form-group">
                            <label for="myfile">Select a file:</label>
                            <input type="file" id="myfile" name="patientDoc">
                        </div>
                        <!-- <div class="form-group">
                            <label for="">
                                Patient ID
                            </label>
                            <input type="text" id="pID" name="pID" class="form-control" placeholder="Enter Patient ID" required="true">

                        </div> -->
                        <div class="form-group">

                            <input type="hidden" value="<?php echo $today; ?>" class="form-control" id="date" name="date" readonly>

                        </div>  
                        <button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
                            Add
                        </button>
                </div>










                </form>
            </div>





        </div>
    </div>

    <!-- end: BASIC EXAMPLE -->
    <!-- end: SELECT BOXES -->

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
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <!-- start: CLIP-TWO JAVASCRIPTS -->

    <script src="assets/js/main.js"></script>
    <script src="assets/js/bill.js"></script>
    <!-- start: JavaScript Event Handlers for this page -->
    <script src="assets/js/form-elements.js"></script>
    <script>
        jQuery(document).ready(function() {
            Main.init();
            FormElements.init();
        });
    </script>
    <!-- end: JavaScript Event Handlers for this page -->
    <!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>