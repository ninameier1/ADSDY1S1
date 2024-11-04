<?php
// Define the DatabaseModel class responsible for establishing a database connection
class databaseModel{
    private static $instance = null; // Static property to hold the single instance of the class
    private $conn; // Property to hold the database connection

    // Private constructor to prevent direct instantiation
    private function __construct($servername, $dbname, $username, $password){
        // Create a new PDO instance for database connection
        $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Static method to get the single instance of the databaseModel class
    public static function getInstance($servername = 'localhost', $dbname = 'portfolio', $username = 'root', $password = 'NEWPASS'){
        // Check if the instance is not already created
        if (self::$instance === null){
            // Create a new instance of the databaseModel
            self::$instance = new databaseModel($servername, $dbname, $username, $password);
        }
        // Return the single instance of the class
        return self::$instance;
    }

    // Method to get the current database connection
    public function getConnection(){
        return $this->conn; // Return the PDO connection instance
    }
}
?>
