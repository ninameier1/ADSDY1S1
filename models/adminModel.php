<?php
class adminModel{
    private $conn;
    public function __construct($servername, $dbname, $username, $password){
        $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    }
    public function authenticate($username, $password){
        $query = $this->conn->prepare("SELECT * FROM users WHERE username = :username");
        $query->execute(['username' => $username]);

        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user && $password === $user['password']) {
            return $user;
        }
        return false;
    }
}