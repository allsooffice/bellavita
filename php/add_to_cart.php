<?php
session_start();
if(isset($_POST['product']))
{
   include('db_connect.php');
   $product_id = $_POST['product'];
   $dough = $_POST['dough'];
   $size = $_POST['size'];
   $changes = $_POST['changes'];
   $components = $_POST['added_components'];
   $pizza_price = $_POST['pizza_price'];
   $session_id = session_id();
   
   include('time_checker_input.php');

if($opening == 'close')
{
    echo 'Nieczynne, zapraszamy juro o godz: 11:00';
    $usuwanie = $mysqli->query("DELETE FROM cart WHERE session_id = '$session_id'");
      $delete = $mysqli->query($usuwanie);
}
    
   else if($current_date_time > $close_hour || $current_date_time < $open_hour || $current_date_time > $closed_day_start && $current_date_time < $closed_day_end)
   {
      if($tommorow_day == $atypical_day)
      {
         echo 'Nieczynne, zapraszamy juro o godz: '.$atypical_day_hour; 
      }
      else
      {
         echo 'Zamówienie można składać od godziny '.$open_hour_output;
      }
      $usuwanie = $mysqli->query("DELETE FROM cart WHERE session_id = '$session_id'");
      $delete = $mysqli->query($usuwanie);
   }
   else
   {
   $sprawdz_duble = $mysqli->query("SELECT * FROM cart WHERE session_id = '$session_id' AND product_id = '$product_id' AND size = '$size'");
   $liczba_wierszy = mysqli_num_rows($sprawdz_duble);
   if($liczba_wierszy == 0)
   {
    $dodawanie = "insert into cart (id, session_id, product_id, quantity, dough, size, changes, components, piece_price) values ('', '$session_id', '$product_id', '1', '$dough', '$size', '$changes', '$components', '$pizza_price')";
   // wykonanie dodawania do bazy
   $wynik = $mysqli->query($dodawanie);

   echo $session_id;
   //echo 'Produkt dodano do zamówienia';

      
   }
   else
   {
      echo 'Ten produkt jest już w zamówieniu';
   }
   }
}


?>