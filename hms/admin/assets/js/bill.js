
$( document ).ready(function() {
    
var bill = [];

$("#price").on('keydown ',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^0-9]/,/[^\d.]/g,'') );


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