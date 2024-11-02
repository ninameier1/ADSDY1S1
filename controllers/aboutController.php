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
    public function downloadCV() {
        $filePath = "./views/uploads/cv.pdf";

        if (file_exists($filePath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filePath));
            flush();
            readfile($filePath);
            exit();
        } else {
            echo "File not found.";
        }
    }

    public function uploadCV(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (isset($_FILES["cv"]) && $_FILES["cv"]["error"] == 0){
                $fileTmpPath = $_FILES["cv"]["tmp_name"];
                $fileName = $_FILES["cv"]["name"];
                $fileSize = $_FILES["cv"]["size"];
                $fileType = $_FILES["cv"]["type"];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));

                $allowedfileExtensions = ['pdf'];
                if (in_array($fileExtension, $allowedfileExtensions)){
                    $dest_path = "./views/uploads/cv.pdf";

                    if (move_uploaded_file($fileTmpPath, $dest_path)){
                        echo "CV uploaded successfully.";
                        header("Location: /admin/about");
                    } else {
                        echo "There was an error moving the uploaded file.";
                    }
                } else {
                    echo "Upload failed. Allowed file types: " . implode(", ", $allowedfileExtensions);
                }
            } else {
                echo "No file uploaded or there was an upload error.";
            }
        } else {
            echo "Invalid request method.";
        }
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
