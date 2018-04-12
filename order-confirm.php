<?php
session_start();
$session_id = session_id();
include('php/db_connect.php');
$order_info = $mysqli->query("SELECT * FROM orders WHERE cart_session_id = '$session_id' AND status = 'Tworzenie' LIMIT 1");
   while ($order = mysqli_fetch_array($order_info) )
   {
      $payment = $order['payment_method'];
      if($payment == 'Szybki przelew internetowy')
      {
         $btn = '<input type="submit" class="btn" value="Płacę" name="confirm">';
      }
      else if($payment == 'Kartą przy odbiorze')
      {
         $btn = '<input id="confirm-order" type="button" class="btn" value="Zamawiam" name="confirm">';
      }
      else if($payment == 'Gotówką przy odbiorze')
      {
         $btn = '<input id="confirm-order" type="button" class="btn" value="Zamawiam" name="confirm">';
      }
   }
if(isset($_POST['confirm']))
{
   
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
   <meta charset="UTF-8"/>
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <title>Podsumowanie zamówienia - Bella Vita Pizza</title>
   <meta name="description" content="Bella Vita Pizza - Prawdziwa włoska pizza na dowóz" />
	<meta name="keywords" content="bella, vita, pizza, pizzeria, białystok, bialystok, dowóz, dowoz, wloska, włoska" />
   <link href="https://fonts.googleapis.com/css?family=Marcellus+SC" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Walter+Turncoat" rel="stylesheet">
   <link rel="stylesheet" href="fontello/css/fontello.css">
   <link rel="stylesheet" href="style/master.css"/>
   <link rel="stylesheet" href="style/order-confirm-style.css"/>
</head>
<body>
   <div class="wrapper">
      <?php
      //INCLUDE HEAD;
      include("parts/top.php");
      ?>
      <div class="content">
         <h1><i class="icon-basket-1"></i>Podsumowanie zamówienia</h1>
         <div class="order-info">
            
         </div>
         <div class="order-cart-list">
            <ul>

            </ul>
         </div>
         <?php
            if($payment == 'Szybki przelew internetowy')
            {
               echo '<form action="platnosci.php" method="post">';
            }
            echo $btn;
            if($payment == 'Szybki przelew internetowy')
            {
               echo '</form>';
            }
         ?>
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