<?php
//Pobieranie aktualnego dnia
$current_date_time = date('Y-m-d H:i');
$current_date_day = date('Y-m-d');
$tommorow_day = date('Y-m-d', strtotime($current_date_time.'+1 day'));
$current_year = date('Y');
$current_month = date('m');
$current_day = date('d');
$current_day_number = date('N');
//specjalny dzien - nieczynne
$closed_day_start = new DateTime('2017-12-31 01:00');
$closed_day_start = $closed_day_start->format('Y-m-d H:i');
$closed_day_end = new DateTime('2017-12-31 23:59');
$closed_day_end = $closed_day_end->format('Y-m-d H:i');
//nietypowe godziny otwarcia
$atypical_day_format = new DateTime('2018-01-01 12:00');
$atypical_day = $atypical_day_format->format('Y-m-d');
$atypical_day_hour = $atypical_day_format->format('H:i');
$special = '';
$minutes = 00;
if($current_day_number == 1)
{
   $opening = 11;
   $closing = 23;
}

if($current_day_number == 2)
{
   $opening = 11;
   $closing = 23;
}

if($current_day_number == 3)
{
   $opening = 11;
   $closing = 23;
}

if($current_day_number == 4)
{
   $opening = 11;
   $closing = 23;
}

if($current_day_number == 5)
{
   $opening = 11;
   $closing = 23;
}

if($current_day_number == 6)
{
   $opening = 11;
   $closing = 23;
}

if($current_day_number == 7)
{
   $opening = 11;
   $closing = 23;
}

if($atypical_day == $current_date_day)
{
   $opening = 11;
   $closing = 23;
}

//Godzina otwarcia
$open = new DateTime($current_year.'-'.$current_month.'-'.$current_day);
$open->setTime($opening, 00);
$open_hour = $open->format('Y-m-d H:i');
$open_hour_output = $open->format('H:i');
//Godzina zamknięcia
$close = new DateTime($current_year.'-'.$current_month.'-'.$current_day);
$close->setTime($closing, 00);
$close_hour = $close->format('Y-m-d H:i');
$close_hour_output = $close->format('H:i');
?>