<?php
require_once "./models/databaseModel.php";
class contactModel{
    private $conn;
    public function __construct(){
        $this->conn = databaseModel::getInstance()->getConnection();
    }
    public function createMessage($name, $email, $content){
        $sql = "INSERT INTO messages (name, email, content) 
                VALUES (:name, :email, :content)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':content', $content);
        $stmt->execute();
    }
    public function getAllMessages(){
        $sql = "SELECT * FROM messages";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deleteMessage($messageid){
        $sql = "DELETE FROM messages 
                WHERE messageid = :messageid";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':messageid', $messageid, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>