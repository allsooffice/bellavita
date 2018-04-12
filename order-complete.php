<!DOCTYPE html>
<?php
session_start();
$session_id = session_id();
include('php/db_connect.php');
//poberanie numeru zmaóienia
$order_info = $mysqli->query("SELECT * FROM orders WHERE cart_session_id = '$session_id' AND status = 'Tworzenie'");
$liczba_wierszy = mysqli_num_rows($order_info);
if($liczba_wierszy == 0)
{
   //header('Location: strona-glowna');

}
else
{
   while ($order = mysqli_fetch_array($order_info) )
   {
      $order_id = $order['id'];
      $adress = $order['adress'];
      $email = $order['email'];
      $phone = $order['phone'];
      $order_price = $order['order_cost'];
      $payment_method = $order['payment_method'];
      $delivery_payment = $order['delivery_payment'];
      $cust_info = $order['cust_info'];
   }
   //aktualizacja zamóienia
   $up_date_cart = "UPDATE orders SET status = 'Zatwierdzone' WHERE cart_session_id = '$session_id'";
   // wykonanie dodawania do bazy
   $aktualizuje_koszyk = $mysqli->query($up_date_cart);
   //aktualizacja koszyka
   $up_date_cart = "UPDATE cart SET session_id = '$order_id' WHERE session_id = '$session_id'";
   // wykonanie dodawania do bazy
   $aktualizuje_koszyk = $mysqli->query($up_date_cart);
   include("php/emails/customer_order_confirm.php");
   include("php/order-email.php");
}
?>
<html lang="pl">
<head>
   <meta charset="UTF-8"/>
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <title>Dziękujemy za zamówienie - Bella Vita Pizza</title>
   <?php
   //INCLUDE HEAD LNKS;
   include("parts/head-links.php");
   ?>
   <link rel="stylesheet" href="style/order-confirm-style.css"/>
</head>
<body>
   <div class="wrapper">
      <?php
      //INCLUDE HEAD;
      include("parts/top.php");
      ?>
      <div class="content">
         <h1>Dziękujemy za zamówienie</h1>
            <p>Cieszymy się, że wybrałeś naszą restauracje.</p>
            <p>Twoje zamówienie zostało przyjęte.</p>
            <p>Życzymy smacznego!</p>
      </div>
      <?php
      //INCLUDE FOOTER
      include("parts/footer.php");
      ?>
   </div>
</body>
   <script type="text/javascript" src="js/jquery-3.2.1.slim.min.js"></script>
   <script type="text/javascript" src="js/jquery-ui.js"></script>
   <script type="text/javascript" src="js/main.js"></script>
   <script type="text/javascript" src="js/order-confirm.js"></script>
</html>