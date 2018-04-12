//MASKA WPROWADZANIA NUMETU TELEFONU
document.getElementById('number').addEventListener('input', function (e) {
  var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,3})/);
  e.target.value = !x[2] ? x[1] : x[1] + '-' + x[2] + (x[3] ? '-' + x[3] : '');
});
//WALIDACJA MAILA
function validateEmail($email) {
   var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
   return emailReg.test( $email );
}
   

$("#choose-hour").click(function(){
   $(".time-select").fadeIn();
});

//Zapisywanie w bazie liczby produktów
function updateQuantity()
{
   $(".order-product-cart-quantity").change(function(){
      var productCartId = $(this).attr('name');
      var productQuantity = $(this).val();
      $.post( "php/update_quantity_cart.php", { id: productCartId, quantity: productQuantity });
   });
}

//LICZENIE CENY PRODUKTÓW W KOSZYKU
function calculateOrder()
{
   var productsInCart = $(".order-cart-list ul li").length;
   var orderPrice = 0;
   var name = $(".order-cart-list-price").attr("name");
   var i = 0;
   while (i < productsInCart) 
   {
      var productPrice = $(".order-cart-list-price")[i];
      var productQuantity = $(".order-product-cart-quantity")[i].value;
      var productQuantityAndPrice = productPrice.id * productQuantity;
      orderPrice = orderPrice + productQuantityAndPrice;
      i++;
   }
   $(".order-cart-sum span").text(orderPrice);
   addTransportCost(orderPrice);
}

//Dodawanie kosztów transportu
function addTransportCost(orderPrice)
{
   if(orderPrice < 30)
      {
         $(".order-delivery-sum span").text(5+".00 zł");
         $(".order-cart-sum span").text(orderPrice+5);
      }
   else
      {
         $(".order-delivery-sum span").text("Gratis");
      }
}

//załadowanie listy produktów
$(".order-cart-list ul").load("php/cart-display-list-order.php", function activeOperation()
{
   calculateOrder();
   updateQuantity();
   $(".order-product-cart-quantity").change(function(){
   calculateOrder();
   });
//usuwanie produktu z koszyka
   $(".icon-cancel-2").click(function(){
      var productId = $(this).attr('name');
      $("#cart"+productId).fadeOut(function(){
         //Usuwanie produktu z bazy
         $.post( "php/delete_from_cart.php", { product: productId } , function()
         {   
            $(".order-cart-list ul").load("php/cart-display-list-order.php", activeOperation);
         });
      });
   });
//Wpisywanie kodu rabatowego
   $(".promo-btn").click(function(){
      var code = $('#promo-code').val();
      if(code != 'px8js@x4$')
         {
            $('.promo-result').text('Nieprawidłowy kod');
         }
   })
});
//Wybór dzielnicy
function selectDiscount()
{
$('.order-select').click(function(){
   $('.discounts ul').slideToggle(function(){
      $('.discounts ul li').click(function(){
         var selected = $(this).text();
         $('.order-select').text(selected);
         $('.discounts ul').fadeOut();
      });
      
   });
});
}
//-----------------------------------------WALIDACJA-----------------------------------------------------

selectDiscount();
$("#confirm-order").click(function(){
   var validation = true;
   //pobieranie wartości z fomrmularzy
   var district = $('.order-select').text();
   var adress = $("#adress").val();
   var email = $("#email").val();
   var number = $("#number").val();
   var payment = $('.choosen-payment:checked');
   var delivery = $('input[name=delivery-time]:checked').val();
   var informations = $('.information').val();
   var deliveryCost = $(".order-delivery-sum span").text();
   var orderCost = $(".order-cart-sum span").text();
   //WALIDACJA
   if(deliveryCost != 'Gratis')
      {
        deliveryCost = 5;
      }
   if(adress.length < 3)
   {
      validation = false;
      $( ".form-error" ).text('Wybierz adres dostawy');
   }
   if(district == 'Wybierz')
   {
      validation = false;
      $( ".form-error" ).text('Wybierz dzielnice');
   }
   
   if( !validateEmail(email)) 
   {
      validation = false;
      $( ".form-error" ).text('Sprawdź poprawność adresu email');
   }
   
   if(email.length < 3)
   {
      validation = false;
   }
   if(number.length < 3)
   {
      validation = false;
   }
   if(payment.is(':checked'))
   {
      var choosenPayment = payment.val();
   }
   else
   {
      validation = false;
   }
   
   if(orderCost == '')
   {
      validation = false;
      $( ".form-error" ).text('Brak produktów w zamówieniu');
   }
   
   if(validation == false)
   {
      errorOn();
   }
   if(validation == true)
   {
      adress = 'osiedle: '+district+', '+adress;
      $.post( "php/create-order.php", { adress: adress, email: email, phone: number, order_cost: orderCost, payment: choosenPayment, delivery_cost: deliveryCost, delivery: delivery, info: informations }, function()
      {
      window.location.href = "order-confirm.php";
      });
   }
});
//Włączanie błędu
function errorOn()
{
   $( ".form-error" ).show("slow");
}

//Wyłączenie błędu
function errorOff()
{
   $( ".form-error" ).hide("slow");
}

$( "input" ).keydown(function(){
   errorOff();
});

$( ".payment-method" ).click(function(){
   errorOff();
});

$( "#back" ).click(function(){
   window.location.href = "menu";
});
