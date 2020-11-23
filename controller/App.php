<?php namespace PHPSMP;
require_once dirname(__file__).'/Rout.php'; 


use \rout\Rout as Rout;
/**
 * 
 */
class App extends Rout
{

	function __construct(){
		$this->setDefaultRout();
		$_SERVER['SERVER_NAME'] = "PHPSMP";
	}

	public static function start()
	{
		if (sizeof(self::$routs) <= 1) {
		App::goTo('default');
		}else{
		App::goTo($_SERVER['REQUEST_URI']);

		}
	}
	
}


 ?>