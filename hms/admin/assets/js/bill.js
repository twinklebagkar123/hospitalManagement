$( document ).ready(function() {
    
var bill = [];

$("#price").on('keydown ',function(){ 
    
var position = this.selectionStart - 1;
                //remove all but number and .
                var fixed = this.value.replace(/[^0-9\.]/g, '');
                if (fixed.charAt(0) === '.')                  //can't start with .
                    fixed = fixed.slice(1);

                var pos = fixed.indexOf(".") + 1;
                if (pos >= 0)               //avoid more than one .
                    fixed = fixed.substr(0, pos) + fixed.slice(pos).replace('.', '');

                if (this.value !== fixed) {
                    this.value = fixed;
                    this.selectionStart = position;
                    this.selectionEnd = position;
                }
    });



   $("#add").on('click',function(){
    
          var service = $("#service").val();
 var price = $("#price").val();



bill.push(price);


if(!service || !price ){ 
     alert("Please fill the text boxes");
     return;

   }
   else{


$("#tbid").append('<tr><td>'+service+'</td><td>'+price+'</td></tr>');
 $("#service").val("");
$("#price").val("");
    sum = 0;
$.each(bill,function(){sum+=parseFloat(this) || 0;});

$("#total").html(sum);

}



});


       
   });