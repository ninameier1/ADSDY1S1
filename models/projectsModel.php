<?php
require_once "./models/databaseModel.php";

class projectsModel{
    private $conn;
    public function __construct(){
        $this->conn = databaseModel::getInstance()->getConnection();
    }

    public function createProject($title, $description, $imageFileName = null, $github_link = null){
        // Prepend "https://www." to the GitHub link
        if ($github_link && !preg_match('/^https?:\/\//', $github_link)){
            $github_link = 'https://www.' . $github_link;
        }

        // Prepare the SQL statement
        $sql = "INSERT INTO projects (title, description, image_path, github_link, created_at) 
                VALUES (:title, :description, :image_path, :github_link, CURRENT_TIMESTAMP)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image_path', $imageFileName);
        $stmt->bindParam(':github_link', $github_link);

        // Execute the statement
        $stmt->execute();
    }

    public function updateProject($projectid, $title, $description, $imageFileName = null, $github_link = null){
        if ($imageFileName){
            $sql = "UPDATE projects 
                    SET title = :title, description = :description, github_link = :github_link, image_path = :image_path 
                    WHERE projectid = :projectid";
        } else {
            $sql = "UPDATE projects 
                    SET title = :title, description = :description, github_link = :github_link 
                    WHERE projectid = :projectid";
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':projectid', $projectid, PDO::PARAM_INT);
        $stmt->bindParam(':github_link', $github_link);

        if ($imageFileName){
            $stmt->bindParam(':image_path', $imageFileName);
        }

        $stmt->execute();
    }

    public function getAllProjects() {
        $sql = "SELECT * FROM projects 
                ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteProject($projectid) {
        $sql = "DELETE FROM projects 
                WHERE projectid = :projectid";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':projectid', $projectid, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>
