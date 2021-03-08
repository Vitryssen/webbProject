<?php
include_once(__DIR__."/../config/Dbconfig.php");
class Database extends Dbconfig{
    public $connectionString;
    public $dataSet;
    private $sqlQuery;
    
    protected $databaseName;
    protected $hostName;
    protected $userName;
    protected $password;

    function __construct() {
        $this -> connectionString = NULL;
        $this -> sqlQuery = NULL;
        $this -> dataSet = NULL;

        $dbPara = new Dbconfig();
        $this -> databaseName = $dbPara -> dbName;
        $this -> hostName = $dbPara -> serverName;
        $this -> userName = $dbPara -> userName;
        $this -> password = $dbPara ->password;
        $dbPara = NULL;
    }
    function dbConnect()    {
        $this -> connectionString = new mysqli($this->hostName, $this->userName, $this->password, $this->databaseName);
        return $this -> connectionString;
    }
    function dbDisconnect() {
        $this -> connectionString = NULL;
        $this -> sqlQuery = NULL;
        $this -> dataSet = NULL;
        $this -> databaseName = NULL;
        $this -> hostName = NULL;
        $this -> userName = NULL;
        $this -> passCode = NULL;
    }
}
?>