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
                    <form id="contact-form" method="POST" action="email_script.php" role="form">

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