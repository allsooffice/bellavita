<?php
session_start();
$session_id = session_id();
include('time_checker_input.php');


//sprawdzanie czy teraz jest wieksze od godziny zamkniecia i mniejsze od otwarcia
if($opening == 'close')
{
    echo 'Teraz: nieczynne do 02.04, godz 11:00';
    //usuwanie produktow z koszyka
   include('db_connect.php');
   $usuwanie = $mysqli->query("DELETE FROM cart WHERE session_id = '$session_id'");
   $delete = $mysqli->query($usuwanie);
}
else if($current_date_time > $close_hour || $current_date_time < $open_hour || $current_date_time > $closed_day_start && $current_date_time < $closed_day_end)
{
   if($tommorow_day == $atypical_day)
   {
      echo 'Nieczynne, zapraszamy juro o godz: '.$atypical_day_hour; 
   }
   else
   {
      echo 'Teraz: nieczynne do '.$special.$open_hour_output;
   }
   //usuwanie produktow z koszyka
   include('db_connect.php');
   $usuwanie = $mysqli->query("DELETE FROM cart WHERE session_id = '$session_id'");
   $delete = $mysqli->query($usuwanie);

}
else
{
   echo 'Teraz: otwarte do '.$close_hour_output;
}

?>