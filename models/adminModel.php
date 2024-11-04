<?php
require_once "./models/databaseModel.php";
class adminModel{
    private $conn;
    public function __construct(){
        $this->conn = databaseModel::getInstance()->getConnection();
    }
    public function authenticate($username, $password){
        $query = $this->conn->prepare("SELECT * 
                                            FROM users 
                                            WHERE username = :username");
        $query->execute(['username' => $username]);

        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user && $password === $user['password']) {
            return $user;
        }
        return false;
    }
}