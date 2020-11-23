<?php namespace rout;

require_once dirname(__file__).'/response.php';
require_once dirname(__file__).'/request.php';
use \res\Response as res;
use \req\Request as req;

/**
 * 
 */
class Rout
{
	public static $routs = [];
	public static $routsF = [];

	function __construct(){
	}

	public function addRout($rout='',Object $func)
	{
		$numargs = func_num_args();
		if ($numargs === 2) {
			self::$routsF[$rout] = $func;
			self::$routs[] = $rout;

		}
	}

	public static function goTo($rout)
	{	

		$replaced = preg_replace('/\?.*/', '', $rout);
		self::$routsF[$replaced](new req ,new res());
	}
	public static function getRouts()
	{
		return self::$routs;
	}
	
	public function setDefaultRout($path ='default')
	{
		$this->addRout($path,function($req,$res){
			$res->send('The project is runing');
		});
	}

}

?>