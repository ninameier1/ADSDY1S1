<?php
// Include the contact model for handling contact-related data
require_once "./models/contactModel.php";
// Include the admin controller for admin user authentication
require_once "./controllers/adminController.php";

// Define the ContactController class responsible for handling contact page logic
class contactController{
    protected $contactModel; // Property to hold an instance of the contactModel

    // Constructor method to initialize the contactModel
    public function __construct(){
        // Create a new instance of contactModel for managing contact data
        $this->contactModel = new contactModel();
    }

    // Method to display the contact page
    public function show(){
        $title = "Contact"; // Set the page title
        // Load the contact view page
        require "./views/contact.view.php";
    }

    // Method to display all messages for the admin view
    public function showMessages(){
        $title = "AdminMessages"; // Set the page title for the admin messages page
        // Retrieve all messages from the contactModel
        $messages = $this->contactModel->getAllMessages();
        // Load the admin messages view page
        require "./views/adminmessages.view.php";
    }

    // Method to store a new contact message
    public function store(){
        // Check if the request method is POST (indicating a form submission)
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve the form data from POST
            $name = $_POST['name'];
            $email = $_POST['email'];
            $content = $_POST['content'];
            // Use the contactModel to create and store a new message
            $this->contactModel->createMessage($name, $email, $content);
            // Redirect the user back to the contact page
            header("Location: /contact");
        }
    }

    // Method to delete a specific message by its ID
    public function deleteMessages($messageid){
        // Use the contactModel to delete the message with the specified ID
        $this->contactModel->deleteMessage($messageid);
        // Redirect to the admin messages page after deletion
        header("Location: /admin/messages");
        exit(); // Exit to ensure no further code is executed after the redirect
    }
}
?>
