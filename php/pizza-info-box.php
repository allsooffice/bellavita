<?php
if(isset($_GET['id']))
{
$product_id = $_GET['id'];
$i = 1;
include('db_connect.php');

         $pobierz_produkty = $mysqli->query("SELECT * FROM products WHERE id='$product_id'");
         while ($produkt=mysqli_fetch_array($pobierz_produkty) )
         {
            echo '<i class="icon-cancel-1" title="Zamknij okno"></i>';
            echo '<img src="products_imgs/'.$produkt['neapolitan_img'].'" alt="">';
            echo '<h2 class="pizza-name-info">'.$produkt['name'].'<i class="icon-basket-1" name="'.$produkt['id'].'" size="32" title="Dodaj do zamówienia"></i></h2>';
            echo '<p>';
            $pobierz_kompozycje = $mysqli->query("SELECT * FROM compositions WHERE product_id = '$product_id'");
            while ($kompozycja=mysqli_fetch_array($pobierz_kompozycje) )
            {
               $component_id = $kompozycja['component_id'];
               $pobierz_skladnik = $mysqli->query("SELECT * FROM components WHERE id = '$component_id'");
               while ($skladnik=mysqli_fetch_array($pobierz_skladnik) )
               {
                  if($i == 1)
                  {
                     echo $skladnik['name'];
                  }

                  if($i > 1)
                  {
                     echo ', '.$skladnik['name'];
                  }
                  $i++;
               }
            }
            echo '</p>';
         }
  
   }

?>