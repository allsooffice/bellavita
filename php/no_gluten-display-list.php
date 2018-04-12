<?php
include('db_connect.php');
echo '
      <div class="pizza-content" style="display: none;">
      </div>
      <div class="pizza-info">            

      </div>
      <div class="pizza-list">
      <ul>
      <li class="pizza-red"">
         <div class="pizza-red-left">
            <p>W każdej pizzy możesz usunąc wybrany składnik - wystarczy na niego kliknąc.</p>
         </div>
         <div class="pizza-red-center">
            Pizza<span>czerwona</span>
         </div>
         <div class="pizza-red-right">
            
         </div>
         <div class="pizza-red-right-next">
            <img src="img/28.png" alt="28 cm"/>
         </div>
      <div style="clear: both;"></div>
      </li><div style="clear: both;"></div>';
$pobierz_produkty = $mysqli->query("SELECT * FROM products WHERE category = 'pizza czerwona' AND no_gluten <> 0");
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
   <div class="pizza-list-price"><span>'.$produkt['no_gluten'].'</span>.00 zł</div>
   <div class="pizza-list-cart"><div name="'.$produkt['id'].'" class="btn add-to-cart" size="28 cm" dough="no-gluten-dough" price="'.$produkt['no_gluten'].'"><i class=" icon-plus"></i>Zamawiam</div></div>
   </div>
   <div style="clear: both;"></div>
   </li>';
}

      echo '<li class="pizza-red">
         <div class="pizza-red-left">
            <p>W każdej pizzy możesz usunąc wybrany składnik - wystarczy na niego kliknąc.</p>
         </div>
         <div class="pizza-red-center">
            Pizza <span>biała</span>
         </div>
         <div class="pizza-red-right">
            
         </div>
         <div class="pizza-red-right-next">
            <img src="img/28.png" alt="28 cm"/>
         </div>
      <div style="clear: both;"></div>
      </li><div style="clear: both;"></div>';

$pobierz_produkty = $mysqli->query("SELECT * FROM products WHERE category = 'dla koneserów' AND no_gluten <> 0");
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
   <div class="pizza-list-price"><span>'.$produkt['no_gluten'].'</span>.00 zł</div>
   <div class="pizza-list-cart"><div name="'.$produkt['id'].'" class="btn add-to-cart" size="28 cm" dough="no-gluten-dough" price="'.$produkt['no_gluten'].'"><i class=" icon-plus"></i>Zamawiam</div></div>
   </div>
   <div style="clear: both;"></div>
   </li>';
}
   
         echo '<li class="pizza-red">
         <div class="pizza-red-left">
            <p>W każdej pizzy możesz usunąc wybrany składnik - wystarczy na niego kliknąc.</p>
         </div>
         <div class="pizza-red-center">
            Pizza<span>dla dzieci</span>
         </div>
         <div class="pizza-red-right">
            
         </div>
         <div class="pizza-red-right-next">
            <img src="img/28.png" alt="28 cm"/>
         </div>
      <div style="clear: both;"></div>
      </li><div style="clear: both;"></div>';

$pobierz_produkty = $mysqli->query("SELECT * FROM products WHERE category = 'dla dzieci' AND no_gluten <> 0");
while ($produkt=mysqli_fetch_array($pobierz_produkty) )
{
   $i = 1;
   $product_id = $produkt['id'];
   $no_gluten = $produkt['no_gluten'];
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
   <div class="pizza-list-price"><span>'.$produkt['no_gluten'].'</span>.00 zł</div>
   <div class="pizza-list-cart"><div name="'.$produkt['id'].'" class="btn add-to-cart" size="28 cm" dough="no-gluten-dough" price="'.$produkt['no_gluten'].'"><i class=" icon-plus"></i>Zamawiam</div></div>
   </div>
   <div style="clear: both;"></div>
   </li><div style="clear: both;"></div>';
}


echo '</ul></div>';

?>