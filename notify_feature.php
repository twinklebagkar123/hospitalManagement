<?php 
session_start();
// error_reporting(0);
include('hms/admin/include/config.php'); 
include('hms/admin/include/checklogin.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="hms/vendor/bootstrap/css/bootstrap.min.css">
    <title>Send Bulk SMS</title>
</head>

<body>
    <!-- <header></header> -->
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <button id="bulk_sms" class="btn btn-success">Send SMS</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form id="contact-form" method="POST" action="" role="form">

                        <div class="messages"></div>

                        <div class="controls">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_name">Subject</label>
                                        <input id="form_name" type="text" name="email_subject" class="form-control" placeholder="Subject *" required="required" data-error="Subject is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                          
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">Message *</label>
                                        <textarea id="form_message" name="email_message" class="form-control" placeholder="Message*" rows="4" required="required" data-error="Please, leave a message."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="submit" name="all_mail" class="btn btn-success btn-send" value="Mail to all">
                                </div>
                                <div class="col-md-4">
                                    <input type="submit" name="patients_mail" class="btn btn-success btn-send" value="Mail to Patients">
                                </div>
                                <div class="col-md-4">
                                    <input type="submit" name="staff_mail" class="btn btn-success btn-send" value="Mail to Staffs">
                                </div>
                            </div>
                              <div class="row" style="margin-top: 3%;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!-- <label for="form_email">Email Address</label> -->
                                        <textarea id="email_addresses_manual" name="email_address_mail" class="form-control" placeholder="Specify email address with ',' if multiple recipents.*" rows="4" data-error="Email address required."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="submit" name="manual_email_submit" class="btn btn-success btn-send" value="Send Mail">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php
    if(isset($_POST['patients_mail'])):
        fetchEmailAddresses("2",$_POST['email_subject'],$_POST['email_message']);
    elseif(isset($_POST['staff_mail'])):
        fetchEmailAddresses("1",$_POST['email_subject'],$_POST['email_message']);
    elseif(isset($_POST['all_mail'])):
        fetchEmailAddresses("3",$_POST['email_subject'],$_POST['email_message']);
    elseif(isset($_POST['manual_email_submit'])):
        fetchEmailAddresses("4",$_POST['email_subject'],$_POST['email_message'],$_POST['email_addresses_manual']);
    endif;
    /*type
    1. Staff
    2. Patient
    3. All
    */
    
    function fetchEmailAddresses($type,$subject,$message,$email_addresses = "") {  
        
        $result = [];  
        switch ($type) {
           
            case '1':
                global $con;
                $sql = "SELECT DISTINCT `docEmail` FROM `doctors`";
                $ret = mysqli_query($con, $sql);
                $cnt = 1;
                while ($row = mysqli_fetch_array($ret)) {
                    // echo ;
                    array_push($result,$row['docEmail']);
                }
                break;
            
            case '2':
                global $con;
                $sql = "SELECT DISTINCT `PatientEmail` FROM `tblpatient`";
                $ret = mysqli_query($con, $sql);
                $cnt = 1;
                while ($row = mysqli_fetch_array($ret)) {
                    // echo $row['PatientEmail'];
                    array_push($result,$row['PatientEmail']);
                }
                break;
            
            case '3':
                global $con;
                $sql = "SELECT DISTINCT `PatientEmail` as emailAddress FROM `tblpatient`;SELECT DISTINCT `docEmail`  as emailAddress FROM `doctors`";
                if (mysqli_multi_query($con,$sql)){
                    do{
                       if ($resp=mysqli_store_result($con)){
                          while ($row=mysqli_fetch_row($resp)){
                            array_push($result,$row[0]);
                          }
                        //   global $con;
                          mysqli_free_result($resp);
                       }
                    }while (mysqli_next_result($con));
                 }
                break;
            
            default:
                send_mail($email_addresses,$subject,$message);
                break;
        }
        foreach($result as $val){
            send_mail($val,$subject,$message);
        }
    }
    function send_mail($to,$subject,$message){
        // $to = "porobjagannath@gmail.com,info@weblozee.com,twinklebagkar99@gmail.com";
        // $subject = "We are launching.";

        // $message = "<b>We're Glad to see you again.</b>";
        // $message .= "<h1>Come for party.</h1>";

        $header = "From:info@adpigo.com \r\n";
        // $header .= "Cc:afgh@somedomain.com \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";

        $retval = mail($to, $subject, $message, $header);

        if ($retval == true) {
            echo "Message sent successfully...";
        } else {
            echo "Message could not be sent...";
        }
    }
    ?>
    <script src="hms/vendor/jquery/jquery.min.js"></script>
    <script src="hms/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#bulk_sms').click(function() {
                console.log("Test on click");
                $.ajax({
                    url: "https://www.fast2sms.com/dev/bulkV2",
                    headers: {
                        "authorization": "sq40u1cGfmVrJUBbi62nxMD8ON9RghjwLQHdSCaPoA5XFKv3ItTCHWxe9rUGnfZPOi4gyv3Y2q76zdMu",
                        "Content-Type": "application/json",
                        'Access-Control-Allow-Origin': "https://www.fast2sms.com",
                        "Access-Control-Allow-Methods": "GET,HEAD,OPTIONS,POST,PUT",
                        "Access-Control-Allow-Headers": "Origin, X-Requested-With, Content-Type, Accept, Authorization",
                    },
                    withCredentials: true,
                    crossDomain: true,
                    dataType: "json",
                    type: "Post",
                    async: true,
                    data: {
                        "route": "v3",
                        "sender_id": "Cghpet",
                        "message": "Hello! how are you?",
                        "language": "english",
                        "flash": 0,
                        "numbers": "7038544429,8999052871",
                    },
                    success: function(data) {
                        console.log(data);
                    },
                    error: function(xhr, exception) {
                        var msg = "";
                        if (xhr.status === 0) {
                            msg = "Not connect.\n Verify Network." + xhr.responseText;
                        } else if (xhr.status == 404) {
                            msg = "Requested page not found. [404]" + xhr.responseText;
                        } else if (xhr.status == 500) {
                            msg = "Internal Server Error [500]." + xhr.responseText;
                        } else if (exception === "parsererror") {
                            msg = "Requested JSON parse failed.";
                        } else if (exception === "timeout") {
                            msg = "Time out error." + xhr.responseText;
                        } else if (exception === "abort") {
                            msg = "Ajax request aborted.";
                        } else {
                            msg = "Error:" + xhr.status + " " + xhr.responseText;
                        }

                    }
                });
            })
        });
    </script>
    <!-- <footer></footer> -->
</body>

</html>