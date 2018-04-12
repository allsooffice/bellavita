<?php
session_start();
if(isset($_POST['email']))
{
   include('db_connect.php');
   $adress = $_POST['adress'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $order_cost = $_POST['order_cost'];
   $payment = $_POST['payment'];
   $delivery = $_POST['delivery'];
   $info = $_POST['info'];
   $delivery_cost = $_POST['delivery_cost'];
   $cart_session_id = session_id();
   
   if($payment == 'cash')
   {
      $payment = 'Gotówką przy odbiorze';
   }
   
   else if($payment == 'card')
   {
      $payment = 'Kartą przy odbiorze';
   }
   
   else if($payment == 'online')
   {
      $payment = 'Szybki przelew internetowy';
   }
   
   if($delivery == 'fast')
   {
      $delivery = 'Jak najszybciej';
   }
   
   else if($delivery != 'fast')
   {
      $delivery = 'Na godzinę: ';
   }
   
   $sprawdz_duble = $mysqli->query("SELECT * FROM orders WHERE cart_session_id = '$cart_session_id' AND status = 'Tworzenie'");
   $liczba_wierszy = mysqli_num_rows($sprawdz_duble);
   if($liczba_wierszy == 0)
   {
     $dodawanie = "insert into orders (id, adress, email, phone, cart_session_id, order_cost, payment_method, delivery_payment, delivery_time, rebate, cust_info, status) values ('', '$adress', '$email', '$phone', '$cart_session_id', '$order_cost', '$payment', '$delivery_cost', '$delivery', '0', '$info', 'Tworzenie')";
      // wykonanie dodawania do bazy
      $wynik = $mysqli->query($dodawanie);
   }
   
   else
   {
       $dodawanie = "UPDATE orders SET adress = '$adress', email = '$email', phone = '$phone', order_cost = '$order_cost', payment_method = '$payment', delivery_payment = '$delivery_cost', delivery_time = '$delivery', rebate = '0', cust_info = '$info' WHERE cart_session_id = '$cart_session_id' AND status = 'Tworzenie'";
    // wykonanie dodawania do bazy
    $wynik = $mysqli->query($dodawanie); 
   }
   
}
//

?>