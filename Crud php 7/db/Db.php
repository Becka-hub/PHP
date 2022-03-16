<?php
namespace App\db;
use PDO;
use PDOException;
class Db extends PDO
{
	private static $instance;

	private const DBHOST="localhost";
	private const DBUSER="root";
	private const DBPASS="";
	private const DBNAME="php8";


	public function __construct()
	{
		$_dsn="mysql:dbname=".self::DBNAME.';host='.self::DBHOST;

		try {

			parent::__construct($_dsn,self::DBUSER,self::DBPASS);
			$this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND,'SET NAME utf8');
			
		} catch (PDOException $e) {

			die($e->getMessage());
		}
	}

	public static function getInstance()
	{
        if(self::$instance===null){
			self::$instance=new self();
		}	
		return self::$instance;
	}
}
