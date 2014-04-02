<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Использование:
 *		declension(117, array('слово', 'слова', 'слов')); // выведет «117 слов»
 *		declension(52, 'слово слова слов', FALSE); // выведет «слова»
 *
 * @param	integer		$num			Само число
 * @param	mixed		$strings_125	Массив форм существительного или строка со словами, разделенными пробелами
 * @param	boolean		$with_num		Возвращать слово с числом (TRUE) или без (FALSE)
 */
if ( ! function_exists('declension'))
{	
	function declension($num, $strings_125, $with_num = TRUE)
	{
		if ( is_string($strings_125) ) { $strings_125 = explode(" ", $strings_125); }
	
		$dec = abs($num) % 100;
		$unt = $dec % 10;
		
		if ($dec > 10 && $dec < 20) { $result = $strings_125[2]; }
		elseif ($unt > 1 && $unt < 5) { $result = $strings_125[1]; }
		elseif ($unt == 1) { $result = $strings_125[0]; }
		else { $result = $strings_125[2]; }
		
		return ($with_num ? $num . " " : "") . $result;
	}
}


/* End of file declension_helper.php */
/* Location: ./application/helpers/MY_inflector_helper.php */