<?php
// Include the about model for handling 'about' related data
require_once "./models/aboutModel.php";
// Include the admin controller for admin user authentication
require_once "./controllers/adminController.php";

// Define the AboutController class responsible for handling 'about' page logic
class aboutController{
    protected $aboutModel; // Property to hold an instance of the aboutModel

    // Constructor method to initialize the aboutModel
    public function __construct(){
        // Create a new instance of aboutModel for managing 'about' data
        $this->aboutModel = new aboutModel();
    }

    // Method to display the English 'about' section
    public function showAboutEN(){
        $title = "About"; // Set the page title
        // Retrieve English 'about' data from the aboutModel
        $about = $this->aboutModel->getAboutEN();
        // Load the 'about' view page
        require "./views/about.view.php";
    }

    // Method to display the Dutch 'about' section
    public function showAboutNL(){
        $title = "About"; // Set the page title
        // Retrieve Dutch 'about' data from the aboutModel
        $about = $this->aboutModel->getAboutNL();
        // Load the 'about' view page
        require "./views/about.view.php";
    }

    // Method to display the admin view for the 'about' section
    public function showAbout(){
        $title = "Admin About"; // Set the page title for the admin 'about' page
        // Retrieve all 'about' data for admin viewing
        $about = $this->aboutModel->getAbout();
        // Load the admin 'about' view page
        require "./views/adminabout.view.php";
    }

    // Method to download the CV file
    public function downloadCV(){
        $filePath = "./views/uploads/cv.pdf"; // Path to the CV file
        // Check if the file exists
        if (file_exists($filePath)){
            // Set headers to initiate file download
            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filePath));
            flush(); // Flush system output buffer
            readfile($filePath); // Read the file to the output buffer
            exit(); // End script execution after file download
        } else {
            // Display an error if the file does not exist
            echo "File not found.";
        }
    }

    // Method to upload a CV file
    public function uploadCV(){
        // Check if the request method is POST (indicating a form submission)
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check if a file was uploaded and there were no errors
            if (isset($_FILES["cv"]) && $_FILES["cv"]["error"] == 0) {
                // Retrieve file information
                $fileTmpPath = $_FILES["cv"]["tmp_name"];
                $fileName = $_FILES["cv"]["name"];
                $fileSize = $_FILES["cv"]["size"];
                $fileType = $_FILES["cv"]["type"];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));
                // Define allowed file extensions
                $allowedfileExtensions = ['pdf'];
                // Check if the uploaded file has an allowed extension
                if (in_array($fileExtension, $allowedfileExtensions)){
                    $dest_path = "./views/uploads/cv.pdf"; // Define the destination path for the CV
                    // Move the uploaded file to the specified destination path
                    if (move_uploaded_file($fileTmpPath, $dest_path)){
                        echo "CV uploaded successfully.";
                        // Redirect to the admin 'about' page after a successful upload
                        header("Location: /admin/about");
                    } else {
                        // Display an error if there was an issue moving the file
                        echo "There was an error moving the uploaded file.";
                    }
                } else {
                    // Display an error if the file type is not allowed
                    echo "Upload failed. Allowed file types: " . implode(", ", $allowedfileExtensions);
                }
            } else {
                // Display an error if no file was uploaded or there was an upload error
                echo "No file uploaded or there was an upload error.";
            }
        } else {
            // Display an error if the request method is not POST
            echo "Invalid request method.";
        }
    }

    // Method to update an 'about' record
    public function update(){
        // Check if the request method is POST and an 'aboutid' is provided
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['aboutid'])) {
            // Retrieve the form data
            $aboutid = $_POST['aboutid'];
            $language = $_POST['language'];
            $bio = $_POST['bio'];
            // Use the aboutModel to update the 'about' record
            $this->aboutModel->updateAbout($aboutid, $language, $bio);
            // Redirect to the admin 'about' page after a successful update
            header("Location: /admin/about");
            exit(); // End script execution after redirect
        } else {
            // Display an error if the request is invalid
            echo "Invalid request";
        }
    }
}
?>
