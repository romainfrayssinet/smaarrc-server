<?php
abstract class modele {
    private $bdd;
    protected function executeRequest($sql, $parametres = null) {
        if ($parametres == null){
            $resultat = $this->getBdd()->query($sql);
        }
        else {
            $resultat = $this->getBdd()->prepare($sql);
            $resultat->execute($parametres);
        }
        return $resultat;
    }
    private function getBdd() {
        if ($this->bdd == null) {
            $this->bdd = new PDO("mysql:host=127.0.0.1; dbname=marshall; charset=utf8", 'root', 'Bitfenixghost1', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->bdd;
    }
}
?>
