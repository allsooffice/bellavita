<?php
include('db_connect.php');

//      <div class="pizza-content">
//         <div class="prev"><i class="icon-left-open-1"></i></div>
//            <div class="pizza-circle" name="0" change="8" condragstart="return false" index="850">';
//            $pobierz_slicy = $mysqli->query("SELECT * FROM products WHERE category = 'pizza czerwona' OR category = 'pizza biała' OR category = 'dla koneserów' OR category = 'dla dzieci'");
//            $positions = 1;
//            $slice_number = 1;
//            //wyswietlane pizze
//            while ($slice=mysqli_fetch_array($pobierz_slicy) )
//            {
//               if($positions < 9)
//               {
//                 echo '<div class="pizza-slice-'.$slice_number.'" name="'.$slice['id'].'" style="background-image: url(products_imgs/slices/'.$slice['neapolitan_slice'].');"></div>
//                 ';
//               }
//              
//               $positions++;
//               $slice_number++;
//            }
//            $pobierz_slicy = $mysqli->query("SELECT * FROM products WHERE category = 'pizza czerwona' OR category = 'pizza biała' OR category = 'dla koneserów' OR category = 'dla dzieci'");
//            $slice_number = 1;
//            $positions = 1;
//            while ($slice=mysqli_fetch_array($pobierz_slicy) )
//            {
//               if($slice_number == 9)
//               {
//                  $slice_number = 1;
//               }
//              if($positions > 8)
//               {
//               echo '<div class="slice" name="'.$slice['id'].'" style="background-image: url(products_imgs/slices/'.$slice['neapolitan_slice'].'); display: none;"></div>';
//               }
//               $slice_number++;
//               $positions++;
//            }
//            $pobierz_slicy = $mysqli->query("SELECT * FROM products WHERE category = 'pizza czerwona' OR category = 'pizza biała' OR category = 'dla koneserów' OR category = 'dla dzieci'");
//            $positions = 1;
//            $slice_number = 1;
//            //wyswietlane pizze
//            while ($slice=mysqli_fetch_array($pobierz_slicy) )
//            {
//               if($positions < 9)
//               {
//               echo '<div class="slice" name="'.$slice['id'].'" style="background-image: url(products_imgs/slices/'.$slice['neapolitan_slice'].'); display: none;"></div>';
//               }
//              
//               $positions++;
//               $slice_number++;
//            }
//         echo '</div><div class="move-down-info">
//            Możesz obracać pizze przesuwając palec do góry.
//            Aby przesunąć ekran niżej, kliknij przycisk "Do dołu" znajdujący się w dolnej części ekranu.
//            <div class="btn" id="close-move-info">Zamknij</div>
//         </div>
//         <div class="move-down">
//            <i class="icon-down-open"></i>
//         </div>
//         <div class="next"><i class="icon-right-open-1"></i></div>
//      </div>
//      <div class="pizza-info">       </div>    

      
      echo '<div class="pizza-list">
      <ul>
      <li class="pizza-red">
         <div class="pizza-red-left">
            <p>W każdej pizzy możesz usunąc wybrany składnik - wystarczy na niego kliknąc.</p>
         </div>
         <div class="pizza-red-center">
            Pizza <span>czerwona</span>
         </div>
         <div class="pizza-red-right">
            
         </div>
         <div class="pizza-red-right-next">
            <img src="img/32.png" alt="32 cm"/>
         </div>
      <div style="clear: both;"></div>
      </li><div style="clear: both;"></div>';
$pobierz_produkty = $mysqli->query("SELECT * FROM products WHERE category = 'pizza czerwona'");
while ($produkt=mysqli_fetch_array($pobierz_produkty) )
{
   $i = 1;
   $product_id = $produkt['id'];

   echo'<li id="pos-'.$product_id.'">
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
   <div class="pizza-list-price"><span>'.$produkt['price'].'</span>.00 zł</div>
   <div class="pizza-list-cart"><div name="'.$produkt['id'].'" class="btn add-to-cart" size="32 cm" dough="neapolitan-dough" price="'.$produkt['price'].'"><i class=" icon-plus"></i>Zamawiam</div></div>
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
            <img src="img/32.png" alt="32 cm"/>
         </div>
      <div style="clear: both;"></div>
      </li><div style="clear: both;"></div>';
$pobierz_produkty = $mysqli->query("SELECT * FROM products WHERE category = 'pizza biała' AND display <> 'none'");
while ($produkt=mysqli_fetch_array($pobierz_produkty) )
{
   $i = 1;
   $product_id = $produkt['id'];
   echo'<li id="pos-'.$product_id.'">
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
   <div class="pizza-list-price"><span>'.$produkt['price'].'</span>.00 zł</div>
   <div class="pizza-list-cart"><div name="'.$produkt['id'].'" class="btn add-to-cart" size="32 cm" dough="neapolitan-dough" price="'.$produkt['price'].'"><i class=" icon-plus"></i>Zamawiam</div></div>
   </div>
   <div style="clear: both;"></div>
   </li>';
}

      echo '<li class="pizza-red">
         <div class="pizza-red-left">
            <p>W każdej pizzy możesz usunąc wybrany składnik - wystarczy na niego kliknąc.</p>
         </div>
         <div class="pizza-red-center" style="padding: 0;">
            Pizza<span>dla koneserów</span>
         </div>
         <div class="pizza-red-right">
            
         </div>
         <div class="pizza-red-right-next">
            <img src="img/32.png" alt="32 cm"/>
         </div>
      <div style="clear: both;"></div>
      </li><div style="clear: both;"></div>';
$pobierz_produkty = $mysqli->query("SELECT * FROM products WHERE category = 'dla koneserów'");
while ($produkt=mysqli_fetch_array($pobierz_produkty) )
{
   $i = 1;
   $product_id = $produkt['id'];

   echo'<li id="pos-'.$product_id.'">
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
   <div class="pizza-list-price"><span>'.$produkt['price'].'</span>.00 zł</div>
   <div class="pizza-list-cart"><div name="'.$produkt['id'].'" class="btn add-to-cart" size="32 cm" dough="neapolitan-dough" price="'.$produkt['price'].'"><i class=" icon-plus"></i>Zamawiam</div></div>
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
            <img src="img/32.png" alt="32 cm"/>
         </div>
      <div style="clear: both;"></div>
      </li><div style="clear: both;"></div>';

$pobierz_produkty = $mysqli->query("SELECT * FROM products WHERE category = 'dla dzieci'");
while ($produkt=mysqli_fetch_array($pobierz_produkty) )
{
   $i = 1;
   $product_id = $produkt['id'];

   echo'<li id="pos-'.$product_id.'">
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
   <div class="pizza-list-price"><span>'.$produkt['price'].'</span>.00 zł</div>
   <div class="pizza-list-cart"><div name="'.$produkt['id'].'" class="btn add-to-cart" size="32 cm" dough="neapolitan-dough" price="'.$produkt['price'].'"><i class=" icon-plus"></i>Zamawiam</div></div>
   </div>
   <div style="clear: both;"></div>
   </li>';
}


echo '</ul></div>';

?>