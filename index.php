<?php 
	require_once dirname(__file__).'/controller/App.php';

	use \PHPSMP\App as App;

	$app = new App();


	$app->addRout('/',function($req,$res){
		$res->sendFile(dirname(__file__).'/views/test2.php');
	});
	
	
	App::start();

 ?>