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
        <div class="row">
            <div class="col-md-12 text-center">
                <button id="bulk_sms" class="btn btn-success">Send SMS</button>
            </div>
        </div>
    </main>
    <?php 
        $to = "porobjagannath@gmail.com";
        $subject = "This is subject";
        
        $message = "<b>This is HTML message.</b>";
        $message .= "<h1>This is headline.</h1>";
        
        $header = "From:info@weblozee.com \r\n";
        // $header .= "Cc:afgh@somedomain.com \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";
        
        $retval = mail ($to,$subject,$message,$header);
        
        if( $retval == true ) {
           echo "Message sent successfully...";
        }else {
           echo "Message could not be sent...";
        }
    ?>
    <script src="hms/vendor/jquery/jquery.min.js"></script>
    <script src="hms/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#bulk_sms').click(function(){
                console.log("Test on click");
                $.ajax({
                    
        url: "https://www.fast2sms.com/dev/bulkV2",
        headers: {
            "authorization":"sq40u1cGfmVrJUBbi62nxMD8ON9RghjwLQHdSCaPoA5XFKv3ItTCHWxe9rUGnfZPOi4gyv3Y2q76zdMu",
            "Content-Type":"application/json",
            'Access-Control-Allow-Origin': "https://www.fast2sms.com",
            "Access-Control-Allow-Methods": "GET,HEAD,OPTIONS,POST,PUT",
            "Access-Control-Allow-Headers":"Origin, X-Requested-With, Content-Type, Accept, Authorization",
        },
        withCredentials: true,
        crossDomain: true,
        dataType: "json",
        type: "Post",
        async: true,
        data: {
            "route" : "v3",
            "sender_id" : "Cghpet",
            "message" : "Hello! how are you?",
            "language" : "english",
            "flash" : 0,
            "numbers" : "7038544429,8999052871",
        },
        success: function (data) {
           console.log(data);
        },
        error: function (xhr, exception) {
            var msg = "";
            if (xhr.status === 0) {
                msg = "Not connect.\n Verify Network." + xhr.responseText;
            } else if (xhr.status == 404) {
                msg = "Requested page not found. [404]" + xhr.responseText;
            } else if (xhr.status == 500) {
                msg = "Internal Server Error [500]." +  xhr.responseText;
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