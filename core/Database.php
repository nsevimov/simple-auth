<?php
namespace app\core;
require_once __DIR__."/../config.php";

class Database {
    private $host = HOST;
    private $dbuser = USER;
    private $dbpass = PASS;
    private $dbname = DBNAME;

    public function connection() 
    {
        try 
        {
            //Data Source Name
            $dsn = "mysql:host=$this->host;dbname=$this->dbname";
            //PDO statement
            $pdo = new \PDO($dsn, $this->dbuser, $this->dbpass);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
        catch(\PDOException $exception) 
        {
            echo "Error: ".$exception->getMessage()." with code ".$exception->getCode();
        }
    }
}