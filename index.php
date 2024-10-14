<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

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
    case "/about";
        require "controllers/aboutController.php";
        $controller = new aboutController();
        $controller->show();
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
    case "/messages":
        require "controllers/messageController.php";
        $controller = new messageController();
        $controller->showMessages();
        break;
    case "/messages/delete":
        require "controllers/messageController.php";
        $controller = new messageController();
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['messageid'])) {
            $controller->deleteMessage($_POST['messageid']);
        } else {
            echo "Invalid request";
        }
        break;
    default:
        echo "404";
        break;
}
