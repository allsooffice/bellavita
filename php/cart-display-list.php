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
         $piece_price = $produkt_w_koszyku['piece_price'];
         $size = $produkt_w_koszyku['size'];
         $dough = $produkt_w_koszyku['dough'];
         if($size != '')
         {
            $size = '('.$size.')';
         }
         if($dough == 'neapolitan-dough')
         {
            $dough = 'Ciasto Nepolitańskie';
         }
         
         if($dough == 'bella-dough')
         {
            $dough = 'Ciasto Rzymskie';
         }
         
         if($dough == 'calzone-dough')
         {
            $dough = 'Ciasto Calzone';
         }
         
         if($dough == 'no-gluten-dough')
         {
            $dough = 'Ciasto Bezglutenowe';
         }

         $pobierz_produkty = $mysqli->query("SELECT * FROM products WHERE id='$product_id'");
         while ($produkt=mysqli_fetch_array($pobierz_produkty) )
         {
            $pobierz_obraz = $mysqli->query("SELECT * FROM products_photos WHERE product_id = '$product_id'");
            while ($obraz=mysqli_fetch_array($pobierz_obraz) )
            {
            $file = $obraz['file'];
            }
            echo'<li id="cart'.$cart_id.'">
            <div class="cart-list-img"><img src="products_imgs/'.$produkt['neapolitan_img'].'" alt="'.$produkt['name'].'"/></div>
            <div class="cart-list-center">
            <div class="cart-list-name">'.$produkt['name'].' '.$size.'</div>
            <div class="cart-list-compo">'.$dough.'<br>';
            $product_id = $produkt['id'];
            $pobierz_kompozycje = $mysqli->query("SELECT * FROM compositions WHERE product_id = '$product_id'");
            while ($kompozycja=mysqli_fetch_array($pobierz_kompozycje) )
            {
               $component_id = $kompozycja['component_id'];
               $pobierz_skladnik = $mysqli->query("SELECT * FROM components WHERE id = '$component_id'");
               while ($skladnik=mysqli_fetch_array($pobierz_skladnik) )
               {
                  echo $skladnik['name'].' ';
               }
            }
            echo '</div></div>
            <div id="'.$piece_price.'" class="cart-list-price">'.$piece_price.'.00 zł</div>
            <div class="cart-list-quantity"><p> Szt: </p> <input type="number" class="product-cart-quantity" value="'.$cart_quantity.'" min="1" name="'.$cart_id.'"></div>
            <div class="cart-list-delete"><i class="icon-cancel-2" name="'.$cart_id.'" title="Usuń"></i></div>
            </li>';
         }
      }
   }
   else
   {
      echo '<h3>Brak produktów w koszyku<h3>';
      echo '<h3>Przejdź do menu aby wybrać coś dla siebie</h3>';
      echo '<a href="menu"><div class="white-btn">Menu</div></a>';
   }
   if($liczba_wierszy > 0)
   {
   echo '<div class="cart-sum">Suma zamówienia: <span></span>.00 zł</div>';
   echo '<a href="order.php"><div class="white-btn">Zamawiam</div></a>';
      
   }

?>