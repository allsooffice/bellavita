<?php
$email = $email;
   $subj = 'Potwierdzenie zamówienia - Bella Vita Pizza';

$message = '
<div style="background-color: black; color: white; margin: 0; padding: 50px; width: 100%; min-height: 800px; background-size: cover; background-repeat: no-repeat; background-attachment: fixed; margin-left: auto; margin-right: auto; box-sizing: border-box; font-family:sans-serif">
   <img src="http://pizza.bellavita.pl/img/logo_mini.png" alt="Pizza Bella Vita" style="display: block; width: 300px; margin-left: auto; margin-right: auto;">
   <h1 style="text-align: center; background-color: #822047; padding-top: 20px; padding-bottom: 20px; font-family:sans-serif; width: 70%; margin-left: auto; margin-right: auto;">Dziękujemy za zamówienie</h1>
   <p style="width: 70%; margin-left: auto; margin-right: auto; font-size: 23px; text-align: center; padding: 20px; box-sizing: border-box;">Twoje zamówienie zostało przyjęte.<br>Dziękujemy za wybór naszej restauracji.<br> Z niecierpliwością czekamy na Twoje kolejne zamóienie!</p>
   <a class="call-click" href="tel:+48511511565">
      <img src="http://www.pizza.bellavita.pl/img/call.png" alt="tel:+48511511565" style="width: 250px; text-align: center; margin-left: auto; margin-right: auto; display: block; margin-top: 100px;">
   </a>
   <a href="http://www.pizza.bellavita.pl" style="color: #fff;"><p style="width: 70%; margin-left: auto; margin-right: auto; text-align: center; font-size: 22px;">www.pizza.bellavita.pl</p></a>
   <div style="width: 80%; margin-left: auto; margin-right: auto; text-align: right;">
      <img src="http://www.pizza.bellavita.pl/img/about_down.png" alt="tel:+48511511565" style="width: 300px; display: block; margin-top: 100px; margin-left: auto; margin-right: 5%;">
   </div>
</div>';

   $headers  = 'MIME-Version: 1.0' . "\r\n";
   $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
   $headers .= "From: www.pizza.bellavita.pl <zamowienia@bellavita.pl>\r\n";
   $headers .= "X-Sender: <zamowienia@bellavita.pl>";

   mail($email, $subj, $message, $headers);
?>
