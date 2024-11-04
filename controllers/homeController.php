<?php
// Define the HomeController class responsible for handling the homepage logic
class homeController {
    // Method to display the homepage
    public function show() {
        $title = "Home"; // Set the page title for the homepage
        // Load the homepage view
        require "./views/home.view.php";
    }
}
?>
