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

console.log("PRICE OF : ",typeof(price))

bill.push(parseFloat(price));


if(!service || !price ){ 
     alert("Please fill the text boxes");
     return;

   }
   else{


$("#tbid").append('<tr><td>'+service+'</td><td>'+price+'</td><td> <button type="button" class="close" aria-label="Close" data-price="'+price+'"id="del"><span aria-hidden="true">&times;</span></button> </td></tr>');

 $("#service").val("");
$("#price").val("");
    sum = 0;
$.each(bill,function(){sum+=parseFloat(this) || 0;});

$("#total").html(sum);

}



});

function removeItemOnce(arr, value) {
  var index = arr.indexOf(value);
  console.log(index);
  if (index > -1) {
    console.log("hello....");
    arr.splice(index, 1);
  }
  console.log(arr);
  return arr;
}
$(document).on('click', "#tbid tr td button",  function() {



    var grandsubTotal=0;
    var removeprice=0;
    var total=0;



     removeprice =$(this).data("price") ;
     console.log("remove"+ typeof(removeprice));
     console.log("remove"+removeprice);
     console.log(bill+"array");
     if(jQuery.inArray(removeprice, bill)) {
      bill = removeItemOnce(bill,removeprice);
      console.log(bill);
    console.log("is in array");
} else {
    console.log("is NOT in array");
}
     total = parseFloat($('#total').text());
     console.log(total);
    $(this).parents("tr").remove();
     grandsubTotal =  total - removeprice ;
     //bill.pop(price);
     $("#total").html(" ");
     //console.log(bill);
     $('#total').html(grandsubTotal);
    
    
});
       
   });