<?php 
	require_once dirname(__file__).'/controller/App.php';

	use \PHPSMP\App as App;

	$app = new App();
	$app->setProjectName('PHPSMP');

	$app->addRout('/',function($req,$res){

		$res->set('name',function(){
			return 'PHPSMP';
		});
		$res->set('test','test2');
		$res->set(['project' =>'SMP']);

		$res->sendFile('./views/test1.php');
	});

	$app->defaultRout(function($req,$res){
		App::searchTemps();	
	});

	$app->addRout('/test2',function($req,$res){
		$res->sendFile(dirname(__file__).'/views/test2.php');
	});


	
	
	App::start();

 ?>