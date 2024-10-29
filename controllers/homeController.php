<?php
class homeController{
    public function show(){
        $title = "Home";
        require "./views/home.view.php";
    }
}
