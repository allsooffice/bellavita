//--------------------INFO PIZZA ALL----------------------

//blokada wykonywania funkcji
var lock = false;

function showInfoAboutPizza(pizzaId)
{
   var wievport = $( window ).width();
   if(lock == false)
   {
      $(".prev").hide();
      if(wievport <= 479)
         {
            $(".pizza-info").animate({
               left: "2.5%"
            }, 700);
         }
      else
         {
            $(".pizza-info").animate({
               left: "6%"
            }, 700);
         }
      $(".pizza-info").load("php/pizza-info-box.php?id="+pizzaId, function(){
            closePizzaInfo();
            moveToSelectedPizza();
      });
   }
}

function hideInfoAboutPizza()
{
   $(".prev").fadeIn(); 
   $(".pizza-info").animate({
      left: "-105%"
   }, 700);
}

function closePizzaInfo()
{
   $(".pizza-info i").click(function(){
      hideInfoAboutPizza();
      resetAllSlices();
   })
}

function resetAllSlices()
{
   var sliceQuantity = $(".pizza-circle").children().length;
   var i = 0;
   while(i < sliceQuantity)
      {
      var oldClass = $(".pizza-circle").children()[i].classList[1];
      if(oldClass)
         {
            $(".pizza-circle").children().removeClass(oldClass);
         }
      i++;
   }
}


//kliknieci na kawalek pizzy
function sliceClick()
{
$(".pizza-circle").children().click(function(clickPoint){
   var pizzaId = $(this).attr("name");
   var headClass = $(this).prop("classList")[0];
   var headClassNext = $(this).next().prop("classList")[0];
   var activeClass = $(this).prop("classList")[1];
   var activeClassNext = $(this).next().prop("classList")[1];
   var offset = $(this).offset();
   var pointX = clickPoint.pageX - offset.left;
   var pointY = clickPoint.pageY - offset.top;
   resetAllSlices();
   if(lock == false)
   {
      if(pointX < 135 && pointY > 60)
         {
            if(activeClassNext)
               {
                  $(this).next().removeClass(headClassNext+'-active');
                  hideInfoAboutPizza();
                  $(this).next().hover();
               }
            else
               {
                  pizzaId++;
                  $(this).next().addClass(headClassNext+'-active');
                  showInfoAboutPizza(pizzaId);
               }
         }
      else
         {
            if(activeClass)
               {
                  $(this).removeClass(headClass+'-active');
                  hideInfoAboutPizza();
                  $(this).hover();
               }
            else
               {
                  $(this).addClass(headClass+'-active');
                  showInfoAboutPizza(pizzaId);
               }
         }
   }
});
}


//---------------------OBRACANIE PIZZY--------------------------
function movePizzaRight(){
   lock = true;
   var position = parseInt($(".pizza-circle").attr('name'));
   var move = position + 45;
   $({deg: position}).animate({deg: move}, {
      step: function(now, fx){
         $(".pizza-circle").css({
              transform: "rotate(" + now + "deg)"
         });
         lock = false;
      }
   });
      
   //zapisanie obrotow w name
   var position = $(".pizza-circle").attr('name', move);
   hideInfoAboutPizza();
   resetAllSlices();
   schowNextPizza();
}

function movePizzaLeft(){
   lock = true;
   var position = parseInt($(".pizza-circle").attr('name'));
   var move = position - 45;
   $({deg: position}).animate({deg: move}, {
      step: function(now, fx){
         $(".pizza-circle").css({
              transform: "rotate(" + now + "deg)"
         });
         lock = false;
      }
   });
   var position = $(".pizza-circle").attr('name', move);
   hideInfoAboutPizza();
   resetAllSlices();
   schowPrevPizza();
}

function moveToSelectedPizza()
{
   $(".pizza-name-info i").click(function(){
      var pizzaId = $(this).attr('name');
      $('#pos-'+pizzaId).addClass('selected-item');
      var target = $('#pos-'+pizzaId);
      $('html, body').animate({
      scrollTop: target.offset().top-120
      }, 1000);
      setTimeout(function(){
      $('#pos-'+pizzaId).removeClass('selected-item');     
      }, 6000);
      resetAllSlices();
   });
}

function addToCart()
{
   $(".pizza-list-cart .btn").click(function(){
      $(".box").fadeIn();
      var pizzaId = $(this).attr('name');
      var pizzaPrice = $(this).attr('price');
      var pizzaDough = $(this).attr('dough');
      var pizzaSize = $(this).attr('size');
      var changes = '';
      var addedComponents = '';
      var freeGluten = 0;
      //Chceck components changes
      var components = $(this).parent().parent().prev().children().next().children();
      var componentsQuantity = $(this).parent().parent().prev().children().next().children().length-1;
      for (var x=0; x<=componentsQuantity; x++) {
         if(components[x].className == 'deleted')
            {
             changes += components[x].innerHTML;
            }
         if(components[x].className != 'deleted')
            {
             addedComponents += components[x].innerHTML;
            }
      //check gluten status
      }
      $.post( "php/add_to_cart.php", { product: pizzaId, dough: pizzaDough, size: pizzaSize, free_gluten: freeGluten, changes: changes, added_components: addedComponents, pizza_price: pizzaPrice } )
        .done(function( data ) {
       $(".cart-info h2 span").text(data);
     });
   });
}

function sliceOptions()
{
   //obracanie pizzy w lewo
//   $(".prev").click(function(){
//      movePizzaLeft();
//   });
//   //obracanie pizzy w prawo
//   $(".next").click(function(){
//      movePizzaRight();
//   });
//   //obracanie pizzy przesuwaniem
//   moveMouse();
//   // Wywołanie funkcji kliknięcia na kawałek
//   sliceClick();
//   hideInfoAboutPizza();
//   resetAllSlices();
//   //Edycja składników pizzy
   editComponents();
   //Dodwanie do koszyka
   addToCart();
//   closeMoveInfo();
   moveToList();
}
//------------------------------------------------WYWOŁANIE FUNKCJI------------------------------





function moveMouse()
{
$(".pizza-circle").on("vmousedown", function(wcisniecie){
$(document.body).scrollLock('enable');
down = wcisniecie.clientY;
});
$(".pizza-circle").on("vmouseup", function(puszczenie){
$(document.body).scrollLock('disable');

var up = puszczenie.clientY;
var suma = down - up;

   if(down > up && suma > 60)
      {
         lock =true;
         movePizzaRight();
      }
      if(down < up && suma < -60)
      {
         lock =true;
         movePizzaLeft();
      }
});
}

//Edycja produktów w pizzy
function editComponents()
{
   $(".pizza-list-compo span").click(function(){
      var componentId = $(this).attr('name');
      var componentStatus = $(this).css('opacity');
      if(componentStatus < 1)
      {
         $(this).removeClass('deleted'); 
      }
      else
      {
         $(this).addClass('deleted');
      }
      });

}

function schowNextPizza()
{
   var moves = $(".pizza-circle").attr('name') / 45;
   var sliceToChange = $(".pizza-circle").attr('change');
   var nextSlice = $(".slice").first().css("background-image");
   var nextSliceZindex = $(".pizza-circle").attr('index');
   var nextSliceId = $(".slice").first().attr("name");
      $(".pizza-slice-"+sliceToChange).css("background-image", nextSlice);
      $(".pizza-slice-"+sliceToChange).attr("name", nextSliceId);
      nextSliceZindex++;
      sliceToChange--;
      $(".pizza-slice-"+sliceToChange).css("z-index", nextSliceZindex);
      $(".pizza-circle").attr('change', sliceToChange);
      $(".pizza-circle").attr('index', nextSliceZindex);
      if(sliceToChange == 0)
         {
            sliceToChange = 8;
            $(".pizza-circle").attr('change', sliceToChange);
         }
      $(".slice").first().insertAfter($(".slice").last());
}

function schowPrevPizza()
{
   var moves = $(".pizza-circle").attr('name') / 45;
   var sliceToChange = parseInt($(".pizza-circle").attr('change'));
   var nextSlice = $(".slice").last().css("background-image");
   var nextSliceZindex = $(".pizza-circle").attr('index');
   var nextSliceId = $(".slice").last().attr("name");

      $(".pizza-slice-"+sliceToChange).css("background-image", nextSlice);
      $(".pizza-slice-"+sliceToChange).attr("name", nextSliceId);
      sliceToChange++
      nextSliceZindex--;
      $(".pizza-slice-"+sliceToChange).css("z-index", nextSliceZindex);
      $(".pizza-circle").attr('change', sliceToChange);
      $(".pizza-circle").attr('index', nextSliceZindex);
      if(sliceToChange == 9)
         {
            sliceToChange = 1;
            $(".pizza-circle").attr('change', sliceToChange);
         }
      $(".slice").last().insertBefore($(".slice").first());
   
}

function closeMoveInfo()
{
   $("#close-move-info").click(function(){
      $(".move-down-info").fadeOut();
   });
}

function moveToList()
{
   $(".move-down").click(function(){
      alert('j');
   });
}