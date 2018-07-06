<?php

require_once 'models/hologram.php';
require_once 'config/view.php';

class ControllerHologram {

    public function getHolograms() {
        $hologramClass = new Hologram();
        $holograms = $hologramClass->getHolograms()->fetchAll();
        echo json_encode($holograms);
    }

    public function deleteHolograms() {
        $hologramClass = new Hologram();
        $hologramClass->deleteHolograms();
    }

    public function updateHolograms() {
        $holograms = json_decode($_POST['holograms']);
        $hologramClass = new Hologram();

        $hologramClass->deleteHolograms();

        foreach ($holograms as $hologram) {
            $hologramClass->saveHologram($hologram->tag, $hologram->name, $hologram->position->x, $hologram->position->y, $hologram->position->z, $hologram->rotation->x, $hologram->rotation->y, $hologram->rotation->z, $hologram->rotation->w, $hologram->scale->x, $hologram->scale->y, $hologram->scale->z);
        }
    }

    public function sendRefreshHolograms() {
        $flag = $_POST['flag'];
        $hologramClass = new Hologram();

        $hologramClass->setFlag($flag);
    }

    public function receiveRefreshHolograms() {
        $hologramClass = new Hologram();
        $flag = $hologramClass->getFlag()->fetch();
        echo $flag[0];
    }

}


?>
