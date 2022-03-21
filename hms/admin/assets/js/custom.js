$(document).ready(function(){
    var notificationResult = [];
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
                    console.log("case 2");
                   }else{
                    var props = ['notification_id'];
                    var result = notificationResult.filter(function(o1){
                        // filter out (!) items in result2
                        return !data.some(function(o2){
                            return o1.id === o2.id;          // assumes unique id
                        });
                    }).map(function(o){
                        // use reduce to make objects with only the required properties
                        // and map to apply this to the filtered array as a whole
                        return props.reduce(function(newo, name){
                            newo[name] = o[name];
                            return newo;
                        }, {});
                    });
                       console.log("Array Notification & Data ajax",notificationResult,data)
                        if(typeof result !== 'undefined' && result.length === 0){
                            console.log("Duplicate Result");
                        }else{
                            notificationDetails(data);
                            notificationResult = data;
                            console.log("case 1");
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