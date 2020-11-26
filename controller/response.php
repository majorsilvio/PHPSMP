<?php namespace res;

/**
 * 
 */
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

	public function send($content = ''){
		echo $content;
	}

	public function sendFile($path='')
	{
		$file = file_get_contents($path);
		if (sizeof($this->values) > 0) {
			foreach ($this->values as $key => $value) {
				if (is_callable($value)) {
					$file = preg_replace('/\{\{'.$key.'\}\}/', $value(), $file);
					
				}else{
					$file = preg_replace('/\{\{'.$key.'\}\}/', $value, $file);

				}
			}
				$this->send($file);
		}else{
			require $path;
		}
	}
}


?>