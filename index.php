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
        require "controllers/contactController.php";
        $controller = new contactController();
        $controller->showMessages();
        break;
    default:
        echo "hello";
        break;
}
