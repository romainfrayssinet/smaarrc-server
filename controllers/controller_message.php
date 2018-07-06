<?php

require_once 'models/message.php';
require_once 'config/view.php';

class ControllerMessage {

    public function getMessages() {
        $last_message_id = $_POST['last_message_id'];
        $messageClass = new Message();
        if ($last_message_id != null) {
            $messages = $messageClass->getMessages($last_message_id)->fetchAll();
            echo json_encode($messages);
        } else {
            var_dump($last_message_id);
        }
    }

    public function sendMessage() {
        $messageClass = new Message();

        $sender = $_POST['sender'];
        $receiver = $_POST['receiver'];
        $content = $_POST['content'];

        $messageClass->saveMessage($sender, $receiver, $content);
    }

    public function deleteMessages() {
        $messageClass = new Message();
        $messageClass->deleteMessages();
    }

}


?>
