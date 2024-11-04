<?php

// Retrieve the current URL from the server's request URI
$url = $_SERVER["REQUEST_URI"];

// Use a switch statement to route based on the URL
switch ($url){

    // Home page route
    case "/":
        require "controllers/homeController.php";
        $controller = new homeController();
        $controller->show(); // Show the home page
        break;

    // Projects page route
    case "/projects":
        require "controllers/projectsController.php";
        $controller = new projectsController();
        $controller->show(); // Show the projects page
        break;

    // English About page route
    case "/about":
        require "controllers/aboutController.php";
        $controller = new aboutController();
        $controller->showAboutEN(); // Show the About page in English
        break;

    // Dutch About page route
    case "/about/nl":
        require "controllers/aboutController.php";
        $controller = new aboutController();
        $controller->showAboutNL(); // Show the About page in Dutch
        break;

    // Download CV route
    case "/about/downloadCV":
        require "controllers/aboutController.php";
        $controller = new aboutController();
        $controller->downloadCV(); // Trigger CV download
        break;

    // Contact page route
    case "/contact":
        require "controllers/contactController.php";
        $controller = new contactController();
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $controller->store(); // Store a new contact message if POST request
        } else {
            $controller->show(); // Show the contact form if GET request
        }
        break;

    // Admin login route
    case "/admin":
        require "controllers/adminController.php";
        $controller = new adminController();
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $controller->login(); // Process login if POST request
        } else {
            $controller->showLogin(); // Show the login form if GET request
        }
        break;

    // Admin home route (requires login check)
    case "/admin/home":
        require "controllers/adminController.php";
        $controller = new adminController();
        $controller->showHome(); // Show admin home page
        break;

    // Admin logout route
    case "/admin/logout":
        require "controllers/adminController.php";
        $controller = new adminController();
        $controller->logout(); // Log out the admin user
        break;

    // Admin projects route (requires login check)
    case "/admin/projects":
        require "controllers/projectsController.php";
        $auth = new adminController();
        $auth->checkLogin(); // Verify admin authentication
        $controller = new projectsController();
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $controller->store(); // Store a new project if POST request
        } else {
            $controller->showProjects(); // Show all projects if GET request
        }
        break;

    // Admin project update route
    case "/admin/projects/update":
        require "controllers/projectsController.php";
        $controller = new projectsController();
        $controller->update(); // Update an existing project
        break;

    // Admin store new project route (requires login check)
    case "/admin/store":
        require "controllers/projectsController.php";
        $auth = new adminController();
        $auth->checkLogin(); // Verify admin authentication
        $controller = new projectsController();
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $controller->store(); // Store a new project
        }
        break;

    // Admin delete project route
    case "/admin/projects/delete":
        require "controllers/projectsController.php";
        $controller = new projectsController();
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['projectid'])){
            $controller->deleteProjects($_POST['projectid']); // Delete project if ID is provided
        } else {
            echo "Invalid request"; // Handle invalid request
        }
        break;

    // Admin about page route (requires login check)
    case "/admin/about":
        require "controllers/aboutController.php";
        $auth = new adminController();
        $auth->checkLogin(); // Verify admin authentication
        $controller = new aboutController();
        $controller->showAbout(); // Show the admin about page
        break;

    // Admin update about section route
    case "/admin/about/update":
        require "controllers/aboutController.php";
        $controller = new aboutController();
        $controller->update(); // Update the about section content
        break;

    // Admin upload CV route
    case "/admin/about/uploadCV":
        require "controllers/aboutController.php";
        $controller = new aboutController();
        $controller->uploadCV(); // Upload a new CV file
        break;

    // Admin messages page route (requires login check)
    case "/admin/messages":
        require "controllers/contactController.php";
        $auth = new adminController();
        $auth->checkLogin(); // Verify admin authentication
        $controller = new contactController();
        $controller->showMessages(); // Show all contact messages for the admin
        break;

    // Admin delete message route
    case "/admin/messages/delete":
        require "controllers/contactController.php";
        $controller = new contactController();
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['messageid'])){
            $controller->deleteMessages($_POST['messageid']); // Delete message if ID is provided
        } else {
            echo "Invalid request"; // Handle invalid request
        }
        break;

    // Default case for undefined routes
    default:
        echo "404"; // Display a 404 error for unknown routes
        break;
}
?>
