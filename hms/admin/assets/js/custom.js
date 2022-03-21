$(document).ready(function(){
    $notificationResult = [];
    $(document).on("click", "#notification_info_click" , function() {
        $('#notification_toggle_info').toggleClass('notification_detail');
        console.log("Notification Detail");
    });
    function notificationDetails(data){
        $.each(data, function(key, value ) {
            $('#notification_toggle_info').append(`
                <li>
                    <div>
                        ${value.notification_message}
                    </div>
                </li> `
            );
            // console.log("Each Output: ",key,value);
            console.log("Each Output: ",value.notification_type);
            
        });
    }
    function load_unseen_notification(){
        $.ajax({
            url:"check_notification_service.php",
            method:"POST",
            dataType:"json",
            success:function(data){
               const equals = (a, b) => a.length === b.length &&  a.every((v, i) => v === b[i]);
               if (typeof data !== 'undefined' && data.length === 0) {
                   console.log("No Notification Available");
               }else{
                   if(typeof notificationResult !== 'undefined' && notificationResult.length === 0){
                    notificationResult = data;
                    notificationDetails(data);
                    $('#notification_counter').text(data.length);
                   }else{
                        if(equals(notificationResult, data)){
                            console.log("Duplicate Result");
                        }else{
                            notificationDetails(data);
                            notificationResult = data;
                        }
                   }      
               }  
            //  console.log("Notification Output: ",data);      
        }
            //  data.each(function(result) {
              
            //     console.log(" \n");
            //  })
            // }
        });
    }
    setInterval(function(){
        load_unseen_notification();
    }, 8000);
});