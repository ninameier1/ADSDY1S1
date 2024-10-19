<?php
require "./models/aboutModel.php";
class aboutController{
    protected $aboutModel;
    public function __construct(){
        $this->aboutModel = new aboutModel('localhost', 'portfolio', 'root', 'NEWPASS');
    }
    public function show(){
        $title = "About";
        require "./views/about.view.php";
    }
    public function showAbout(){
        $title = "Admin About";
        $about = $this->aboutModel->getAbout();
        require "./views/adminabout.view.php";
    }
    public function showAboutEN(){
        $title = "Admin About";
        $about = $this->aboutModel->getAboutEN();
        require "./views/adminabout.view.php";
    }
    public function showAboutNL(){
        $title = "Admin About";
        $about = $this->aboutModel->getAboutNL();
        require "./views/adminabout.view.php";
    }
    public function update(){
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['aboutid'])) {
            $aboutid = $_POST['aboutid'];
            $language = $_POST['language'];
            $bio = $_POST['bio'];

            $this->aboutModel->updateAbout($aboutid, $language, $bio);
            header("Location: /adminabout");
            exit();
        } else {
            echo "Invalid request";
        }
    }
}
