<?php namespace res;

/**
 * 
 */
class Response
{

	public function send($content = ''){
		echo $content;
	}

	public function sendFile($path='')
	{
		include $path;
	}
}


 ?>