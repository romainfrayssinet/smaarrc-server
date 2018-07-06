<?php

require_once 'config/model.php';

class Media extends modele {

    public function getFlag() {
        $sql = 'SELECT r_flag_pictures, r_picture FROM refresh';
        $flag = $this->executeRequest($sql);
        return $flag;
    }

    public function setFlag($boolean, $picture) {
        $sql = 'UPDATE refresh SET r_flag_pictures = :bool, r_picture = :picture';
        $this->executeRequest($sql, array(
            'bool' => $boolean,
            'picture' => $picture
        ));
    }

}

?>
