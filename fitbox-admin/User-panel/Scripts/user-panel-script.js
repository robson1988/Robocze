// ajax password update
$(document).ready(function(){
  $('#change-pass').click(function(event){
    event.preventDefault();
    $.ajax({
      url: "zmien-haslo",
      method: "post",
      data: $('#password-reset').serialize(),
      dataType: 'json',
      success: function( data ) {
        if(data.bool == false) {
          flashy(data.result, {
             type: 'flashy__danger'
          });
        } else {
        document.forms['password-reset'].reset();
        console.clear();
        flashy(data.result, {
           type: 'flashy__success'
        });
        }
      }
    })
  })
});

//////////////////////////////////////////////////////////

function cart(id)
{
var ele=document.getElementById(id);
var img_src=ele.getElementsByTagName("img")[0].src;
var meals=document.getElementById(id+"_posilki").value;
var kcal=document.getElementById(id+"_kalorycznosc").value;
var days=document.getElementById(id+"_dni").value;
var price=document.getElementById(id+"_price").value;

$.ajax({
    type:'post',
    url:'../Cart/store-items.php',
    data:{
      item_diet:ele,
      item_src:img_src,
      item_meals:meals,
      item_kcal:kcal,
      item_days:days,
      item_price:price
    },
    success:function(response) {
      alert(data);
      // document.getElementById("mycart").innerHTML=response;
    }
  });

}
