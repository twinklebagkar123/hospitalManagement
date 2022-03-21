$(document).ready(function(){
    $(document).on("click", "#notification_info_click" , function() {
        $('#notification_toggle_info').toggleClass('notification_detail');
        console.log("Notification Detail");
    });
    function load_unseen_notification(){
        $.ajax({
            url:"check_notification_service.php",
            method:"POST",
            dataType:"json",
            success:function(data){
            //  console.log("Notification Output: ",data);
            $.each( data, function( value ) {
                console.log("Each Output: ",value);
            }
            //  data.each(function(result) {
              
            //     console.log(" \n");
            //  })
            // }
        });
    }
    setInterval(function(){
        load_unseen_notification();;
    }, 5000);
});