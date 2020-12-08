<?php 
/**
 * 
 */
class BD extends PDO
{
	private $model;
	
	function __construct($configFile = "/../config.json",$bdmodel = "/../model/bd.json")
	{
		try{
			$this->config = json_decode(file_get_contents(dirname(__file__).$configFile),true)['bd'];
			$this->model = json_decode(file_get_contents(dirname(__file__).$bdmodel),true);
			
			$this->createDatabase();
			

		}catch(Exception $e){
			echo $e->getMessage().PHP_EOL;
			exit;
		}

	}
	public function createDatabase()
	{

		$dns = $this->config['driver'].":host=".$this->config['host'];

		parent::__construct($dns,$this->config['user'],$this->config['password']);
		$this->exec('CREATE DATABASE if not exists '.$this->config['dbname']);
		$this->setAttribute(parent::ATTR_ERRMODE, parent::ERRMODE_EXCEPTION);
		$this->exec('SET names utf8');
		$this->exec('use '.$this->config['dbname']);

		$this->createTable();
	}

	public function remakeDatabase()
	{
		$this->exec('DROP DATABASE if exists '.$this->config['dbname']);
		$this->createDatabase();
		
	}

	public function createTable()
	{
		try{

			foreach ($this->model as $bdname => $column) {
				$end = key( array_slice($column, -1));

				$query = 'CREATE TABLE IF NOT EXISTS '.$bdname.' (';
				foreach ($column as $name => $type) {
					if ($name !== $end) {
						$query .= " ".$name." ".$type.",";

					}else{
						$query .= " ".$name." ".$type;
					}
				}
				$query .= ")";

				$this->exec($query);

			}
		}catch(Exception $e){
			echo $e->getMessage().PHP_EOL;
			exit;
		}
	}
}

?>