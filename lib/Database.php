<?php 

/**
 * Database class
 */
class Database{
	
	private $hostDB = "localhost";
	private $userDB = "root";
	private $passDB = "";
	private $nameDB = "db_lr";

	public $pdo;

	function __construct(){
		if (!isset($this->pdo)) {
			try {
				$link = new PDO("mysql:host=".$this->hostDB.";dbname=".$this->nameDB,$this->userDB, $this->passDB);
				$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$link->exec('SET CHARACTER SET utf8');
				$this->pdo = $link;

			} catch (PDOException $e) {
				die("Failed to connect with Database".$e->getMessage());
			}
				
		}
	}
}
