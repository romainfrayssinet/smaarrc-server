<?php

require_once 'config/model.php';

class User extends modele {

    public function getAdminByUsername($username) {
        $sql = 'SELECT * FROM admin WHERE a_username = :username';

        $admin = $this->executeRequest($sql, array(
          'username' => $username
        ));

        return $admin;
    }

    public function getUserByUsername($username) {
        $sql = 'SELECT * FROM user WHERE u_username = :username';

        $user = $this->executeRequest($sql, array(
          'username' => $username
        ));

        return $user;
    }

}

?>
