$(document).ready(function(){
    $(document).on("click","#addMedicine", function(){
        var medicineName = $('#autosuggest').val();
        var frequency = $('#frequency').val();
        var dosage = $('#dosage').val();
        var period = $('#period').val();
        $('#medicineList').append(`<tr>
            <td>${medicineName}</td>
            <td>${frequency}</td>
            <td>${dosage}</td>
            <td>${period}</td></tr>`);
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
