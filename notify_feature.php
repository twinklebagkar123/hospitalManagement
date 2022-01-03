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
            <div style="border: 3px solid #333;padding: 3%;">
                <div class="row">
                    <div class=" col-md-6">
                        <label for="form_message">Message *</label>
                        <div class="text-center"><textarea id="sms_textarea" name="sms_textarea" class="form-control" placeholder="Message*" rows="4" data-error="Please, leave a message."></textarea></div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="row" style="margin-top: 3%;">
                            <div class="col-md-4">
                                <input type="submit" id="all_sms" name="all_sms" class="btn btn-success btn-send" value="send SMS to all">
                            </div>
                            <div class="col-md-4">
                                <input type="submit" name="patients_sms" id="patients_sms" class="btn btn-success btn-send" value="send SMS to Patients">
                            </div>
                            <div class="col-md-4">
                                <input type="submit" name="staff_sms" id="staff_sms" class="btn btn-success btn-send" value="send SMS to Staffs">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 3%;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- <label for="form_email">Email Address</label> -->
                            <textarea id="contact_number_sms_custom" name="contact_number_sms" class="form-control" placeholder="Specify Phone Numbers with ',' if multiple recipents.*" rows="4" data-error="Email address required."></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="submit" id="manual_sms_submit" name="manual_sms_submit" class="btn btn-success btn-send" value="Send SMS">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form id="contact-form" method="POST" action="email_script.php" role="form">

                        <div class="messages"></div>

                        <div class="controls" style="border: 3px solid #333;padding: 3%;margin-top: 3%;">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">Subject</label>
                                        <input id="form_name" type="text" name="email_subject" class="form-control" placeholder="Subject *" required="required" data-error="Subject is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="form_message">Message *</label>
                                        <textarea id="form_message" name="email_message" class="form-control" placeholder="Message*" rows="4" required="required" data-error="Please, leave a message."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="margin-top: 4%;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="submit" name="all_mail" class="btn btn-success btn-send" value="send Mail to all">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="submit" name="patients_mail" class="btn btn-success btn-send" value="send Mail to Patients">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="submit" name="staff_mail" class="btn btn-success btn-send" value="send Mail to Staffs">
                                        </div>
                                    </div>
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
            <div id='DivIdToPrint'>
                <p>This is a sample text for printing purpose.</p>
            </div>
            <p>Do not print.</p>
            <input type='button' id='printDoc' value='Print'>
        </div>
    </main>

    <script src="hms/vendor/jquery/jquery.min.js"></script>
    <script src="hms/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            function sendSms(smsType) {
                var message = $('#sms_textarea').val();
                var contacts = $('#contact_number_sms_custom').val();
                if (message.length > 0) {
                    $.ajax({
                        url: "/hospital/email_script.php",
                        dataType: "json",
                        type: "Post",
                        async: true,
                        data: {
                            "sms_type": smsType,
                            "message": message,
                            "numbers": contacts,
                        },
                        success: function(data) {
                            console.log(data);
                            alert(data.message[0]);
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
                            console.log(msg);
                            alert(msg);
                        }
                    });
                }
            }
            $('#all_sms').click(function() {
                sendSms(1);
            });
            $('#patients_sms').click(function() {
                sendSms(2);
            });
            $('#staff_sms').click(function() {
                sendSms(3);
            });
            $('#manual_sms_submit').click(function() {
                sendSms(4);
            });
            /*
            SMS TYPE:  
            all_sms - 1,
            patients_sms - 2,
            staff_sms -3,
            manual_sms_submit - 4,
            */
            function printDiv() 
    {

            var divToPrint=document.getElementById('DivIdToPrint');

            var newWin=window.open('','Print-Window');

            newWin.document.open();

            newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

            newWin.document.close();

            setTimeout(function(){newWin.close();},10);

            }
            $(document).on("click", "#printDoc", function () {
                printDiv();
            });
        });
    </script>
    <!-- <footer></footer> -->
</body>

</html>