<?php namespace PHPSMP;
require_once dirname(__file__).'/Rout.php'; 


use \rout\Rout as Rout;
/**
 * 
 */
class App extends Rout
{

	protected static $temps;
	

	function __construct(){
		$this->defaultRout(function (){
			echo "this is a default rout";
		});
		$this->setProjectName("PHPSMP");
		$this->searchTemps();
	}

	private function setTemps($filename){
		
		$tempName =  explode('.', $filename)[1];
		self::$temps[$tempName] = function () use ($filename) {
				include_once dirname(__file__).'/../views/temp/'.$filename;
			};
	}
	public static function getTemps(){
		return self::$temps;
	}

	public static function getTemp($tempName){
		return seld::$temps[$tempName];
	}

	public static function start()
	{
		App::goTo($_SERVER['REQUEST_URI']);
	}

	public function setProjectName($value='')
	{
		$_SERVER['SERVER_NAME'] = $value;
	}
	public function searchTemps(){
		$allTemps = scandir(dirname(__file__).'/../views/temp');
		for ($i=2; $i < sizeof($allTemps) ; $i++) {
			$this->setTemps($allTemps[$i]);
		}
	}
	
}


 ?>