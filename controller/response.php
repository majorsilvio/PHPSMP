<?php namespace res;

/**
 * 
 */
require_once 'App.php';

use \PHPSMP\App as App;

class Response
{
	private $values = [];

	public function set($index,$value = null)
	{
		if ($value === null) {
			$this->values += $index;
		}else{
			$this->values[$index] = $value;

		}
	}

	public function search($fileText)
	{
		
	}

	public function send($content = ''){
		echo $content;
	}

	public function sendFile($path='')
	{

		ob_start();
		if (file_exists($path)) {
			include_once $path;
		}
		$file = ob_get_clean();
		foreach (App::$temp as $key => $value) {
			$pattern = '/\[\['.$key.'\]\]/';
			// echo $pattern;
			$file = preg_replace_callback($pattern, $value, $file);
			
		}

		if (sizeof($this->values) > 0) {
			foreach ($this->values as $key => $value) {
				$pattern = '/\{\{'.$key.'\}\}/';
				if (is_callable($value)) {
					$file = preg_replace($pattern, $value(), $file);
					
				}else{
					$file = preg_replace($pattern, $value, $file);

				}
			}
				
		}
		$this->send($file);
		ob_end_flush();

	}
}


?>