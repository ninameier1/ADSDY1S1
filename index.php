<?php

$url = $_SERVER["REQUEST_URI"];

switch ($url) {
    case "/":
        require "controllers/homeController.php";
        $controller = new homeController();
        $controller->show();
        break;
    case "/projects";
        require "controllers/projectsController.php";
        $controller = new projectsController();
        $controller->show();
        break;
    case "/adminprojects":
        require "controllers/projectsController.php";
        $controller = new projectsController();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $controller->store();
        } else {
            $controller->showProjects();
        }
        break;
    case "/adminprojects/update":
        require "controllers/projectsController.php";
        $controller = new projectsController();
        $controller->update();
        break;
    case "/adminprojects/delete":
        require "controllers/projectsController.php";
        $controller = new projectsController();
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['projectid'])) {
            $controller->deleteProjects($_POST['projectid']);
        } else {
            echo "Invalid request";
        }
        break;
    case "/about";
        require "controllers/aboutController.php";
        $controller = new aboutController();
        $controller->show();
        break;
    case "/adminabout";
        require "controllers/aboutController.php";
        $controller = new aboutController();
        $controller->showAbout();
        break;
    case "/adminabout/update":
        require "controllers/aboutController.php";
        $controller = new aboutController();
        $controller->update();
        break;
    case "/contact";
        require "controllers/contactController.php";
        $controller = new contactcontroller();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $controller->store();
        } else {
            $controller->show();
        }
        break;
    case "/adminmessages":
        require "controllers/contactController.php";
        $controller = new contactController();
        $controller->showMessages();
        break;
    case "/adminmessages/delete":
        require "controllers/contactController.php";
        $controller = new contactController();
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['messageid'])) {
            $controller->deleteMessages($_POST['messageid']);
        } else {
            echo "Invalid request";
        }
        break;
    default:
        echo "404";
        break;
}
