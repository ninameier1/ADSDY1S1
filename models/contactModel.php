<?php
// Include the database model for establishing a database connection
require_once "./models/databaseModel.php";

// Define the ContactModel class responsible for handling 'contact' related data
class contactModel{
    private $conn; // Property to hold the database connection instance

    // Constructor method to initialize the database connection
    public function __construct(){
        // Get the database connection instance from the databaseModel
        $this->conn = databaseModel::getInstance()->getConnection();
    }

// Method to create a new message in the database
    public function createMessage($name, $email, $content){
        // SQL query to insert a new message into the 'messages' table
        $sql = "INSERT INTO messages (name, email, content) 
                VALUES (:name, :email, :content)";
        // Prepare the SQL statement for execution
        $stmt = $this->conn->prepare($sql);
        // Bind parameters to the prepared statement
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':content', $content);
        // Execute the prepared statement to insert the message
        $stmt->execute();
    }

    // Method to retrieve all messages from the database
    public function getAllMessages(){
        // SQL query to select all records from the 'messages' table
        $sql = "SELECT * FROM messages";
        // Prepare and execute the statement
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        // Fetch all results as an associative array and return them
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to delete a specific message from the database
    public function deleteMessage($messageid){
        // SQL query to delete a message based on its message ID
        $sql = "DELETE FROM messages 
                WHERE messageid = :messageid";
        // Prepare the SQL statement for execution
        $stmt = $this->conn->prepare($sql);
        // Bind the message ID parameter to the prepared statement
        $stmt->bindParam(':messageid', $messageid, PDO::PARAM_INT);
        // Execute the prepared statement to perform the deletion
        $stmt->execute();
    }
}
?>
