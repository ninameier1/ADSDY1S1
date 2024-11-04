<?php
// Include the projects model for handling project-related data
require_once "./models/projectsModel.php";
// Include the admin controller for admin user authentication
require_once "./controllers/adminController.php";

// Define the ProjectsController class responsible for handling project page logic
class projectsController{
    protected $projectsModel; // Property to hold an instance of the projectsModel
    private $uploadDir = __DIR__ . '/../views/uploads'; // Directory for storing uploaded images

    // Constructor method to initialize the projectsModel
    public function __construct(){
        // Create a new instance of projectsModel for managing project data
        $this->projectsModel = new projectsModel();
    }

    // Method to display the projects page for general users
    public function show(){
        $title = "Projects"; // Set the page title
        // Retrieve all projects from the projectsModel
        $projects = $this->projectsModel->getAllProjects();
        // Load the projects view page
        require "./views/projects.view.php";
    }

    // Method to display all projects for the admin view
    public function showProjects(){
        $title = "Admin Projects"; // Set the page title for the admin projects page
        // Retrieve all projects from the projectsModel
        $projects = $this->projectsModel->getAllProjects();
        // Load the admin projects view page
        require "./views/adminprojects.view.php";
    }

    // Method to store a new project
    public function store(){
        // Check if the request method is POST (indicating a form submission)
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            // Retrieve form data from POST
            $title = $_POST['title'];
            $description = $_POST['description'];
            $github_link = $_POST['github_link'];
            $imageFileName = null;
            // Check if an image file was uploaded without errors
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0){
                $imageFileName = basename($_FILES['image']['name']);
                $targetFilePath = $this->uploadDir . '/' . $imageFileName;
                // Move the uploaded file to the target directory
                if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)){
                    echo "Error: Could not upload image.";
                    return;
                }
            }
            // Use the projectsModel to create and store a new project
            $this->projectsModel->createProject($title, $description, $imageFileName, $github_link);
            // Redirect to the admin projects page after storing the project
            header("Location: /admin/projects");
        }
    }

    // Method to update an existing project by its ID
    public function update(){
        // Check if the request method is POST and the project ID is set
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['projectid'])) {
            // Retrieve form data from POST
            $projectid = $_POST['projectid'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $github_link = $_POST['github_link'];
            $imageFileName = null;
            // Check if an image file was uploaded without errors
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $imageFileName = basename($_FILES['image']['name']);
                $targetFilePath = $this->uploadDir . '/' . $imageFileName;
                // Move the uploaded file to the target directory
                if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                    echo "Error: Could not upload image."; // Display an error if file upload fails
                    return;
                }
            }
            // Use the projectsModel to update the project with the specified ID
            $this->projectsModel->updateProject($projectid, $title, $description, $imageFileName, $github_link);
            // Redirect to the admin projects page after updating the project
            header("Location: /admin/projects");
            exit(); // Exit to ensure no further code is executed after the redirect
        } else {
            echo "Invalid request"; // Display an error if the request is invalid
        }
    }

    // Method to delete a specific project by its ID
    public function deleteProjects($projectid){
        // Use the projectsModel to delete the project with the specified ID
        $this->projectsModel->deleteProject($projectid);
        // Redirect to the admin projects page after deletion
        header("Location: /admin/projects");
        exit(); // Exit to ensure no further code is executed after the redirect
    }
}
?>
