//Zapisywanie w bazie liczby produktów
function updateQuantity()
{
   $(".product-cart-quantity").change(function(){
      var productCartId = $(this).attr('name');
      var productQuantity = $(this).val();
      $.post( "php/update_quantity_cart.php", { id: productCartId, quantity: productQuantity });
   });
}

//LICZENIE CENY PRODUKTÓW W KOSZYKU
function calculateOrder()
{
   var productsInCart = $(".cart-list ul li").length;
   var orderPrice = 0;
   var name = $(".cart-list-price").attr("name");
   var i = 0;
   while (i < productsInCart) 
   {
      var productPrice = $(".cart-list-price")[i];
      var productQuantity = $(".product-cart-quantity")[i].value;
      var productQuantityAndPrice = productPrice.id * productQuantity;
      orderPrice = orderPrice + productQuantityAndPrice;
      i++;
   }
   $(".cart-sum span").text(orderPrice);
}

//załadowanie listy produktów
$(".cart-list ul").load("php/cart-display-list.php", function activeOperation()
{
   calculateOrder();
   updateQuantity();
   $(".product-cart-quantity").change(function(){
   calculateOrder();
   });
//usuwanie produktu z koszyka
   $(".icon-cancel-2").click(function(){
      var productId = $(this).attr('name');
      $("#cart"+productId).fadeOut(function(){
         //Usuwanie produktu z bazy
         $.post( "php/delete_from_cart.php", { product: productId } , function()
         {   
            $(".cart-list ul").load("php/cart-display-list.php", activeOperation);
         });
      });
   });
//Wpisywanie kodu rabatowego
   $("#promo-code").blur(function(){
      alert('up');
   })
});

$("#exit").click(function(){
   $(".box").fadeOut();
});


