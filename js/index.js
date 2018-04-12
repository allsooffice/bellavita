//Funkcje

function fadeList()
{

    var lis = $('li', '#estate-list');
    var delay = 0;
    
    lis.each(function() {
        var $li = $(this);
        $li.queue('fade', function(next) {
            $li.delay(delay).fadeIn(600, next);
        });
        
        $li.dequeue('fade');
        
        delay += 250;
    });
   $('.map img').addClass('zoomed');
}

//---------------------------------------
$(document).ready(function(){
       /* Every time the window is scrolled ... */
$(window).scroll( function(){
   
$('.map-info').each( function(i){

   var bottom_of_object = $(this).offset().top + $(this).outerHeight();
   var bottom_of_object_next = $(this).offset().top + $(this).outerHeight()+250;
   var bottom_of_window = $(window).scrollTop() + $(window).height();

   /* If the object is completely visible in the window, fade it it */
   if( bottom_of_window > bottom_of_object ){
      $('.bella-tittle').addClass('tittle-focus');
   }
   
   if( bottom_of_window > bottom_of_object_next ){
      $('.bella-tittle').addClass('tittle-focus');
      fadeList();
   }

   else if( bottom_of_window < bottom_of_object ){
      $('.bella-tittle').removeClass('tittle-focus');
      $('.map img').removeClass('zoomed');
   }
});      
   
});
});

