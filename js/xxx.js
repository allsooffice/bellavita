//Wybór pizz w menu
$("#pizza").click(function()
{
   var visibility = $(".pizza-types").css('display');
   var visibilityPizzas = $(".pizza-types-list").css('display');
   var target = $('#pizza');
   $('html, body').animate({
   scrollTop: target.offset().top
   }, 1000);
   $('.pizza-dough').removeClass('dough-active');
   if(visibilityPizzas == 'none')
   {
        $(".pizza-types").css('display', 'flex');
      $(".pizza-types").show(function()
      {
        $(".visualisation").css('display', 'none');
         if(visibility == 'block')
         {
            $(".visualisation").css('display', '');
         }
      });
      if(visibility == 'flex')
      {
      //hideInfoAboutPizza();
      //resetAllSlices();
    $(".pizza-types").hide();
      $(".visualisation").css('display', '');
      $(".choosen-pizza-list").empty().slideToggle();
      $(".pizza-types-list").hide();
      }
   }
      if(visibilityPizzas == 'block')
   {
      //hideInfoAboutPizza();
      //resetAllSlices();
      $(".choosen-pizza-list").empty().slideToggle('slow');
      $(".pizza-types-list").slideToggle('slow', function(){
      $(".visualisation").css('display', '');
      });
   }
});
// Wybór ciasta
$(".pizza-box").click(function()
{
   var PizzaType = $(this).children().next().attr('alt');
   $(".pizza-types").slideToggle(function()
   {
   $(".pizza-types-list").show();
   if(PizzaType == 'Neapolitańskie')
      {
         var file = 'neapolitana';
      }
   if(PizzaType == 'Bella Vita')
      {
         var file = 'bella';
      }
   if(PizzaType == 'Calzone')
      {
         var file = 'calzone';
      }
      if(PizzaType == 'No-gluten')
      {
         var file = 'no_gluten';
      }
   $(".choosen-pizza-list").load("php/"+file+"-display-list.php", function()
   {
      $("#"+file+"-dough").addClass('dough-active');
      if(PizzaType == 'Neapolitańskie' || PizzaType == 'Bella Vita')
         {
            //moveToSlices();
         }
      else
         {
            //moveToPizzas();
         }
      sliceOptions();
   });
   $(".pizza-types").hide();
   $( ".choosen-pizza-list" ).fadeIn();
   });
});

// Zmiana ciasta
function doughChange()
{
   $('.pizza-dough').click(function(){
      $('.pizza-dough').removeClass('dough-active');
      $(this).addClass('dough-active');
      var clickedDough = $(this).attr('id');
      if(clickedDough == 'neapolitana-dough')
         {
            var file = 'php/neapolitana-display-list.php';
         }
      if(clickedDough == 'bella-dough')
         {
            var file = 'php/bella-display-list.php';
         }
      if(clickedDough == 'calzone-dough')
         {
            var file = 'php/calzone-display-list.php';
         }
      if(clickedDough == 'no_gluten-dough')
         {
            var file = 'php/no_gluten-display-list.php';
         }
      $(".choosen-pizza-list").slideToggle('slow', function(){
         $(".choosen-pizza-list").load(file, function(){
         $(".choosen-pizza-list").slideToggle('slow');
            if(clickedDough == 'neapolitana-dough' || clickedDough == 'bella-dough')
               {
                  //moveToSlices();
               }
            else
               {
                  //moveToPizzas();
               }
         //sliceOptions();
         });
      });
   });
}

function moveToPizzas()
{
   var target = $('.pizza-list');
   $('html, body').animate({
   scrollTop: target.offset().top
   }, 1000);
}

function moveToSlices()
{
   var target = $('.pizza-content');
   $('html, body').animate({
   scrollTop: target.offset().top
   }, 1000);
}

function moveToTopMenu()
{
   var target = $('#head-menu');
   $('html, body').animate({
   scrollTop: target.offset().top
   }, 1000);
}

doughChange();

//Wybór lasagne w menu
$("#lasagne").click(function()
{
   var visibility = $(".choosen-lasagne-list").css('display');
   var target = $('#lasagne');
   $('html, body').animate({
   scrollTop: target.offset().top
   }, 1000);
   if(visibility == 'block')
      {
         moveToTopMenu();
         $(".choosen-lasagne-list").slideToggle(function(){
            $(this).empty();
            $(".visualisation").css('display', '');
         });
      }
   if(visibility == 'none')
      {
            $(".choosen-lasagne-list").load("php/lasagne-display-list.php", function(){
               $(this).slideToggle();
               //Edycja składników pizzy
               editComponents();
               //Dodwanie do koszyka
               addToCart();
               freeGluten();
               $(".visualisation").css('display', 'none');
         });     
      }
});

//Wybór panini w menu
$("#panini").click(function()
{
   var visibility = $(".choosen-panini-list").css('display');
   var target = $('#panini');
   $('html, body').animate({
   scrollTop: target.offset().top
   }, 1000);
   if(visibility == 'block')
      {
         moveToTopMenu();
         $(".choosen-panini-list").slideToggle(function(){
            $(this).empty();
            $(".visualisation").css('display', '');
         });
      }
   if(visibility == 'none')
      {
            $(".choosen-panini-list").load("php/panini-display-list.php", function(){
               $(this).slideToggle();
               //Edycja składników pizzy
               editComponents();
               //Dodwanie do koszyka
               addToCart();
               freeGluten();
               $(".visualisation").css('display', 'none');
         });     
      }
});

//Wybór makaronów w menu
$("#makarony").click(function()
{
   var visibility = $(".choosen-makarony-list").css('display');
   var target = $('#makarony');
   $('html, body').animate({
   scrollTop: target.offset().top
   }, 1000);
   if(visibility == 'block')
      {
         moveToTopMenu();
         $(".choosen-makarony-list").slideToggle(function(){
            $(this).empty();
            $(".visualisation").css('display', '');
         });
      }
   if(visibility == 'none')
      {
            $(".choosen-makarony-list").load("php/makarony-display-list.php", function(){
               $(this).slideToggle();
               //Edycja składników pizzy
               editComponents();
               //Dodwanie do koszyka
               addToCart();
               freeGluten();
               $(".visualisation").css('display', 'none');
         });     
      }
});

//Wybór foccacia w menu
$("#focaccia").click(function()
{
   var visibility = $(".choosen-focaccia-list").css('display');
   var target = $('#focaccia');
   $('html, body').animate({
   scrollTop: target.offset().top
   }, 1000);
   if(visibility == 'block')
      {
         moveToTopMenu();
         $(".choosen-focaccia-list").slideToggle(function(){
            $(this).empty();
            $(".visualisation").css('display', '');
         });
      }
   if(visibility == 'none')
      {
            $(".choosen-focaccia-list").load("php/focaccia-display-list.php", function(){
               $(this).slideToggle();
               //Edycja składników pizzy
               editComponents();
               //Dodwanie do koszyka
               addToCart();
               freeGluten();
               $(".visualisation").css('display', 'none');
         });     
      }
});

//Wybór zup w menu
$("#zupy").click(function()
{
   var visibility = $(".choosen-zupy-list").css('display');
   var target = $('#zupy');
   $('html, body').animate({
   scrollTop: target.offset().top
   }, 1000);
   if(visibility == 'block')
      {
         moveToTopMenu();
         $(".choosen-zupy-list").slideToggle(function(){
            $(this).empty();
            $(".visualisation").css('display', '');
         });
      }
   if(visibility == 'none')
      {
            $(".choosen-zupy-list").load("php/zupy-display-list.php", function(){
               $(this).slideToggle();
               //Edycja składników pizzy
               //editComponents();
               //Dodwanie do koszyka
               addToCart();
               freeGluten();
               $(".visualisation").css('display', 'none');
         });     
      }
});

//Wybór antipasti w menu
$("#antipasti").click(function()
{
   var visibility = $(".choosen-antipasti-list").css('display');
   var target = $('#antipasti');
   $('html, body').animate({
   scrollTop: target.offset().top
   }, 1000);
   if(visibility == 'block')
      {
         moveToTopMenu();
         $(".choosen-antipasti-list").slideToggle(function(){
            $(this).empty();
            $(".visualisation").css('display', '');
         });
      }
   if(visibility == 'none')
      {
            $(".choosen-antipasti-list").load("php/antipasti-display-list.php", function(){
               $(this).slideToggle();
               //Edycja składników pizzy
               //editComponents();
               //Dodwanie do koszyka
               addToCart();
               freeGluten();
               $(".visualisation").css('display', 'none');
         });     
      }
});

//Wybór insalate w menu
$("#insalate").click(function()
{
   var visibility = $(".choosen-insalate-list").css('display');
   var target = $('#insalate');
   $('html, body').animate({
   scrollTop: target.offset().top
   }, 1000);
   if(visibility == 'block')
      {
         moveToTopMenu();
         $(".choosen-insalate-list").slideToggle(function(){
            $(this).empty();
            $(".visualisation").css('display', '');
         });
      }
   if(visibility == 'none')
      {
            $(".choosen-insalate-list").load("php/insalate-display-list.php", function(){
               $(this).slideToggle();
               //Edycja składników pizzy
               editComponents();
               //Dodwanie do koszyka
               addToCart();
               freeGluten();
               $(".visualisation").css('display', 'none');
         });     
      }
});

//Wybór deserów
$("#desery").click(function()
{
   var visibility = $(".choosen-desery-list").css('display');
   var target = $('#desery');
   $('html, body').animate({
   scrollTop: target.offset().top
   }, 1000);
   if(visibility == 'block')
      {
         moveToTopMenu();
         $(".choosen-desery-list").slideToggle(function(){
            $(this).empty();
            $(".visualisation").css('display', '');
         });
      }
   if(visibility == 'none')
      {
            $(".choosen-desery-list").load("php/desery-display-list.php", function(){
               $(this).slideToggle();
               //Edycja składników pizzy
               editComponents();
               //Dodwanie do koszyka
               addToCart();
               freeGluten();
               $(".visualisation").css('display', 'none');
         });     
      }
});

//Wybór napoi
$("#napoje").click(function()
{
   var visibility = $(".choosen-napoje-list").css('display');
   var target = $('#napoje');
   $('html, body').animate({
   scrollTop: target.offset().top
   }, 1000);
   if(visibility == 'block')
      {
         moveToTopMenu();
         $(".choosen-napoje-list").slideToggle(function(){
            $(this).empty();
            $(".visualisation").css('display', '');
         });
      }
   if(visibility == 'none')
      {
            $(".choosen-napoje-list").load("php/napoje-display-list.php", function(){
               $(this).slideToggle();
               //Edycja składników pizzy
               editComponents();
               //Dodwanie do koszyka
               addToCart();
               freeGluten();
               $(".visualisation").css('display', 'none');
         });     
      }
});