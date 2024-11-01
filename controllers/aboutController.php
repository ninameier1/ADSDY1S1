<?php
require_once "./models/aboutModel.php";
require_once "./controllers/adminController.php";
class aboutController {

    protected $aboutModel;
    public function __construct(){
        $this->aboutModel = new aboutModel();
    }
    public function showAboutEN(){
        $title = "About";
        $about = $this->aboutModel->getAboutEN();
        require "./views/about.view.php";
    }
    public function showAboutNL(){
        $title = "About";
        $about = $this->aboutModel->getAboutNL();
        require "./views/about.view.php";
    }
    public function showAbout(){
        $title = "Admin About";
        $about = $this->aboutModel->getAbout();
        require "./views/adminabout.view.php";
    }
    public function update(){
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['aboutid'])) {
            $aboutid = $_POST['aboutid'];
            $language = $_POST['language'];
            $bio = $_POST['bio'];

            $this->aboutModel->updateAbout($aboutid, $language, $bio);
            header("Location: /admin/about");
            exit();
        } else {
            echo "Invalid request";
        }
    }
}
