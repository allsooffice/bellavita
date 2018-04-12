<?php
include('db_connect.php');
echo '
      <div class="pizza-list">
      <ul>';
$pobierz_produkty = $mysqli->query("SELECT * FROM products WHERE category = 'desery'");
while ($produkt=mysqli_fetch_array($pobierz_produkty) )
{
   $i = 1;
   $product_id = $produkt['id'];
   echo'<li>
   <div class="pizza-list-img"><img src="products_imgs/'.$produkt['neapolitan_img'].'" alt="'.$produkt['name'].'"/></div>
   <div class="pizza-list-leftbar">
   <div class="pizza-list-name">'.$produkt['name'].'</div>
   <div class="pizza-list-compo">
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