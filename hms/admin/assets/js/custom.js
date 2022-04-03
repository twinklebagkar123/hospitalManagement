$(document).ready(function () {
    var notificationResult = [];
    $("#existing_patient_admission").on("click", function () {
        $('#existing_customer_selectBy').css('display', 'block');
    });
    $("#customer_input_search").on("click", function () {

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
                console.log(data);
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
    
});