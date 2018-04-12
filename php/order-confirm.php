<?php
session_start();
$session_id = session_id();
include('db_connect.php');

$order_info = $mysqli->query("SELECT * FROM orders WHERE cart_session_id = '$session_id' AND status = 'Tworzenie'");
while ($order = mysqli_fetch_array($order_info) )
{
   $adress = $order['adress'];
   $email = $order['email'];
   $phone = $order['phone'];
   $payment_method = $order['payment_method'];
   $delivery_time = $order['delivery_time'];
   $cust_info = $order['cust_info'];
   if($cust_info == '')
   {
      $cust_info = 'Brak';
   }
}

echo '
         <div class="order-data-l">
            <h3>Adres: </h3>
            <p>'.$adress.'</p>
            <h3>E-mail: </h3>
            <p>'.$email.'</p>
            <h3>Numer telefonu: </h3>
            <p>'.$phone.'</p>
         </div>
         <div class="order-data-r">
            <h3>Sposób płatności: </h3>
            <p>'.$payment_method.'</p>
            <h3>Dodatkowe informacje: </h3>
            <p>'.$cust_info.'</p>
         </div>
         <div style="clear: both;"></div>
';
   

?>