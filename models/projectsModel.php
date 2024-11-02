<?php
require_once "./models/databaseModel.php";

class projectsModel{
    private $conn;

    public function __construct(){
        $this->conn = databaseModel::getInstance()->getConnection();
    }

    public function createProject($title, $description, $imageFileName = null, $github_link = null){
        $sql = "INSERT INTO projects (title, description, image_path, github_link) VALUES (:title, :description, :image_path, :github_link)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image_path', $imageFileName);
        $stmt->bindParam(':github_link', $github_link);
        $stmt->execute();
    }

    public function updateProject($projectid, $title, $description, $imageFileName = null, $github_link = null){
        if ($imageFileName) {
            $sql = "UPDATE projects SET title = :title, description = :description, github_link = :github_link, image_path = :image_path WHERE projectid = :projectid";
        } else {
            $sql = "UPDATE projects SET title = :title, description = :description, github_link = :github_link WHERE projectid = :projectid";
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':projectid', $projectid, PDO::PARAM_INT);
        $stmt->bindParam(':github_link', $github_link);

        if ($imageFileName) {
            $stmt->bindParam(':image_path', $imageFileName);
        }

        $stmt->execute();
    }

    public function getAllProjects() {
        $sql = "SELECT * FROM projects";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteProject($projectid) {
        $sql = "DELETE FROM projects WHERE projectid = :projectid";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':projectid', $projectid, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>
