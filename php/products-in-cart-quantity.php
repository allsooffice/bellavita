<?php
session_start();
$session_id = session_id();
include('db_connect.php');

$pobierz_produkty_z_koszyka = $mysqli->query("SELECT * FROM cart WHERE session_id = '$session_id'");
$liczba_wierszy = mysqli_num_rows($pobierz_produkty_z_koszyka);
echo $liczba_wierszy;
?>