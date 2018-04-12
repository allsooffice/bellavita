<?php
session_start();
$session_id = session_id();
include('db_connect.php');

$pobierz_produkty_z_koszyka = $mysqli->query("SELECT * FROM cart WHERE session_id = '$session_id'");
   $liczba_wierszy = mysqli_num_rows($pobierz_produkty_z_koszyka);
   if($liczba_wierszy > 0)
   {
            while ($produkt_w_koszyku = mysqli_fetch_array($pobierz_produkty_z_koszyka) )
      {
         
         $product_id = $produkt_w_koszyku['product_id'];
         $cart_id = $produkt_w_koszyku['id'];
         $cart_quantity = $produkt_w_koszyku['quantity'];
         $price = $produkt_w_koszyku['piece_price'];
         $dough = $produkt_w_koszyku['dough'];
         if($dough == 'neapolitan-dough')
         {
            $dough = 'Ciasto Neapolitańskie';
         }
         if($dough == 'bella-dough')
         {
            $dough = 'Ciasto Rzymskie';
         }
         if($dough == 'calzone-dough')
         {
            $dough = 'Cisato Calzone';
         }
         if($dough == 'no-gluten-dough')
         {
            $dough = 'Cisato Bezglutenowe';
         }
         $size = $produkt_w_koszyku['size'];
         if($size != '')
         {
            $size = '('.$size.')';
         }
         $no_gluten = $produkt_w_koszyku['no_gluten'];
         $changes = $produkt_w_koszyku['changes'];
         $components = $produkt_w_koszyku['components'];
            
         $pobierz_produkty = $mysqli->query("SELECT * FROM products WHERE id='$product_id'");
         while ($produkt=mysqli_fetch_array($pobierz_produkty) )
         {
            echo'<li id="cart'.$cart_id.'">
            <div class="order-cart-list-img"><img src="products_imgs/'.$produkt['neapolitan_img'].'" alt="'.$produkt['name'].'"/></div>
            <div class="order-cart-list-center">
            <div class="order-cart-list-name">'.$produkt['name'].' '.$size.' x '.$cart_quantity.'</div>
            <div class="order-cart-list-compo">'.$dough.'<br>'.$components.'
            </div>
            </div>';
            echo '</div>
            </div>
            <div id="'.$price.'" class="order-cart-list-price">'.$price.'.00 zł / szt</div>
            <div class="order-cart-list-quantity"><p></p></div>
            <div style="clear: both;"></div>
            </li>';
         }
      }
      }
   
   $order_info = $mysqli->query("SELECT * FROM orders WHERE cart_session_id = '$session_id' AND status = 'Tworzenie' LIMIT 1");
   while ($order = mysqli_fetch_array($order_info) )
   {
      if($order['rebate'] != 0)
      {
         echo '<div class="promo">Kod rabatowy: <input id="promo-code" type="text"/></div>';
      }
       if($order['delivery_payment'] != 0)
      {
         echo '<div class="order-delivery-sum">Dostawa: '.$order['delivery_payment'].' zł</div>';
      }
       if($order['delivery_payment'] == 0)
       {
        echo '<div class="order-delivery-sum">Dostawa: Gratis</div>';
       }
    
      echo '<div class="order-cart-sum">Suma zamówienia: <span></span>'.$order['order_cost'].'.00 zł</div>';
   }
   

?>