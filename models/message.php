<?php

require_once 'config/model.php';

class Message extends modele {

    public function getMessages($id) {
        $sql = 'SELECT * FROM message WHERE m_id >= :id';
        $messages = $this->executeRequest($sql, array(
          'id' => $id
        ));
        return $messages;
    }

    public function saveMessage($sender, $receiver, $content) {
        $sql = 'INSERT INTO message (m_sender, m_receiver, m_content) VALUES (:sender, :receiver, :content)';
        $this->executeRequest($sql, array(
            'sender' => $sender,
            'receiver' => $receiver,
            'content' => $content
        ));
    }

    public function deleteMessages() {
        $sql = 'TRUNCATE TABLE message';
        $this->executeRequest($sql);
    }
}

?>
