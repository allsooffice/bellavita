//załadowanie listy produktów
$(".order-cart-list ul").load("php/cart-display-list-order-confirm.php");
$(".order-info").load("php/order-confirm.php");
$("#confirm-order").click(function(){
  window.location.href = "order-complete.php";
})

//-----------------------------------------WALIDACJA-----------------------------------------------------
