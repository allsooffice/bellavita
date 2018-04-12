//Wysyłanie wiadomości
$("#send-message").click(function(){
   var email = $(".email").val();
   var message = $("#message").val();
   function validateEmailNews($email) {
   var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
   return emailReg.test( $email );
   }
   if(email.length > 3 && message.length > 5)
      {
         if( !validateEmailNews(email)) 
         {
            $(".message-info").html('<i class="icon-info"></i> Sprawdź formularz');
         }
         else
         {
            $.post( "php/emails/message_contact.php", { email: email, message: message } )
            .done(function( data ) {
            $(".message-info").text(data);
            $(".email").val('');
            $("#message").val('');
            });
         }       
      }
   else
      {
         $(".message-info").html('<i class="icon-info"></i> Sprawdź formularz');
      }
});

