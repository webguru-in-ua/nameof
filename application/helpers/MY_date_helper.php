<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed.');


function rus_months($month = false)
{
  $months = array(
    'января',
    'февраля',
    'марта',
    'апреля',
    'мая',
    'июня',
    'июля',
    'августа',
    'сентября',
    'октября',
    'ноября',
    'декабря');

  if ($month)
    return $months[$month - 1];

  return $months;
}

if (!function_exists('date_parse_from_format')) {
  function date_parse_from_format($format, $date)
  {
    $dMask = array(
      'H' => 'hour',
      'i' => 'minute',
      's' => 'second',
      'y' => 'year',
      'm' => 'month',
      'd' => 'day');
    $format = preg_split('//', $format, -1, PREG_SPLIT_NO_EMPTY);
    $date = preg_split('//', $date, -1, PREG_SPLIT_NO_EMPTY);

    foreach ($date as $k => $v) {
      if (isset($dMask[$format[$k]])) {

        if (isset($dt[$dMask[$format[$k]]]))
          $dt[$dMask[$format[$k]]] .= $v;
        else
          $dt[$dMask[$format[$k]]] = $v;
      }
    }
    return $dt;
  }
}

// 18 января в 07:20
// сегодня, января 07:00
function rus_date_format($format, $unixtime = null)
{
  $datetime_arr = getdate($unixtime);

  $MONTH = rus_months($datetime_arr['mon']);

  switch (date('Y-m-d', $unixtime)) {
    case date('Y-m-d'):
      $NOW = 'Сегодня';
      break;
    case date('Y-m-d', mktime(0, 0, 0, $datetime_arr['mon'], $datetime_arr['mday'] - 1, $datetime_arr['year'])):
      $NOW = 'Вчера';
      break;
    case date('Y-m-d', mktime(0, 0, 0, $datetime_arr['mon'], $datetime_arr['mday'] + 1, $datetime_arr['year'])):
      $NOW = 'Завтра';
      break;
    default:
      $NOW = '';
  }


  if (!empty($NOW))
    $format = str_replace('NOW', $NOW, $format);
  else {
    $format = str_replace('NOW,', '', $format);
    $format = str_replace('NOW', '', $format);
  }

  $format = str_replace('MONTH', $MONTH, $format);

  return date($format, $unixtime);
}


function rus_str_date($date_str, $format)
{
  $date_arr = date_parse_from_format($format, $date_str);

  $monthes = array(
    'января',
    'февраля',
    'марта',
    'апреля',
    'мая',
    'июня',
    'июля',
    'августа',
    'сентября',
    'октября',
    'ноября',
    'декабря');

  $date_arr['day'] = (int)$date_arr['day'];
  $date_arr['month'] = $monthes[(int)$date_arr['month'] - 1];

  return $date_arr['day'] . ' ' . $date_arr['month'] . ' в ' . $date_arr['hour'] . ':' . $date_arr['minute'];
}


if (!function_exists('mysql_russian_date')) {
  function mysql_russian_date($datestr = '')
  {
    if ($datestr == '')
      return '';

    // получаем значение даты и времени
    list($day) = explode(' ', $datestr);

    switch ($day) {
        // Если дата совпадает с сегодняшней
      case date('Y-m-d'):
        $result = 'Сегодня';
        break;

        //Если дата совпадает со вчерашней
      case date('Y-m-d', mktime(0, 0, 0, date("m"), date("d") - 1, date("Y"))):
        $result = 'Вчера';
        break;

      default:
        {
          // Разделяем отображение даты на составляющие
          list($y, $m, $d) = explode('-', $day);

          $month_str = array(
            'января',
            'февраля',
            'марта',
            'апреля',
            'мая',
            'июня',
            'июля',
            'августа',
            'сентября',
            'октября',
            'ноября',
            'декабря');
          $month_int = array(
            '01',
            '02',
            '03',
            '04',
            '05',
            '06',
            '07',
            '08',
            '09',
            '10',
            '11',
            '12');

          // Замена числового обозначения месяца на словесное (склоненное в падеже)
          $m = str_replace($month_int, $month_str, $m);
          // Формирование окончательного результата
          $result = (int)$d . ' ' . $m . ' ' . $y;
        }
    }
    return $result;


  }
}

// ------------------------------------------------------------------------

if (!function_exists('mysql_russian_datetime')) {
  function mysql_russian_datetime($datestr = '')
  {
    if ($datestr == '')
      return '';

    // Разбиение строки в 3 части - date, time and AM/PM
    $dt_elements = explode(' ', $datestr);

    // Разбиение даты
    $date_elements = explode('-', $dt_elements[0]);

    // Разбиение времени
    $time_elements = explode(':', $dt_elements[1]);

    // вывод результата
    $result1 = mktime($time_elements[0], $time_elements[1], $time_elements[2], $date_elements[1], $date_elements[2],
      $date_elements[0]);

    $monthes = array(
      ' ',
      'января',
      'февраля',
      'марта',
      'апреля',
      'мая',
      'июня',
      'июля',
      'августа',
      'сентября',
      'октября',
      'ноября',
      'декабря');
    $days = array(
      ' ',
      'понедельник',
      'вторник',
      'среда',
      'четверг',
      'пятница',
      'суббота',
      'воскресенье');
    $day = date("j", $result1);
    $month = $monthes[date("n", $result1)];
    $year = date("Y", $result1);
    $hour = date("G", $result1);
    $minute = date("i", $result1);
    $dayofweek = $days[date("N", $result1)];
    $result = $day . ' ' . $month . ' ' . $year . ' в ' . $hour . ':' . $minute;


    return $result;


  }
}
