<?php
/**
 * Class and Function List:
 * Function list:
 * - create_movie()
 * - _strip_name()
 * Classes list:
 * - Blinken
 */

class Blinken
{
	
	function create_movie($content) 
	{

		//get filename
		libxml_use_internal_errors(true);
		$xml = simplexml_load_string($content);
		
		if (!$xml) 
		{
			return '';
		}
		$filename = $this->_strip_name($xml->header->title);
		
		if ($filename == '' || $filename == 'movies' || $filename == 'embed') 
		{
			return '';
		}
		
		if (file_exists('movies/' . $filename . '.bml')) 
		{
			return '';
		}

		//save
		file_put_contents('movies/' . $filename . '.bml', $content);

		//return
		return $filename;
	}
	
	function _strip_name($string) 
	{
		$CI = & get_instance();
		$search = array(
			'ä',
			'ö',
			'ü',
			'Ä',
			'Ö',
			'Ü',
			'é',
			'è',
			'ê',
			'ç',
			'à',
			' ',
		);
		$replace = array(
			'ae',
			'oe',
			'ue',
			'Ae',
			'Oe',
			'Ue',
			'e',
			'e',
			'e',
			'c',
			'a',
			'-',
		);
		$string = str_replace($search, $replace, $string);
		$string = strtolower($string);
		$count = strlen($string);
		$result = '';
		for ($i = 0;$i < $count;$i++) 
		{
			
			if (preg_match('{[' . $CI->config->item('permitted_uri_chars') . ']}', $string[$i])) 
			{
				$result.= $string[$i];
			}
		}
		return $result;
	}
}
