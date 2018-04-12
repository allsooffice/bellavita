<?php
include('db_connect.php');
echo '
      <div class="pizza-list">
      <ul>';
$pobierz_produkty = $mysqli->query("SELECT * FROM products WHERE category = 'makarony'");
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
            echo '<span title="Kliknij aby usunąć ten składnik z dania" name="'.$skladnik['id'].'">'.$skladnik['name'].'</span>';
         }
         
         if($i > 1)
         {
            echo '<span title="Kliknij aby usunąć ten składnik z dania" name="'.$skladnik['id'].'">, '.$skladnik['name'].'</span>';
         }
         $i++;
      }
   }
   echo '
   </div>
   </div>
   <div class="pizza-list-righttbar">
   <div class="pizza-list-price"><span>'.$produkt['price'].'</span>.00 zł</div>
   <div class="pizza-list-cart"><div name="'.$produkt['id'].'" class="btn add-to-cart" size="" price="'.$produkt['price'].'"><i class=" icon-plus"></i>Zamawiam</div></div>
   </div>
   <div style="clear: both;"></div>
   </li>';
}
echo '</ul></div>'
?>