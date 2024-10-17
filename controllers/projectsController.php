<?php
require "./models/projectsModel.php";
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
        $title = "AdminProjects";
        $projects = $this->projectsModel->getAllProjects();
        require "./views/adminprojects.view.php";
    }
    public function store(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $title = $_POST['title'];
            $description = $_POST['description'];

            $this->projectsModel->createProject($title, $description);
            header("Location: /adminprojects");
        }
    }
    public function deleteProjects($projectid){
        $this->projectsModel->deleteProject($projectid);
        header("Location: /adminprojects");
        exit();
    }
}