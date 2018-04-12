<?php

if(isset($_GET['email']))
{
   include('db_connect.php');
   $email = $_GET['email'];
   $sprawdz_duble = $mysqli->query("SELECT * FROM newsletter_emails WHERE email = '$email'");
   $liczba_wierszy = mysqli_num_rows($sprawdz_duble);
   if($liczba_wierszy > 0)
   {
      echo '<div class="bella-tittle">
         Jestes już zapisany, na pewno nie ominie Cie żadna nowość i promocja!</div>';
   }
   else
   {
      $dodawanie = "insert into newsletter_emails (id, email) values ('', '$email')";
      // wykonanie dodawania do bazy
      $wynik = $mysqli->query($dodawanie);
      echo '<div class="bella-tittle">
         <span>Dziękujemy</span>
         teraz na pewno nie ominie Cie żadna nowość i promocja!</div>';
   }
}


?>