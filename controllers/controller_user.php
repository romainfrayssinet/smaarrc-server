<?php

require_once 'models/user.php';
require_once 'config/view.php';

class ControllerUser {

    public function loginUser() {
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $username = $_POST['login'];
            $password = $_POST['password'];

            $userClass = new User();
            $user = $userClass->getUserByUsername($username)->fetch();

            if (password_verify($password, $user['u_password'])) {
                echo "true";
            } else {
                echo "false";
            }
        } else {
            echo "false";
        }
    }

    // public function sendRequestCall() {
    //     $sender = $_POST['sender'];
    //     $userClass = new User();
    //
    //     $userClass->setRequestCall($sender);
    // }
    //
    // public function receiverequestcall() {
    //
    // }

}


?>
