<?php
$session_id = session_id();
if(isset($_POST['product']))
{
   include('db_connect.php');
   $product_id = $_POST['product'];
   
   $usuwanie = $mysqli->query("DELETE FROM cart WHERE id = '$product_id' AND session_id = '$session_id'");
   $delete = $mysqli->query($usuwanie);
 }


?>