<?php
require_once "./models/contactModel.php";
require_once "./controllers/adminController.php";
class contactController{
    protected $contactModel;
    public function __construct(){
        $this->contactModel = new contactModel();
    }
    public function show(){
        $title = "Contact";
        require "./views/contact.view.php";
    }
    public function showMessages(){
        $title = "AdminMessages";
        $messages = $this->contactModel->getAllMessages();
        require "./views/adminmessages.view.php";
    }
    public function store(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $content = $_POST['content'];

            $this->contactModel->createMessage($name, $email, $content);
            header("Location: /contact");
        }
    }
    public function deleteMessages($messageid){
        $this->contactModel->deleteMessage($messageid);
        header("Location: /admin/messages");
        exit();
    }
}
?>

