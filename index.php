<?php 
	require_once dirname(__file__).'/controller/App.php';

	use \PHPSMP\App as App;

	$app = new App();
	$app->setProjectName('opa');

	$app->addRout('/',function($req,$res){
		$res->sendFile('./views/test1.php');
	});

	$app->addRout('/test2',function($req,$res){
		$res->sendFile(dirname(__file__).'/views/test2.php');
	});
	
	
	App::start();

 ?>