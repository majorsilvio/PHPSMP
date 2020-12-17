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
	protected static $routs = [];
	protected static $routsF = [];

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

	public static function getRouts()
	{
		return self::$routs;
	}
	public static function goTo($rout)
	{	
		$rout = preg_replace('/\?.*/', '', $rout);
		if (!isset(self::$routsF[$rout])) {
			self::$routsF['default'](new req ,new res());
		}else{
			self::$routsF[$rout](new req ,new res());

		}
	}
	
	public function defaultRout(Object $func,$path ='default')
	{
		self::$routsF[$path] = $func;
	}

}

?>