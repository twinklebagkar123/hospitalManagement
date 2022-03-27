jQuery(document).ready(function () {
    console.log("code here");
   

    function valid() {
        if (document.adddoc.npass.value != document.adddoc.cfpass.value) {
            alert("Password and Confirm Password Field do not match  !!");
            document.adddoc.cfpass.focus();
            return false;
        }
        return true;
    }




    function checkemailAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data: 'nameTest=' + $("#name").val(),
            type: "POST",
            success: function (data) {
                $("#email-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error: function () { }
        });
    }

    function blockSpecialChar(e) {
        var k;
        document.all ? k = e.keyCode : k = e.which;
        return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57));
    }


    jQuery(document).ready(function () {
       



        Main.init();
        FormElements.init();
        var values = [];
        var jsonFieldDetails = [];
        $("#addField").on("click", function () {

            var fieldName = $("#fieldName").val();
            var noValueCheckbox = $("#noValueCheckbox").val();
            var unit_check = $("#units").is(":checked");
            var referanceRange_check = $("#ref").is(":checked");
            var normalRange_check = $("#normalRange").is(":checked");
            var unit, referanceRange, normalRange;
            // if(unit_check){
            // 	unit=$("#units_value").val();
            // }
            // if(referanceRange_check){
            // 	referanceRange=$("#referance_value").val();
            // }
            // if(normalRange_check){
            // 	normalRange=$("#normalRange_value").val();
            // }



            // values.push({"fieldName":fieldName,"units":unit,"referanceRange":referanceRange,"normalRange":normalRange});
            // console.log(values);


            if ($('#noValueCheckbox').is(':checked')) {
                var trow = "<tr><td>" + fieldName + "</td><td class='remove' data-name='" + fieldName + "'>X</td></tr>";
                $("#fieldShow").append(trow);


                values.push({
                    "fieldName": fieldName+"*",
                    "units": "",
                    "referanceRange": "",
                    "normalRange": ""
                });

             //   valuesString = values.toString();
                $("#fieldArray").val(values);
            } else {
                if (unit_check) {
                    unit = $("#units_value").val();
                }
                if (referanceRange_check) {
                    referanceRange = $("#referance_value").val();
                }
                if (normalRange_check) {
                    normalRange = $("#normalRange_value").val();
                }


                var trow = "<tr><td>" + fieldName + "</td><td>" + unit + "</td><td>" + referanceRange + "</td><td>" + normalRange + "</td><td class='remove' data-name='" + fieldName + "" + unit + "" + referanceRange + "" + normalRange + "'>X</td></tr>";
                $("#fieldShow").append(trow);
                values.push({
                    "fieldName": fieldName,
                    "units": unit,
                    "referanceRange": referanceRange,
                    "normalRange": normalRange

                });
                console.log(values);
                //valuesString = values.toString();
               // console.log(valuesString);
                $("#fieldArray").val(values);

                // $("#fieldShow").append(trow);

                // values.push(fieldName,unit,referanceRange,normalRange);
                // 
            }



        });
        $(document).on("click", ".remove", function () {
            var shanti = $(this).data("name");
            var index = jsonFieldDetails.indexOf(shanti);
            if (index > -1) {
                jsonFieldDetails.splice(index, 1);
            }
            console.log(jsonFieldDetails);
            jsonFieldDetailsString = jsonFieldDetails.toString();
            $("#fieldArray").val(jsonFieldDetailsString);
            $(this).parent().remove();

        });



    });


    $(document).on("change", "#units", function () {

        if ($('#units').is(":checked")) {

            $(".units").show();

        } else {
            $(".units").hide();
        }

    });
    $(document).on("change", "#ref", function () {

        if ($('#ref').is(":checked")) {

            $(".referance_r").show();

        } else {
            $(".referance_r").hide();
        }

    });
    $(document).on("change", "#normalRange", function () {

        if ($('#normalRange').is(":checked")) {

            $(".normalRange").show();

        } else {
            $(".normalRange").hide();
        }

    });


});