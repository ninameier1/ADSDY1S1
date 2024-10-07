<?php

$url = $_SERVER["REQUEST_URI"];

switch ($url) {
    case"/";
        require("./views/home.view.php");
        break;
    case "/projects";
        require("./views/projects.view.php");
        break;
    case "/about";
        require("./views/about.view.php");
        break;
    case "/contact";
        require("./views/contact.view.php");
        break;
    default:
        echo "hello";
}
