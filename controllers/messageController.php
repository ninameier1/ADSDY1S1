<?php
require "./models/contactModel.php";

class messageController{
    private $contactModel;
    public function showMessages()
    {
        $title = "Messages";
        $messages = $this->contactModel->getAllMessages();
        require "./views/messages.view.php";
    }
    public function __construct(){
        $this->contactModel = new contactModel('localhost', 'portfolio', 'root', 'NEWPASS');
    }
    public function deleteMessage($messageid)
    {
        $this->contactModel->deleteMessage($messageid);
        header("Location: /messages");
        exit();
    }
}

