<?php

$email = 'zamowienia@bellavita.pl';
$subj = "Wiadomosc z formularza kontaktowego na pizza.bellavita.pl";

$message = $_POST['message'];

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= "From: www.bellavita.pl <zamowienia@bellavita.pl>\r\n";
$headers .= "Reply-to: ". $_POST['email'] ."\r\n";
$headers .= "X-Sender: <zamowienia@bellavita.pl>";

mail($email, $subj, $message, $headers);

   echo 'Wiadomość wysłana, dziękujemy.';

?>
