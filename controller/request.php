<?php namespace req;


/**
 * 
 */
class Request
{

	private $get;
	private $post;
	private $all;
	
	function __construct()
	{
		$this->setget();
		$this->setpost();
		$this->setall();
		
	}
	public function get($var = null)
	{
		if ($var == null) {
			return $this->get;
		}else{
			return $this->get[$var];
		}
	}
	public function post($var = null)
	{
		if ($var == null) {

			return $this->post;
		}else{
			return $this->post[$var];
		}
	}

	public function all($var = null)
	{
		if ($var == null) {
			return $this->all;
		}else{
			return $this->all[$var];
		}
	}

	protected function setget()
	{
		$this->get = $_GET;
	}
	protected function setpost()
	{
		$this->post = $_POST;
	}
	protected function setall()
	{
		$this->all = $_REQUEST;
	}
}



?>