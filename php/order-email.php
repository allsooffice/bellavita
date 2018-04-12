<?php
   $data = date('Y-m-d H:i:s');
   $to = 'zamowienia@bellavita.pl';
   $subj = 'Nowe zamówienie PIZZA BELLA VITA - '.$order_id;

   $message = 'Nowe zamówienie na pizza.bellavita.pl<br><br>
      <table style="border-collapse: collapse; border: 1px solid black;">
      <tr style="border: 1px solid black;">
         <td style="border: 1px solid black; padding: 5px;">Numer zamówienia</td><td style="border: 1px solid black; padding: 5px;">'.$order_id.'</td>
      </tr>
      <tr style="border: 1px solid black;">
      <td style="border: 1px solid black; padding: 5px;">Data zamówienia</td><td style="border: 1px solid black; padding: 5px;">'.$data.'</td>
      </tr>
      <tr style="border: 1px solid black;"><td style="border: 1px solid black; padding: 5px;">Zamówienie</td><td style="border: 1px solid black; padding: 5px;">
      ';
   

$pobierz_produkty_z_koszyka = $mysqli->query("SELECT * FROM cart WHERE session_id = '$order_id'");
   $liczba_wierszy = mysqli_num_rows($pobierz_produkty_z_koszyka);
   if($liczba_wierszy > 0)
   {
      while ($produkt_w_koszyku = mysqli_fetch_array($pobierz_produkty_z_koszyka) )
      {
         
         $product_id = $produkt_w_koszyku['product_id'];
         $cart_id = $produkt_w_koszyku['id'];
         $cart_quantity = $produkt_w_koszyku['quantity'];
         $dough = $produkt_w_koszyku['dough'];
         if($dough == 'neapolitan-dough')
         {
            $dough = 'Ciasto Neapolitańskie';
         }
         else if($dough == 'bella-dough')
         {
            $dough = 'Ciasto Rzymskie';
         }
         else if($dough == 'calzone-dough')
         {
            $dough = 'Ciasto Calzone';
         }
         
         else if($dough == 'no-gluten-dough')
         {
            $dough = 'Cisato bezglutenowe';
         }
         $size = $produkt_w_koszyku['size'];
         if($size != '')
         {
            $size = '('.$size.')';
         }
         $changes = $produkt_w_koszyku['changes'];
         $components = $produkt_w_koszyku['components'];
         $pobierz_produkty = $mysqli->query("SELECT * FROM products WHERE id='$product_id'");
         while ($produkt=mysqli_fetch_array($pobierz_produkty) )
         {
            $price = $produkt['price'];
            if($dough != '')
            {
               $dough .= ' <br>';
            }
            $message .= $produkt['name'].' '.$size.' x '.$cart_quantity.'<br>'.$dough.'';
            if($changes != '')
            {
               $message .= 'Zmiany: bez '.$changes.'<br><br>';
            }
            else
            {
               $message .= '<br><br>';
            }
         }
      }
   }


   $message .= '</td></tr>
   <tr style="border: 1px solid black;">
   <td style="border: 1px solid black; padding: 5px;">Adres</td>
   <td style="border: 1px solid black; padding: 5px;">'.$adress.'</td>
   </tr>
   <tr style="border: 1px solid black;">
   <td style="border: 1px solid black; padding: 5px;">email</td>
   <td style="border: 1px solid black; padding: 5px;">'.$email.'</td>
   </tr>
   <tr style="border: 1px solid black;">
   <td style="border: 1px solid black; padding: 5px;">Telefon</td>
   <td style="border: 1px solid black; padding: 5px;">'.$phone.'</td>
   </tr>
   <tr style="border: 1px solid black;">
   <td style="border: 1px solid black; padding: 5px;">Sposób płatności</td>
   <td style="border: 1px solid black; padding: 5px;">'.$payment_method.'</td>
   </tr>
   <tr style="border: 1px solid black;">
   <td style="border: 1px solid black; padding: 5px;">Płatność za dowóz</td>
   <td style="border: 1px solid black; padding: 5px;">'.$delivery_payment.' zł</td>
   </tr>
   <tr style="border: 1px solid black;">
   <td style="border: 1px solid black; padding: 5px;">Suma zamówienia</td>
   <td style="border: 1px solid black; padding: 5px;">'.$order_price.' zł</td>
   </tr>
   <tr style="border: 1px solid black;">
   <td style="border: 1px solid black; padding: 5px;">Dodatkowe informacje</td>
   <td style="border: 1px solid black; padding: 5px;">'.$cust_info.'</td>
   </tr>
   </table>

   ';
   $headers  = 'MIME-Version: 1.0' . "\r\n";
   $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
   $headers .= "From: www.bellavita.pl <zamowienia@bellavita.pl>\r\n";
   $headers .= "X-Sender: <zamowienia@bellavita.pl>";

   mail($to, $subj, $message, $headers);
?>
