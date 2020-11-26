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
	public function get($index = null)
	{
		if ($index == null) {
			return $this->get;
		}else{
			return $this->get[$index];
		}
	}
	public function post($index = null)
	{
		if ($index == null) {

			return $this->post;
		}else{
			return $this->post[$index];
		}
	}

	public function all($index = null)
	{
		if ($index == null) {
			return $this->all;
		}else{
			return $this->all[$index];
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