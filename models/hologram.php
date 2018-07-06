<?php

require_once 'config/model.php';

class Hologram extends modele {

    public function getHolograms() {
        $sql = 'SELECT * FROM hologram';
        $holograms = $this->executeRequest($sql);
        return $holograms;
    }

    public function saveHologram($type, $name, $px, $py, $pz, $rx, $ry, $rz, $rw, $sx, $sy, $sz) {
        $sql = 'INSERT INTO hologram (h_type, h_name, h_px, h_py, h_pz, h_rx, h_ry, h_rz, h_rw, h_sx, h_sy, h_sz) VALUES (:type, :name, :px, :py, :pz, :rx, :ry, :rz, :rw, :sx, :sy, :sz)';
        $this->executeRequest($sql, array(
            'type' => $type,
            'name' => $name,
            'px' => $px,
            'py' => $py,
            'pz' => $pz,
            'rx' => $rx,
            'ry' => $ry,
            'rz' => $rz,
            'rw' => $rw,
            'sx' => $sx,
            'sy' => $sy,
            'sz' => $sz
        ));
    }

    public function deleteHolograms() {
        $sql = 'TRUNCATE TABLE hologram';
        $this->executeRequest($sql);
    }

    public function getFlag() {
        $sql = 'SELECT r_flag_holograms FROM refresh';
        $flag = $this->executeRequest($sql);
        return $flag;
    }

    public function setFlag($boolean) {
        $sql = 'UPDATE refresh SET r_flag_holograms = :bool';
        $this->executeRequest($sql, array(
            'bool' => $boolean
        ));
    }

}

?>
