<?php include "include/header_structured.php"; ?>
<div class="wrap-content container" id="container">
    <!-- start: PAGE TITLE -->
    <section id="page-title">
        <div class="row">
            <div class="col-sm-8">
                <h1 class="mainTitle">Admin | Book Appointment</h1>
            </div>
            <ol class="breadcrumb">
                <li>
                    <span>Admin</span>
                </li>
                <li class="active">
                    <span>Book Appointment</span>
                </li>
            </ol>
        </div>
    </section>
    <!-- end: PAGE TITLE -->
    <!-- start: BASIC EXAMPLE -->
    <div class="container-fluid container-fullw bg-white">
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
</div>
<?php include "include/footer_structured.php"; ?>