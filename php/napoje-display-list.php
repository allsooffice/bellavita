<?php
include('db_connect.php');
echo '
      <div class="pizza-list">
      <ul>
      <li class="drinks">
         <div class="drinks-left">
           
         </div>
         <div class="drinks-center">
            0.5 l
         </div>
         <div class="drinks-right">
            1 l
         </div>
      <div style="clear: both;"></div>
      </li>
      ';
$pobierz_produkty = $mysqli->query("SELECT * FROM products WHERE category = 'napoje' AND display <> 'none'");
while ($produkt=mysqli_fetch_array($pobierz_produkty) )
{
   $i = 1;
   $product_id = $produkt['id'];

   echo'<li>
   <div class="pizza-list-img"><img src="products_imgs/'.$produkt['neapolitan_img'].'" alt="'.$produkt['name'].'"/></div>
   <div class="pizza-list-leftbar">
   <div class="pizza-list-name">'.$produkt['name'].'</div>
   <div class="pizza-list-compo">';
   $pobierz_kompozycje = $mysqli->query("SELECT * FROM compositions WHERE product_id = '$product_id'");
   while ($kompozycja=mysqli_fetch_array($pobierz_kompozycje) )
   {
      $component_id = $kompozycja['component_id'];
      $pobierz_skladnik = $mysqli->query("SELECT * FROM components WHERE id = '$component_id'");
      while ($skladnik=mysqli_fetch_array($pobierz_skladnik) )
      {
         if($i == 1)
         {
            echo '<span title="Kliknij aby usunąć ten składnik z pizzy" name="'.$skladnik['id'].'">'.$skladnik['name'].'</span>';
         }
         
         if($i > 1)
         {
            echo '<span title="Kliknij aby usunąć ten składnik z pizzy" name="'.$skladnik['id'].'">, '.$skladnik['name'].'</span>';
         }
         $i++;
      }
   }
   echo '
   </div>
   </div>
   <div class="pizza-list-righttbar">
   <div class="drinks-capasity">
      <div class="drinks-capacity">
         <div class="drinks-capacity-left">
            0.5 l
         </div>
         <div class="drinks-capacity-right">
            1 l
         </div>
      </div>
   </div>
   <div class="pizza-list-cart"><div name="'.$produkt['id'].'" class="btn add-to-cart" size="0.5 l" price="'.$produkt['price'].'"><i class="icon-plus"></i>'.$produkt['price'].' zł</div></div>
   <div class="pizza-list-cart"><div name="'.$produkt['id'].'" class="btn add-to-cart" size="1 l" price="'.$produkt['price_42'].'"><i class="icon-plus"></i>'.$produkt['price_42'].' zł</div></div>
   </div>
   <div style="clear: both;"></div>
   </li>';
}
echo '</ul>

      <ul>
<li class="pizza-red">
         <div class="pizza-red-left">
            <p></p>
         </div>
         <div class="pizza-red-center">
            Napoje <span>Włoskie</span>
         </div>
         <div class="pizza-red-right" style="text-align: right;">
         </div>
         <div class="pizza-red-right-next">
         </div>
      <div style="clear: both;"></div>
      </li><div style="clear: both;"></div>
      ';
$pobierz_produkty = $mysqli->query("SELECT * FROM products WHERE category = 'napoje_wloskie'");
while ($produkt=mysqli_fetch_array($pobierz_produkty) )
{
   $i = 1;
   $product_id = $produkt['id'];

   echo'<li>
   <div class="pizza-list-img"><img src="products_imgs/'.$produkt['neapolitan_img'].'" alt="'.$produkt['name'].'"/></div>
   <div class="pizza-list-leftbar">
   <div class="pizza-list-name">'.$produkt['name'].'</div>
   <div class="pizza-list-compo">';
   $pobierz_kompozycje = $mysqli->query("SELECT * FROM compositions WHERE product_id = '$product_id'");
   while ($kompozycja=mysqli_fetch_array($pobierz_kompozycje) )
   {
      $component_id = $kompozycja['component_id'];
      $pobierz_skladnik = $mysqli->query("SELECT * FROM components WHERE id = '$component_id'");
      while ($skladnik=mysqli_fetch_array($pobierz_skladnik) )
      {
         if($i == 1)
         {
            echo '<span title="Kliknij aby usunąć ten składnik z pizzy" name="'.$skladnik['id'].'">'.$skladnik['name'].'</span>';
         }
         
         if($i > 1)
         {
            echo '<span title="Kliknij aby usunąć ten składnik z pizzy" name="'.$skladnik['id'].'">, '.$skladnik['name'].'</span>';
         }
         $i++;
      }
   }
   echo '
   </div>
   </div>
   <div class="pizza-list-righttbar">
   <div class="drinks-capasity">
      <div class="drinks-capacity">
         <div class="drinks-capacity-left">
            
         </div>
         <div class="drinks-capacity-right">
            330 ml
         </div>
      </div>
   </div>
   <div class="pizza-list-cart"></div>
   <div class="pizza-list-cart"><div name="'.$produkt['id'].'" class="btn add-to-cart" size="1 l" price="'.$produkt['price'].'"><i class="icon-plus"></i>'.$produkt['price'].' zł</div></div>
   </div>
   <div style="clear: both;"></div>
   </li>';
}
echo '</ul>
</div>';
?>