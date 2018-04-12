<?php
include('db_connect.php');
$pobierz_slicy = $mysqli->query("SELECT * FROM products WHERE category = 'pizza czerwona' OR category = 'pizza biała'");
            $positions = 1;
            $slice_number = 1;
            while ($slice=mysqli_fetch_array($pobierz_slicy) )
            {
            }

?>