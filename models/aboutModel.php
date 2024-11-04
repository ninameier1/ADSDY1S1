<?php
// Include the database model for establishing a database connection
require_once "./models/databaseModel.php";

// Define the AboutModel class responsible for handling 'about' related data
class aboutModel{
    private $conn; // Property to hold the database connection instance

    // Constructor method to initialize the database connection
    public function __construct(){
        // Get the database connection instance from the databaseModel
        $this->conn = databaseModel::getInstance()->getConnection();
    }

    // Method to retrieve all 'about' records from the database
    public function getAbout(){
        // SQL query to select all records from the 'about' table
        $sql = "SELECT * FROM about";
        // Prepare the SQL statement for execution
        $stmt = $this->conn->prepare($sql);
        // Execute the prepared statement
        $stmt->execute();
        // Fetch all results as an associative array and return them
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to retrieve 'about' records specifically in English
    public function getAboutEN(){
        // SQL query to select records where the language is English
        $sql = "SELECT * FROM about 
                WHERE language = 'english'";
        // Prepare and execute the statement
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        // Return the fetched results as an associative array
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to retrieve 'about' records specifically in Dutch
    public function getAboutNL(){
        // SQL query to select records where the language is Dutch
        $sql = "SELECT * FROM about 
                WHERE language = 'dutch'";
        // Prepare and execute the statement
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        // Return the fetched results as an associative array
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to update an existing 'about' record
    public function updateAbout($aboutid, $language, $bio){
        // SQL query to update the 'language' and 'bio' fields for a specific language
        $sql = "UPDATE about 
                SET language = :language, bio = :bio 
                WHERE aboutid = :aboutid";
        // Prepare the SQL statement for execution
        $stmt = $this->conn->prepare($sql);
        // Bind parameters to the prepared statement
        $stmt->bindParam(':language', $language);
        $stmt->bindParam(':bio', $bio);
        $stmt->bindParam(':aboutid', $aboutid, PDO::PARAM_INT);
        // Execute the prepared statement to perform the update
        $stmt->execute();
    }
}
?>
