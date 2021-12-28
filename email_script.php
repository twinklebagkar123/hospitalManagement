<?php
session_start();
// error_reporting(0);
include('hms/admin/include/config.php'); 
include('hms/admin/include/checklogin.php');

    if(isset($_POST['patients_mail'])):
        fetchEmailAddresses("2",$_POST['email_subject'],$_POST['email_message']);
    elseif(isset($_POST['staff_mail'])):
        fetchEmailAddresses("1",$_POST['email_subject'],$_POST['email_message']);
    elseif(isset($_POST['all_mail'])):
        fetchEmailAddresses("3",$_POST['email_subject'],$_POST['email_message']);
    elseif(isset($_POST['manual_email_submit'])):
        fetchEmailAddresses("4",$_POST['email_subject'],$_POST['email_message'],$_POST['email_address_mail']);
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
            case '4':
                send_mail($email_addresses,$subject,$message);
                break;
            default:
                
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
            echo "Message sent to" .$to. "successfully... \n";
        } else {
            echo "Message could not be sent to" .$to. "\n";
        }
    }
    ?>