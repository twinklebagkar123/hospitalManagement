$(document).ready(function(){
$(document).on("click", "#notification_info_click" , function() {
    $('#notification_toggle_info').toggleClass('notification_detail');
    console.log("Notification Detail");
});
});