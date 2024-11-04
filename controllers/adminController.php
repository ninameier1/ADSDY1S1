<?php
// Include the adminModel for database interactions related to admin authentication
require_once "./models/adminModel.php";

class adminController{
    protected $adminModel; // Property to store the model instance

    // Constructor initializes the admin model for use in methods
    public function __construct(){
        // Create a new instance of contactModel for managing contact data
        $this->adminModel = new adminModel();
    }

    // Show the login page for the admin panel
    public function showLogin(){
        $title = "Admin Panel Login"; // Set the page title
        require "./views/adminlogin.view.php"; // Render the login view
    }

    // Show the admin home page, but only if the user is authenticated
    public function showHome(){
        $title = "Admin Panel"; // Set the page title
        $this->checkLogin(); // Ensure the user is logged in
        require "./views/adminhome.view.php"; // Render the admin home view
    }

    // Handle the login process by verifying credentials
    public function login(){
        $title = "Admin Panel Login"; // Set the page title
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Retrieve and sanitize username and password from POST data
            $username = $_POST['username'];
            $password = $_POST['password'];
            // Authenticate the user via the model
            $user = $this->adminModel->authenticate($username, $password);
            if ($user) {
                // Start a session and store user info if authentication succeeds
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                // Redirect to the admin home page
                header('Location: /admin/home');
                exit;
            } else {
                // If authentication fails, set an error message and reload the login view
                $error = "Invalid credentials";
                require_once "./views/adminlogin.view.php";
            }
        } else {
            // If not a POST request, just load the login view
            require_once "./views/adminlogin.view.php";
        }
    }

    // Log the admin user out by destroying the session
    public function logout(){
        session_start();
        session_destroy(); // Destroy all session data
        header('Location: /admin'); // Redirect to the login page
    }

    // Verify that the user is logged in as an admin
    public function checkLogin(){
        session_start();
        // Redirect to the login page if not authenticated or not logged in as 'admin'
        if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
            header('Location: /admin');
            exit;
        }
    }
}
?>
