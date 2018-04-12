<?php
session_start();
if(isset($_POST['id']))
{
   include('db_connect.php');
   $product_id = $_POST['id'];
   $product_quantity = $_POST['quantity'];
   $up_date = "UPDATE cart SET quantity = '$product_quantity' WHERE id = '$product_id'";
   // wykonanie dodawania do bazy
   $aktualizuje = $mysqli->query($up_date);
}


?>