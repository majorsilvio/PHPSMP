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
		$this->$get =$_GET;
		$this->$post = $_POST;
		$this->$all = $_REQUEST;
		
	}
	public function get()
	{
		return $this->get;
	}
	public function post()
	{
		return $this->post;
	}
	public function all()
	{
		return $this->all;
	}

	public function setget()
	{
		return $this->get;
	}
	public function setpost()
	{
		return $this->post;
	}
	public function setall()
	{
		return $this->all;
	}
}



 ?>