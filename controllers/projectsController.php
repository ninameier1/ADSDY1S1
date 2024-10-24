<?php
require "./models/projectsModel.php";
require "./controllers/adminController.php";
class projectsController{
    protected $projectsModel;
    public function __construct(){
        $this->projectsModel = new projectsModel('localhost', 'portfolio', 'root', 'NEWPASS');
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

            $this->projectsModel->createProject($title, $description);
            header("Location: /admin/projects");
        }
    }
    public function update(){
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['projectid'])) {
            $projectid = $_POST['projectid'];
            $title = $_POST['title'];
            $description = $_POST['description'];

            $this->projectsModel->updateProject($projectid, $title, $description);
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