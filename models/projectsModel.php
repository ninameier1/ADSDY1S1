<?php
class projectsModel{
    private $conn;
    public function __construct($servername, $dbname, $username, $password){
        $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    }
    public function createProject($title, $description){
        $sql = "INSERT INTO projects (title, description) VALUES (:title, :description)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
    }
    public function getAllProjects(){
        $sql = "SELECT * FROM projects";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deleteProject($projectid){
        $sql = "DELETE FROM projects WHERE projectid = :projectid";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':projectid', $projectid, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>
