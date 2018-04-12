//ZMIENNE GLOBALNE

//---------------------------------------
$(document).ready(function(){
var wievport = $( window ).width();
   
         $("#cart").click(function(){
         $( ".cart-box" ).animate({ 
         'right': '0'
         }, 500 );
         });
   
            $("#menu").click(function(){
         $( ".nav-box" ).animate({ 
         'left': '0'
         }, 500 );
         });
   
if(wievport < 599)
{
   $(".icon-cancel").click(function(){
   $( ".cart-box" ).animate({ 
   'right': '-100%'
   }, 500 );
   });
   
   $(".menu-close").click(function(){
   $( ".nav-box" ).animate({ 
   'left': '-100%'
   }, 500 );
   });
   
   $("#menu").insertAfter("#time");
   
}
else
{  
   $(".icon-cancel").click(function(){
   $( ".cart-box" ).animate({ 
   'right': '-30%'
   }, 500 );
   });
   $("#time").insertAfter("#menu");
}
   //wypisywanie liczby produktów w koszyku
   $(".products-in-cart").load("php/products-in-cart-quantity.php");
   //informacja o godzinie otwarcia
   $("#time span").load("php/time_checker.php");
});

//Zapisywanie newslettera
$(".newsletter-btn").click(function(){
   var email = $(".newsletter-input").val();
   function validateEmailNews($email) {
   var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
   return emailReg.test( $email );
   }
   if(email.length > 3)
      {
         if( !validateEmailNews(email)) 
         {
            $(".footer-left p").html('Sprawdź adres email');
         }
         else
         {
            $(".footer-left").load("php/add_newsletter.php?email="+ email);
         }       
      }
   else
      {
         $(".footer-left p").html('Sprawdź adres email');
      }
});

