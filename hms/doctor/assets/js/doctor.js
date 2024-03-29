$(document).ready(function(){
    var medList = [];
    
    //from above getting index we can remove data when required.
    //also json stringify to store data in input type hidden and json decode in php 
    $(document).on("click","#remove_medicine", function(){
        var medRow = $(this).parent().parent().closest('tr').find('td').first().text();
        var medIndex = medList.map(function(e) { return e.medicineName; }).indexOf(medRow);
        medList.splice(medIndex, 1);
        
        $('#medicinePrescription').val(JSON.stringify(medList));
        $(this).parent().parent().closest('tr').remove();
    });
    $(document).on("click","#general_prescription", function(){
        $('.general_prescription').css("display","block");
        $('#medicinePrescriptionType').val("general_prescription");
        $('.hourly_prescription').css("display","none");
    });
    $(document).on("click","#hourly_prescription", function(){
        $('.general_prescription').css("display","none");
        $('#medicinePrescriptionType').val("hourly_prescription");
        $('.hourly_prescription').css("display","block");
    });
    $(document).on("click",".addMedicineBtn", function(){
        
        var prescription_type = $('#medicinePrescriptionType').val();
        if(prescription_type == "hourly_prescription"){
            var medicineName = $('.hourly_prescription .autosuggest').val();
            var medicineID = $('.hourly_prescription .autosuggest').attr("data-pillID");
            console.log("medicineID: "+medicineID);
            var start_from = $('#start_from').val();
            var dosage = $('#dosage_hourly').val();
            var interval_hourly = parseInt($('#interval_hourly').val());
            medList.push({medicineID: medicineID,medicineName: medicineName,start_from: start_from,dosage: dosage,interval_hourly: interval_hourly,prescription_type:prescription_type});
            $('#medicinePrescription').val(JSON.stringify(medList));
            $('#prescribedMedicineList').css("display","none"); 
            $('#prescribedMedicineListHourly').css("display","block"); 
            $('.medicineList').append(`<tr>
                <td>${medicineName}</td>
                <td>${start_from}</td>
                <td>${dosage}</td>
                <td><div class="row"><div class="col-md-6">${interval_hourly}</div><div class="col-md-6 text-right"><button  id="remove_medicine" class=" btn btn-primary" style="
                padding: 0px 10px;
            ">-</button></div></div>
                </td>
                </tr>`);
        }
        else{
            var medicineName = $('.general_prescription .autosuggest').val();
            var medicineID = $('.general_prescription .autosuggest').attr("data-pillID");
            console.log("medicineID: "+medicineID);
            var frequency = $('#frequency').val();
            var dosage = $('#dosage').val();
            var period = $('#period').val();
            var mealCheck = $('#meal_check');
            var mealDetail = "";
            if(mealCheck.is(':checked')){
                mealDetail = "Before Meal";
            }else{
                mealDetail = "After Meal";
            }
            medList.push({medicineID: medicineID,medicineName: medicineName,frequency: frequency,dosage: dosage,period: period,mealDetail:mealDetail,prescription_type:prescription_type});
            $('#medicinePrescription').val(JSON.stringify(medList));
            $('#prescribedMedicineList').css("display","block"); 
            $('#prescribedMedicineListHourly').css("display","none"); 
            $('.medicineList').append(`<tr>
                <td>${medicineName}</td>
                <td>${frequency}</td>
                <td>${dosage}</td>
                <td><div class="row"><div class="col-md-6">${period}</div><div class="col-md-6 text-right"><button  id="remove_medicine" class=" btn btn-primary" style="
                padding: 0px 10px;
            ">-</button></div></div>
                </td>
                <td>${mealDetail}</td>
                </tr>`);
        }
    });
    
    $(document).on("click",".pillResult span", function(){
        var name = $(this).data("name");
        var pillID = $(this).attr("data-pillID");
        console.log("pillID here"+ pillID);
        $('.autosuggest').val(name);
        $('.autosuggest').attr("data-pillID",pillID);
        $('.pillResult').empty();
        
        // var $edit = $("#result");
        // var curValue =  $("#result").val();
        // console.log(curValue);
        // console.log("name:"+name);
        
        // if(curValue.length > 0 ){
        //     var newValue = curValue+","+name;
        //     console.log("in loop:" +newValue);
        // }
        // else{
        //     var newValue = name;
        // }
        // console.log("newValue: "+newValue);
        // $edit.val(newValue);
        // $("#result").val().append(", ");
      });
    
    $(document).on("click", ".zap" , function() {
	    $(this).closest('.chip').fadeOut( 500, function() {
            var searchInArray = $(this).children('.medicineName').text();
            console.log("Chip On Click Value: ",searchInArray)
            let arrayFromRes = $("#result").val().split(','); 
            var index = arrayFromRes.indexOf(searchInArray);
            console.log( "print array",arrayFromRes,index);
            if (index > -1) {
            arrayFromRes.splice(index, 1);
            console.log( " in splice",arrayFromRes);
            }
            var stringvar = arrayFromRes.join(",").toString()
            console.log(stringvar+" string value");
            $("#result").val(stringvar);
	    	$(this).remove();
	    });
	});
});
