<?php
require_once "./models/databaseModel.php";
class aboutModel{
    private $conn;
    public function __construct(){
        $this->conn = databaseModel::getInstance()->getConnection();
    }
    public function getAbout(){
        $sql = "SELECT * FROM about";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAboutEN(){
        $sql = "SELECT * FROM about 
                WHERE language = 'english'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAboutNL(){
        $sql = "SELECT * FROM about 
                WHERE language = 'dutch'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updateAbout($aboutid, $language, $bio){
        $sql = "UPDATE about 
                SET language = :language, bio = :bio 
                WHERE aboutid = :aboutid";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':language', $language);
        $stmt->bindParam(':bio', $bio);
        $stmt->bindParam(':aboutid', $aboutid, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>

