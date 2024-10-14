<?php
require "./models/contactModel.php";

class contactController{
    public function show()
    {
        $title = "Contact";
        require "./views/contact.view.php";
    }
    private $contactModel;
    public function __construct(){
        $this->contactModel = new contactModel('localhost', 'portfolio', 'root', 'NEWPASS');
    }
    public function store(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            $this->contactModel->createMessage($name, $email, $message);
            header("Location: /contact");
        }
    }
}
?>

