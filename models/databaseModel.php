<?php
class databaseModel{
    private static $instance = null;
    private $conn;
    private function __construct($servername, $dbname, $username, $password){
        $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public static function getInstance($servername = 'localhost', $dbname = 'portfolio', $username = 'root', $password = 'NEWPASS'){
        if (self::$instance === null){
            self::$instance = new databaseModel($servername, $dbname, $username, $password);
        }
        return self::$instance;
    }
    public function getConnection(){
        return $this->conn;
    }
}
?>
