$(document).ready(function(){
    $(document).on("click","#pillResult span", function(){
        console.log("hello");
        var name = $(this).data("name");
        var $edit = $("#result");
        var curValue =  $("#result").val();
        console.log(curValue);
        console.log("name:"+name);
        $('#medicalResult').append(`<div class="chip">
        <span>${name}</span>
        <button type="button" class="zap">X</button>
        </div>`);
        // if(curValue.length > 0 ){
           
        //     var newValue = curValue+" , "+name;
        //     console.log("in loop:" +newValue);
        // }
        // else{
        //     var newValue = name;
        // }
        // console.log("newValue: "+newValue);
        // $edit.val(newValue);
        //$("#result").val().append(+" , ");
      });
    $(document).on("click", ".zap" , function() {
	    $(this).closest('.chip').fadeOut( 500, function() { 
	    	$(this).remove();
	    });
	});
});
