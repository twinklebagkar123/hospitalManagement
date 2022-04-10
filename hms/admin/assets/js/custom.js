$(document).ready(function () {
    $("#appointment_date").on("change", function() {
        var apt = $(this).val();
        var doc = $("#doctor").val();
        console.log(doc);

        $.ajax({
            type: "POST",
            url: "get_doctor.php",
            data: {
                appDate: apt,
                docID: doc
            },
            success: function(data) {
                $("#resultFetch").html(data);
            }
        });
    });
    var notificationResult = [];
    $("#existing_patient_admission").on("click", function () {
        $('#existing_customer_selectBy').css('display', 'block');
    });
    $("#adhar_card_registration").on("change", function () {
        console.log("On Adhar Card change: ",$(this).val())
        $.ajax({
            url: "logic/adhar_verify.php",
            method: "POST",
            data: {adhar_card_num: $(this).val()},
            success: function (data){
                console.log("On Ajax Reposnse: ",data);
                var response = JSON.parse(data);
                if(response.patientID == null){
                    return;
                }else{  
                    // $("#uid").val(response.patientID);
                    $('#customer_already_registered').css('display', 'block');
                    $('#customer_already_registered a').attr('href', `patient-admission.php?patientId=${response.patientID}`)
                    $('#customer_already_registered span').text(response.patientName);
                }
            }
        });
    });

    $(document).on("click", "#select_package", function () {
        var package_class = $('select[name="tariff_class_name_ideModal"]:checked').val();
        var package_category = $('select[name="tariff_cat_id_ideModal"]:checked').val();
        console.log(package_category,package_class);
    });
    $(document).on("click", "input[name='admissionType']", function () {
        if($('input[name="admissionType"]:checked').val() == 'ide'){
            $('#ide_package_modal').css('display', 'block');
        }    
        console.log("working");
    });
    $(document).on("click", ".close_modal_ide", function () {
        $('#ide_package_modal').css('display', 'none');
    });
    $(document).on("click", ".close_modal", function () {
        $('#multiple_patient_same_contact_modal').css('display', 'none');
    });
    $(document).on("click", "#multi_patient_submit", function () {
       var selected_id =  $('input[name="patient_id_multi_contact"]:checked').val();
       var selected_patient_name =  $('input[name="patient_id_multi_contact"]:checked').attr('patientName');
    //    console.log("PATIENT NAME OF SELECTED RADIO: ",selected_patient_name);
       $("#uid").val(selected_id);
       $('#patient_name_existing').text(selected_patient_name);
       $('#multiple_patient_same_contact_modal').css('display', 'none');
    });
    $(document).on("click", "#customer_input_search", function () {
        var inputKey = $(this).attr('data-selected_searchby');
        var searchBy = $('#existing_customer_input').val();
        // console.log($inputKey,$searchBy);
        $.ajax({
            url: "logic/customer_info.php",
            method: "POST",
            data: {inputKey: inputKey, searchBy: searchBy},
            success: function (data){
                var response = JSON.parse(data);
                if(response.length > 1){
                    $( "#multi_contact_results" ).empty();
                    $('#multiple_patient_same_contact_modal').css('display', 'block');
                    response.forEach(element => {
                        $('#multi_contact_results').append(`
                            <div class="form-group">
                                <label>
                                    ${element.patientName}
                                </label>
                                <input type="radio" name="patient_id_multi_contact" patientName="${element.patientName}" class="form-control" required="true" value=" ${element.patientID}">
                            </div>
                        `);
                    });
                }else{
                    $("#uid").val(response.patientID);
                    $('#patient_name_existing').text(response.patientName);
                }
            }
        });

    });
    $(".searchByAdmission").on("click", function () {
        var selected = $(this).data('customer_detail');
        switch (selected) {
            case "customer_id_admission":
                $('#existing_customer_input').attr('placeholder', "Please enter Customer Id");
                $('#existing_customer_input').removeAttr('readonly');
                
                $('#customer_input_search').attr('data-selected_searchby', "id");
                break;
            case "customer_contact_admission":
                $('#existing_customer_input').attr('placeholder', "Please enter Customer Phone Number");
                $('#existing_customer_input').removeAttr('readonly');
                $('#customer_input_search').attr('data-selected_searchby', "contact");
                break;
            default:
                $('#existing_customer_input').attr('placeholder', "Please enter Adhar Card Number");
                $('#existing_customer_input').removeAttr('readonly');
                $('#customer_input_search').attr('data-selected_searchby', "adhar");
                break;
        }
    });

    $(document).on("click", "#notification_info_click", function () {
        $('#notification_toggle_info').toggleClass('notification_detail');
        $.ajax({
            url: "update_read_receipt.php",
            method: "POST",
        });
    });
    function notificationDetails(data) {
        $.each(data, function (key, value) {
            $('#notification_toggle_info').append(`
                <li>
                    <div>
                        ${value.notification_message}
                    </div>
                </li> `
            );
        });
    }
    function load_unseen_notification() {
        $.ajax({
            url: "check_notification_service.php",
            method: "POST",
            dataType: "json",
            success: function (data) {
                const equals = (a, b) => a.length === b.length && a.every((v, i) => v === b[i]);
                if (!(typeof data !== 'undefined' && data.length === 0)) {
                    if (typeof notificationResult !== 'undefined' && notificationResult.length === 0) {
                        notificationResult = data;
                        notificationDetails(data);
                        $('#notification_counter').text(data.length);
                    } else {
                        var props = ['notification_id'];
                        var result = notificationResult.filter(function (o1) {
                            return !data.some(function (o2) {
                                return o1.id === o2.id;
                            });
                        }).map(function (o) {
                            return props.reduce(function (newo, name) {
                                newo[name] = o[name];
                                return newo;
                            }, {});
                        });
                        if (!(typeof result !== 'undefined' && result.length === 0)) {
                            notificationDetails(data);
                            notificationResult = data;
                        }
                    }
                }
            }
        });
    }
    setInterval(function () {
        load_unseen_notification();
    }, 8000);
    
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


});