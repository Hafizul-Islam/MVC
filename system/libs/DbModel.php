<?php 
/**
 * Db Model
 */
class DbModel
{	
	protected $db = array();
	
	function __construct()
	{
		$host = '127.0.0.1';
		$db   = 'dv_mvc';
		$user = 'root';
		$pass = '7141';
		$charset = 'utf8mb4';

		$dsn = "mysql:host=$host; dbname=$db; charset=$charset";
		
		$this->db = new Database($dsn, $user, $pass);
	}
}