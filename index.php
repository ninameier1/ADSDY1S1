<?php

$url = $_SERVER["REQUEST_URI"];

switch ($url){
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
        $controller->showAboutEN();
        break;

    case "/about/nl";
        require "controllers/aboutController.php";
        $controller = new aboutController();
        $controller->showAboutNL();
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

    case "/admin";
        require "controllers/adminController.php";
        $controller = new adminController();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $controller->login();
        } else {
            $controller->showLogin();
        }
        break;

    case "/admin/home";
        require "controllers/adminController.php";
        $controller = new adminController();
        $controller->showHome();
        break;

    case "/admin/logout":
        require "controllers/adminController.php";
        $controller = new adminController();
        $controller->logout();
        break;

    case "/admin/projects";
        require "controllers/projectsController.php";
        $controller = new projectsController();
        $auth = new adminController();
        $auth->checkLogin();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $controller->store();
        } else {
            $controller->showProjects();
        }
        break;

    case "/admin/projects/update";
        require "controllers/projectsController.php";
        $controller = new projectsController();
        $controller->update();
        break;

    case "/admin/projects/delete";
        require "controllers/projectsController.php";
        $controller = new projectsController();
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['projectid'])) {
            $controller->deleteProjects($_POST['projectid']);
        } else {
            echo "Invalid request";
        }
        break;

    case "/admin/about";
        require "controllers/aboutController.php";
        $controller = new aboutController();
        $controller->showAbout();
        $auth = new adminController();
        $auth->checkLogin();
        break;

    case "/admin/about/update";
        require "controllers/aboutController.php";
        $controller = new aboutController();
        $controller->update();
        break;

    case "/admin/messages";
        require "controllers/contactController.php";
        $controller = new contactController();
        $controller->showMessages();
        $auth = new adminController();
        $auth->checkLogin();
        break;

    case "/admin/messages/delete";
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
