<?php

class contactModel{
    private $conn;

    public function __construct($servername, $dbname, $username, $password){
        $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    }
    public function createMessage($name, $email, $message)
    {
        $sql = "INSERT INTO messages (name, email, message) VALUES (:name, :email, :message)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        $stmt->execute();
    }
    public function getAllMessages()
    {
        $sql = "SELECT * FROM messages";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>