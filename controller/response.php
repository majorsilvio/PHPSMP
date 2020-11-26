<?php namespace res;

/**
 * 
 */
class Response
{
	public $values = [];

	public function set($index,$value)
	{
		$this->values[$index] = $value;
	}

	public function send($content = ''){
		echo $content;
	}

	public function sendFile($path='')
	{
		if (sizeof($this->$values) > 0) {
			foreach ($variable as $key => $value) {
				$file = file_get_contents($path);
				$file = preg_replace('{{'.$key.'}}', $value, $file);
				$this->send($file);
			}
		}
		require $path;
	}
}


 ?>