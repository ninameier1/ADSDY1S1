<?php
require_once "./models/adminModel.php";
class adminController{
    protected $adminModel;
    public function __construct(){
        $this->adminModel = new adminModel();
    }
    public function showLogin(){
        $title = "Admin Panel Login";
        require "./views/adminlogin.view.php";
    }
    public function showHome(){
        $title = "Admin Panel";
        $this->checkLogin();
        require "./views/adminhome.view.php";
    }
    public function login(){
        $title = "Admin Panel Login";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->adminModel->authenticate($username, $password);

            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                header('Location: /admin/home');
                exit;
            } else {
                $error = "Invalid credentials";
                require_once "/views/adminlogin.view.php";
            }
        } else {
            require_once "/views/adminlogin.view.php";
        }
    }
    public function logout(){
        session_start();
        session_destroy();
        header('Location: /admin');
    }
    public function checkLogin() {
        session_start();

        if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
            header('Location: /admin');
            exit;
        }
    }
}
