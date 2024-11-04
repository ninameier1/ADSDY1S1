<?php
// Include the database model for database connection
require_once "./models/databaseModel.php";

// Define the AdminModel class responsible for handling 'admin' related data
class adminModel{
    private $conn; // Property to hold the database connection

    // Constructor method to initialize the database connection
    public function __construct(){
        // Get the database connection instance from the databaseModel
        $this->conn = databaseModel::getInstance()->getConnection(); // Get the database connection
    }

    // Method to authenticate a user by username and password
    public function authenticate($username, $password){
        // Prepare SQL query to select user based on the provided username
        $query = $this->conn->prepare("SELECT * 
                                            FROM users 
                                            WHERE username = :username");
        // Execute the query with the username parameter
        $query->execute(['username' => $username]);
        // Fetch the user record as an associative array
        $user = $query->fetch(PDO::FETCH_ASSOC);
        // Check if the user exists and the provided password matches
        if ($user && $password === $user['password']){
            return $user; // Return the user record if authenticated
        }
        return false; // Return false if authentication fails
    }
}
?>
