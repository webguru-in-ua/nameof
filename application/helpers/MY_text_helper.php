<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed.');

function br2nl($string)
{
  $string = eregi_replace('<br[[:space:]]*/?' . '[[:space:]]*>', chr(13) . chr(10), $string);
  return $string;
}

function cyr2lat($string)
{

  $iso9_table = array(
    'А' => 'A',
    'Б' => 'B',
    'В' => 'V',
    'Г' => 'G',
    'Ѓ' => 'G`',
    'Ґ' => 'G`',
    'Д' => 'D',
    'Е' => 'E',
    'Ё' => 'YO',
    'Є' => 'YE',
    'Ж' => 'ZH',
    'З' => 'Z',
    'Ѕ' => 'Z',
    'И' => 'I',
    'Й' => 'Y',
    'Ј' => 'J',
    'І' => 'I',
    'Ї' => 'YI',
    'К' => 'K',
    'Ќ' => 'K',
    'Л' => 'L',
    'Љ' => 'L',
    'М' => 'M',
    'Н' => 'N',
    'Њ' => 'N',
    'О' => 'O',
    'П' => 'P',
    'Р' => 'R',
    'С' => 'S',
    'Т' => 'T',
    'У' => 'U',
    'Ў' => 'U',
    'Ф' => 'F',
    'Х' => 'H',
    'Ц' => 'TS',
    'Ч' => 'CH',
    'Џ' => 'DH',
    'Ш' => 'SH',
    'Щ' => 'SHH',
    'Ъ' => '``',
    'Ы' => 'YI',
    'Ь' => '`',
    'Э' => 'E`',
    'Ю' => 'YU',
    'Я' => 'YA',
    'а' => 'a',
    'б' => 'b',
    'в' => 'v',
    'г' => 'g',
    'ѓ' => 'g',
    'ґ' => 'g',
    'д' => 'd',
    'е' => 'e',
    'ё' => 'yo',
    'є' => 'ye',
    'ж' => 'zh',
    'з' => 'z',
    'ѕ' => 'z',
    'и' => 'i',
    'й' => 'y',
    'ј' => 'j',
    'і' => 'i',
    'ї' => 'yi',
    'к' => 'k',
    'ќ' => 'k',
    'л' => 'l',
    'љ' => 'l',
    'м' => 'm',
    'н' => 'n',
    'њ' => 'n',
    'о' => 'o',
    'п' => 'p',
    'р' => 'r',
    'с' => 's',
    'т' => 't',
    'у' => 'u',
    'ў' => 'u',
    'ф' => 'f',
    'х' => 'h',
    'ц' => 'ts',
    'ч' => 'ch',
    'џ' => 'dh',
    'ш' => 'sh',
    'щ' => 'shh',
    'ь' => '',
    'ы' => 'yi',
    'ъ' => "'",
    'э' => 'e`',
    'ю' => 'yu',
    'я' => 'ya',
    '.' => '',
    "'" => '-');

  $string = strtr($string, $iso9_table);

  //preg_replace("/[^A-Za-z0-9`'_\-\.]/", '-', $string);
  $string = preg_replace("/[^A-Za-z0-9'_\-\.]/", '-', $string);
  $string = preg_replace('/\-+/', '-', $string);
  $string = preg_replace('/^-+/', '', $string);
  $string = preg_replace('/-+$/', '', $string);
    
  return strtolower($string);
}
