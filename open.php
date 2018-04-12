<?php
ini_set( 'display_errors', 'On' ); 
error_reporting( E_ALL );
/*Teraz*/
$now = date('Y-m-d H:i');
/*Data*/
$data = date('Y-m-d');
/*Liczbowy dzien tygodnia*/
$today = date('N');

/*Funkcja sprawdzająca niestandardowe dni*/
function special_days()
{
    $special_day[0]['name'] = 'Święta Pierwsze';
    $special_day[0]['data'] = '2018-03-31';
    $special_day[0]['open'] = '01:00';
    $special_day[0]['close'] = '22:00';
    $special_day[1]['name'] = 'Święta Drugie';
    $special_day[1]['data'] = '2018-04-01';
    $special_day[1]['open'] = 'closed';
    $special_day[1]['close'] = 'closed';    
    return $special_day;
}

$special_days = special_days();

/*Funkcja sprawdzająca dzień*/

function checkspecialDay($data, $special_days)
{
  foreach ( $special_days as $special_day )
  {
      if($data == $special_day['data'])
      {
        return array ($special_day['data'], $special_day['open'], $special_day['close']);
        exit;
      }
  }
}
$special_day = checkspecialDay($data, $special_days);

/*Standardowe godziny zamknięcia*/
function normal_hours($day)
{
    if($day == 1)
    {
        $open = '11:00';
        $close = '23:00';
    }
    
    if($day == 2)
    {
        $open = '11:00';
        $close = '23:00';
    }
    
    if($day == 3)
    {
        $open = '11:00';
        $close = '23:00';
    }
    
    if($day == 4)
    {
        $open = '11:00';
        $close = '23:00';
    }
    
    if($day == 5)
    {
        $open = '11:00';
        $close = '23:00';
    }
    
    if($day == 6)
    {
        $open = '11:00';
        $close = '23:00';
    }
    
    if($day == 7)
    {
        $open = '14:00';
        $close = '23:00';
    }
    
    return array ($open, $close);
    
}

/*Wyliczanie wczorjszego dnia oraz wczorajszej godziny zamkniecia*/
function yesterday($special_days)
{
    /*Pobranie wczorajszej daty*/
    $yesterday_date = date('Y-m-d', strtotime("-1 day"));
    $special_day = checkspecialDay($yesterday_date, $special_days);
    if($yesterday_date == $special_day[0])
    {
        $yesterday_close = $special_day[2];
        return $yesterday_close;
    }
    else
    {
        $yesterday_day = date('N', strtotime("-1 day"));
        $yesterday_close = normal_hours($yesterday_day);
        return $yesterday_close[1];
    }
}

/*Odnajdowanie godziny następnego otwarcia*/
function next_open_hour($special_days, $sameday)
{
    /*Przetworzenie czy godzina otwarcia z dziś czy z jutra*/
    if($sameday == 1)
    {
        $next_data = date('Y-m-d');
        $jump = 1;
    }
    else
    {
       $next_data = date('Y-m-d', strtotime("+1 day"));
        $jump = 2;
    }
    // Sprawdzanie czy jutr jest normalny dzień
    $other_day = checkspecialDay($next_data, $special_days);
    /*Sprawdzenie czy dzień jest świąteczy czy nie*/
    //Dzień świąteczny
    if($next_data == $other_day[0])
    {
        /*CZY JEST CZYNNE*/
        if($other_day[1] == 'closed')
        {
            /*Jeżeli nieczynne*/
            $after_free_day = date('Y-m-d', strtotime("+$jump day"));
            $second_special_day = checkspecialDay($after_free_day, $special_days);
            /*Jeżeli następny dzień po wolnym jest pracujący*/
            if($after_free_day != $second_special_day[0])
            {
                /*POBRANIE GODZINY ZE STANDARDOWEGO DNIA */
                $tod = date('N', strtotime($after_free_day));
                  $normal_day = normal_hours($tod);
                  $today['open'] = $normal_day[0];
                  return 'Nieczynne do: '.$after_free_day.' '.$today['open'];
            }
            else
            {
               /*Następny dzień bezpośrednio z listy dni specjalnych*/
                //JEŚLI TEŻ JEST ZAMKNIĘTY
                if($second_special_day[1] == 'closed')
                {
                    //szukanie dnia
                    $up = $jump+1;
                    $specials = count($special_days);
                    for($i = 0; $i<$specials; $i++)
                    {
                        $steel_free_day = date('Y-m-d', strtotime("+$up day"));
                        $download_day = $special_days[$i]['data'];
                        if($steel_free_day == $download_day)
                        {
                            $up++;
                        }
                        else
                        {
                            $works_day = $steel_free_day;
                        }
                    }
                    $tod = date('N', strtotime($works_day));
                      $work_day = normal_hours($tod);
                      $today['open'] = $work_day[0];
                      return 'Nieczynne do '.$works_day.' '.$today['open'];
                }
                /*Drugi dzień juz otwarty*/
                else
                {
                   return 'Nieczynne do: '.$second_special_day[0].' '.$second_special_day[1];
                }
            }
        }
        else
        {
            /*Jeżeli otwarty*/
          return 'Nieczynne do: '.$other_day[1];
        }
    }
    /*Zwykły dzień*/
    else
    {
      $tod = date('N', strtotime($next_data));
      $normal_day = normal_hours($tod);
      $today['open'] = $normal_day[0];
      return 'Zwykły '.$today['open'];
    }
}
$sameday = 1;
$wypisz = next_open_hour($special_days, $sameday);

echo $wypisz;


/*Godziny otwarcia ostateczne*/
function open_and_close_hours($data, $special_days)
{
    /*Pobranie wczorajszej daty*/
    $special_day = checkspecialDay($data, $special_days);
    if($data == $special_day[0])
    {
        $today['open'] = $special_day[1];
        $today['close'] = $special_day[2];
        return array ($today['open'], $today['close']);
    }
    else
    {
        $tod = date('N', strtotime($data));
        $normal_day = normal_hours($tod);
        $today['open'] = $normal_day[0];
        $today['close'] = $normal_day[1];
        return array ($today['open'], $today['close']);
    }
    
}


$open = open_and_close_hours($data, $special_days)[0];
$close = open_and_close_hours($data, $special_days)[1];
/*Godzina zamknięcia z dnia poprzedniego (W święta i normalne dni)*/
$yesterday_close = yesterday($special_days);

/*Sprawdzanie Czy lokal jest otwarty czy zamknięty*/
function localStatus($open, $close, $yesterday_close)
{
    if($open == 'closed')
    {
        return '1 Teraz nieczynne do ';
    }
    else
    {
        /*Aktualna godzina*/
        $hour = date('H:i');
        /*Godziny pracy standard np 8-16 - Godzina startu jest mniejsza niż zamknięcia*/
        if($open < $close)
        {
            if($hour > $open && $hour < $close)
            {
                return '1 Teraz twarte do '.$close;
            }
            else if($hour < $open || $hour > $close)
            {
                if($hour < $open && $hour < $yesterday_close && $open > $yesterday_close)
                {
                    return '2 Teraz twarte do '.$yesterday_close;
                }
                else if($hour > $close && $hour > $open)
                {
                    return '2 Teraz nieczynne do jutr6o ';
                }
                else
                {
                    return '2 Teraz nieczynne do godziny ';
                }
            }
        }
        /*Niestandardowo, godziny otwarcia matematycznie większe niż zamknięcia np otwarcie 12 zamknięcie 01*/
        if($open > $close)
        {
            if($hour > $open)
            {
                return '1 Teraz twarte do '.$close;
            }
            else if($hour < $open && $hour < $yesterday_close && $open > $yesterday_close)
            {
                return '2 Teraz twarte do '.$yesterday_close;
            }
            else
            {
                return '3 Teraz nieczynne do ';
            }

        } 
    }
}

$status = localStatus($open, $close, $yesterday_close);
echo $status;



