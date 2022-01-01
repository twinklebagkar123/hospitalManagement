<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="hms/vendor/bootstrap/css/bootstrap.min.css">
    <title>Send Bulk SMS/EMAIL</title>
</head>

<body>
    <!-- <header></header> -->
    <main>
        <div class="container">
            <?php
            session_start();
            // error_reporting(0);
            include('hms/admin/include/config.php');
            include('../urlMapping.php'); 
            
            // global $con;
            include('hms/admin/include/checklogin.php');

            if (isset($_POST['patients_mail'])) :
                fetchEmailAddresses("2", $_POST['email_subject'], $_POST['email_message']);
            elseif (isset($_POST['staff_mail'])) :
                fetchEmailAddresses("1", $_POST['email_subject'], $_POST['email_message']);
            elseif (isset($_POST['all_mail'])) :
                fetchEmailAddresses("3", $_POST['email_subject'], $_POST['email_message']);
            elseif (isset($_POST['manual_email_submit'])) :
                fetchEmailAddresses("4", $_POST['email_subject'], $_POST['email_message'], $_POST['email_address_mail']);
            elseif (isset($_POST['sms_type'])) :
                sendSMS($_POST['message'], $_POST['numbers'], $_POST['sms_type']);
            endif;

            /*type
    1. Staff
    2. Patient
    3. All
    */
            function fetchEmailAddresses($type, $subject, $message, $email_addresses = "")
            {

                $result = [];
                switch ($type) {

                    case '1':
                        global $con;
                        $sql = "SELECT DISTINCT `docEmail` FROM `doctors`";
                        $ret = mysqli_query($con, $sql);
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($ret)) {
                            // echo ;
                            array_push($result, $row['docEmail']);
                        }
                        break;

                    case '2':
                        global $con;
                        $sql = "SELECT DISTINCT `PatientEmail` FROM `tblpatient`";
                        $ret = mysqli_query($con, $sql);
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($ret)) {
                            // echo $row['PatientEmail'];
                            array_push($result, $row['PatientEmail']);
                        }
                        break;

                    case '3':
                        global $con;
                        $sql = "SELECT DISTINCT `PatientEmail` as emailAddress FROM `tblpatient`;SELECT DISTINCT `docEmail`  as emailAddress FROM `doctors`";
                        if (mysqli_multi_query($con, $sql)) {
                            do {
                                if ($resp = mysqli_store_result($con)) {
                                    while ($row = mysqli_fetch_row($resp)) {
                                        array_push($result, $row[0]);
                                    }
                                    //   global $con;
                                    mysqli_free_result($resp);
                                }
                            } while (mysqli_next_result($con));
                        }
                        break;
                    case '4':
                        send_mail($email_addresses, $subject, $message);
                        break;
                    default:
                        break;
                }
                foreach ($result as $val) {
                    send_mail($val, $subject, $message);
                }
                global $con;
                store_record_in_db($type, "", "email", $con);
                // global $home_url;
                // $actual_link = $home_url."hospital/notify_feature.php?success=1";
                // header("Location: $actual_link");
                // echo $rep;
            }
            function send_mail($to, $subject, $message)
            {
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
                    echo "Email sent to " . $to . " successfully... \n";
                } else {
                    echo "Email could not be sent to " . $to . "\n";
                }
            }
            /*
    SMS TYPE:  
    all_sms - 1,
    patients_sms - 2,
    staff_sms -3,
    manual_sms_submit - 4,
    */
            function sendSMS($message, $numbers, $smsType)
            {

                $contactNumber = "";
                $result = [];
                if ($smsType == '1') :
                    global $con;
                    $sql = "SELECT DISTINCT `PatientContno` as contactNumber FROM `tblpatient`;SELECT DISTINCT `contactno`  as contactNumber FROM `doctors`";
                    if (mysqli_multi_query($con, $sql)) :
                        do {
                            if ($resp = mysqli_store_result($con)) {
                                while ($row = mysqli_fetch_row($resp)) {
                                    array_push($result, $row[0]);
                                }
                                //   global $con;
                                mysqli_free_result($resp);
                            }
                        } while (mysqli_next_result($con));
                        $contactNumber = implode(", ", $result);

                    endif;
                elseif ($smsType == '2') :
                    global $con;
                    $sql = "SELECT DISTINCT `PatientContno` FROM `tblpatient`";
                    $ret = mysqli_query($con, $sql);
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($ret)) {
                        // echo $row['PatientEmail'];
                        array_push($result, $row['PatientContno']);
                    }
                    $contactNumber = implode(", ", $result);
                elseif ($smsType == '3') :
                    global $con;
                    $sql = "SELECT DISTINCT `contactno` FROM `doctors`";
                    $ret = mysqli_query($con, $sql);
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($ret)) {
                        // echo ;
                        array_push($result, $row['contactno']);
                    }
                    $contactNumber = implode(", ", $result);
                elseif ($smsType == '4') :
                    $contactNumber = $numbers;
                endif;
                $url = 'https://www.fast2sms.com/dev/bulkV2';
                $query_fields = [
                    "route" => "v3",
                    "sender_id" => "Cghpet",
                    "message" => $message,
                    "language" => "english",
                    "flash" => 0,
                    "numbers" => $contactNumber,
                    "authorization : sq40u1cGfmVrJUBbi62nxMD8ON9RghjwLQHdSCaPoA5XFKv3ItTCHWxe9rUGnfZPOi4gyv3Y2q76zdMu"
                    // "numbers" => "7038544429,8999052871",
                ];
                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $query_fields);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                    'authorization: sq40u1cGfmVrJUBbi62nxMD8ON9RghjwLQHdSCaPoA5XFKv3ItTCHWxe9rUGnfZPOi4gyv3Y2q76zdMu',
                    // 'Content-Type : application/json'
                ));
                $response = curl_exec($curl);
                $jsonRes = json_decode($response);
                curl_close($curl);
                global $con;
                $rep = store_record_in_db($smsType, $jsonRes->message[0], "sms", $con);
                // echo $rep;
                echo $response;
            }

            function store_record_in_db($sms_email_type, $remark, $sms_or_email, $con)
            {
                // global $con;
                $datetime = date("Y-m-d H:i:s");
                $query = "INSERT INTO `sms_email_record`( `sms_email_type`,`sent_at`, `remark`, `sms_or_email`) values ('" . $sms_email_type . "','" . $datetime . "','" . $remark . "','" . $sms_or_email . "')";
                $result = mysqli_query($con, $query);
                return $query . "  " . $result;
            }
            ?>
            <div class="col-md-12 text-center">
                <?php $actual_link = "/notify_feature.php"; 
                global $home_url;?>
                    <a href="<?php echo $home_url.$actual_link; ?>" class="btn btn-success btn-send">🔙 Go Back</a>
                <!-- <input type="submit" id="manual_sms_submit" name="manual_sms_submit" class="btn btn-success btn-send" value="Send SMS"> -->
            </div>
        </div>
    </main>
</body>

</html>