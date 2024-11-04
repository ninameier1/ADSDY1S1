<?php
// Include the database model for establishing a database connection
require_once "./models/databaseModel.php";

// Define the ProjectsModel class responsible for handling project-related data
class projectsModel{
    private $conn; // Property to hold the database connection instance

    // Constructor method to initialize the database connection
    public function __construct(){
        // Get the database connection instance from the databaseModel
        $this->conn = databaseModel::getInstance()->getConnection();
    }

    // Method to create a new project in the database
    public function createProject($title, $description, $imageFileName = null, $github_link = null){
        // Prepend "https://www." to the GitHub link if it doesn't already contain it
        if ($github_link && !preg_match('/^https?:\/\//', $github_link)){
            $github_link = 'https://www.' . $github_link;
        }
        // Prepare the SQL statement to insert a new project
        $sql = "INSERT INTO projects (title, description, image_path, github_link, created_at) 
                VALUES (:title, :description, :image_path, :github_link, CURRENT_TIMESTAMP)";
        $stmt = $this->conn->prepare($sql);
        // Bind parameters to the prepared statement
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image_path', $imageFileName);
        $stmt->bindParam(':github_link', $github_link);
        // Execute the prepared statement to insert the project
        $stmt->execute();
    }

    // Method to update an existing project in the database
    public function updateProject($projectid, $title, $description, $imageFileName = null, $github_link = null){
        // Determine the SQL query based on whether an image file name is provided
        if ($imageFileName){
            $sql = "UPDATE projects 
                    SET title = :title, description = :description, github_link = :github_link, image_path = :image_path 
                    WHERE projectid = :projectid";
        } else {
            $sql = "UPDATE projects 
                    SET title = :title, description = :description, github_link = :github_link 
                    WHERE projectid = :projectid";
        }
        // Prepare the SQL statement for execution
        $stmt = $this->conn->prepare($sql);
        // Bind parameters to the prepared statement
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':projectid', $projectid, PDO::PARAM_INT);
        $stmt->bindParam(':github_link', $github_link);
        // If an image file name is provided, bind it to the prepared statement
        if ($imageFileName){
            $stmt->bindParam(':image_path', $imageFileName);
        }
        // Execute the prepared statement to perform the update
        $stmt->execute();
    }

    // Method to retrieve all projects from the database
    public function getAllProjects(){
        // SQL query to select all records from the 'projects' table ordered by creation date
        $sql = "SELECT * FROM projects 
                ORDER BY created_at DESC";
        // Prepare and execute the statement
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        // Fetch all results as an associative array and return them
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to delete a specific project from the database
    public function deleteProject($projectid){
        // SQL query to delete a project based on its project ID
        $sql = "DELETE FROM projects 
                WHERE projectid = :projectid";
        // Prepare the SQL statement for execution
        $stmt = $this->conn->prepare($sql);
        // Bind the project ID parameter to the prepared statement
        $stmt->bindParam(':projectid', $projectid, PDO::PARAM_INT);
        // Execute the prepared statement to perform the deletion
        $stmt->execute();
    }
}
?>
