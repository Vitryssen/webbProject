<!--
André Nordlund
VT21 DT100G/DT058G Datateknik Webbprogrammering 7.5 HP
Denna klass hanterar anslutningen till databasen
 -->
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
    //Initilize all variables on consctruct
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
    //Starts a connection string with values from db config
    function dbConnect()    {
        $this -> connectionString = new PDO("mysql:host=".$this->hostName.";dbname=".$this->databaseName, $this->userName, $this->password);
        $this->connectionString->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this -> connectionString;
    }
    //Disconnects the client by setting all variables to null
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