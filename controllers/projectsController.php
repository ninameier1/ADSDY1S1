<?php
require_once "./models/projectsModel.php";
require_once "./controllers/adminController.php";

class projectsController{
    protected $projectsModel;
    private $uploadDir = __DIR__ . '/../views/uploads';

    public function __construct(){
        $this->projectsModel = new projectsModel();
    }

    public function show(){
        $title = "Projects";
        $projects = $this->projectsModel->getAllProjects();
        require "./views/projects.view.php";
    }

    public function showProjects(){
        $title = "Admin Projects";
        $projects = $this->projectsModel->getAllProjects();
        require "./views/adminprojects.view.php";
    }

    public function store(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $title = $_POST['title'];
            $description = $_POST['description'];
            $github_link = $_POST['github_link'];
            $imageFileName = null;

            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0){
                $imageFileName = basename($_FILES['image']['name']);
                $targetFilePath = $this->uploadDir . '/' . $imageFileName;
                if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)){
                    echo "Error: Could not upload image.";
                    return;
                }
            }

            $this->projectsModel->createProject($title, $description, $imageFileName, $github_link);
            header("Location: /admin/projects");
        }
    }

    public function update(){
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['projectid'])){
            $projectid = $_POST['projectid'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $github_link = $_POST['github_link'];
            $imageFileName = null;

            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0){
                $imageFileName = basename($_FILES['image']['name']);
                $targetFilePath = $this->uploadDir . '/' . $imageFileName;
                if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)){
                    echo "Error: Could not upload image.";
                    return;
                }
            }

            $this->projectsModel->updateProject($projectid, $title, $description, $imageFileName, $github_link);
            header("Location: /admin/projects");
            exit();
        } else {
            echo "Invalid request";
        }
    }


    public function deleteProjects($projectid){
        $this->projectsModel->deleteProject($projectid);
        header("Location: /admin/projects");
        exit();
    }
}

