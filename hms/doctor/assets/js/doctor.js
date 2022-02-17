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
    $(document).on("click","#addMedicine", function(){
        var medicineName = $('#autosuggest').val();
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
        medList.push({medicineName: medicineName,frequency: frequency,dosage: dosage,period: period,mealDetail:mealDetail});
        $('#medicinePrescription').val(JSON.stringify(medList));
        $('#prescribedMedicineList').css("display","block"); 
        $('#medicineList').append(`<tr>
            <td>${medicineName}</td>
            <td>${frequency}</td>
            <td>${dosage}</td>
            <td><div class="row"><div class="col-md-6">${period}</div><div class="col-md-6 text-right"><button  id="remove_medicine" class=" btn btn-primary" style="
            padding: 0px 10px;
        ">-</button></div></div>
            </td>
            <td>${mealDetail}</td>
            </tr>`);
    });
    $(document).on("click","#pillResult span", function(){
        
        console.log("hello");
        var name = $(this).data("name");
        $('#autosuggest').val(name);
        $('#pillResult').empty();
        
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
