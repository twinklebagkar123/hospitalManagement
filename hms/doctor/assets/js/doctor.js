$(document).ready(function(){
    $(document).on("click","#pillResult span", function(){
        console.log("hello");
        var name = $(this).data("name");
        var $edit = $("#result");
        var curValue = $edit.val();
        console.log(curValue);
        if(curValue = ""){
            var newValue = name;
        }
        else{
            var newValue = curValue + " , "+name;
            console.log("hi");
        }
        console.log("newValue"+newValue);
        $edit.val(newValue);
        //$("#result").val().append(+" , ");
      });
});