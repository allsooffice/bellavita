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
            <div class="order-cart-list-name">'.$produkt['name'].' '.$size.'</div>
            <div class="order-cart-list-compo">'.$dough.'<br>'.$components.'
            </div>
            </div>
            <div id="'.$price.'" class="order-cart-list-price">'.$price.'.00 zł</div>
            <div class="order-cart-list-quantity"><p>Szt:</p> <input type="number" class="order-product-cart-quantity" value="'.$cart_quantity.'" min="1" name="'.$cart_id.'"></div>
            <div class="order-cart-list-delete"><i class="icon-cancel-2" name="'.$cart_id.'" title="Usuń"></i></div>
            <div style="clear: both;"></div>
            </li>';
         }
      }
   }
   else
   {
      echo '<h2>Brak produktów w koszyku</h2>';
      echo '<h2>Przejdź do menu aby wybrać coś dla siebie</h2>';
      echo '<a href="menu"><div class="btn">Menu</div></a>';
   }
   if($liczba_wierszy > 0)
   {
   echo '<div class="promo">Kod rabatowy: <input id="promo-code" type="text"/> <input type="button" value="Wprowadź" class="promo-btn"></div><div class="promo-result"></div>';
   echo '<div class="order-delivery-sum">Dostawa: <span></span></div>';
   echo '<div class="order-cart-sum">Suma zamówienia: <span></span>.00 zł</div>';
   }

?>