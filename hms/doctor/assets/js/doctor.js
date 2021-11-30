$(document).ready(function(){
    $(document).on("click","#pillResult span", function(){
        console.log("hello");
        var name = $(this).data("name");
        var $edit = $("#result");
        var curValue =  $("#result").val();
        console.log(curValue);
        console.log("name:"+name);
        $('#medicalResult').append(`<div class="chip">
        <span class="medicineName">${name}</span>
        <button type="button" class="zap">X</button>
        </div>`);
        if(curValue.length > 0 ){
            var newValue = curValue+", "+name;
            console.log("in loop:" +newValue);
        }
        else{
            var newValue = ' '+name;
        }
        console.log("newValue: "+newValue);
        $edit.val(newValue);
        // $("#result").val().append(", ");
      });
    $(document).on("click", ".zap" , function() {
	    $(this).closest('.chip').fadeOut( 500, function() {
            var searchInArray = $(this).children('.medicineName').text();
            let arrayFromRes = $("#result").val().split(','); 
            const index = arrayFromRes.indexOf(searchInArray);
            console.log( "print array",arrayFromRes);
            if (index > -1) {

            arrayFromRes.splice(index, 1);
            console.log( " in splice",arrayFromRes);
            }
            // else{
            //     arrayFromRes = [];
            // }
            var stringvar = arrayFromRes.join(",").toString()
            console.log(stringvar+" string value");
            $("#result").val(stringvar);
	    	$(this).remove();
            console.log("Chip On Click Value: ",searchInArray)
	    });
	});
});
