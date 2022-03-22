$(document).ready(function () {
    var notificationResult = [];
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