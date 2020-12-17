<?php namespace PHPSMP;
require_once dirname(__file__).'/Rout.php'; 


use \rout\Rout as Rout;
/**
 * 
 */
class App extends Rout
{

	public static $temp;
	

	function __construct(){
		$this->defaultRout(function (){
			echo "this is a default rout";
		});
		$this->setProjectName("PHPSMP");
		$this->searchTemps();
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
			$tempName =  explode('.', $allTemps[$i])[1];
			self::$temp[$tempName] = function () use ($allTemps,$i) {
				include_once dirname(__file__).'/../views/temp/'.$allTemps[$i];
			};
		}
	}
	
}


 ?>