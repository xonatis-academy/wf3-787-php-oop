<?php

class Animal {

    public $age;
    public $groupeSanguin;
    public $taille;
    public $poids;
    private $sang;

    public function mange() {
        echo 'Animal mange';
    }

    protected function dort() {
        echo 'Animal dort';
    }

}

class Chien extends Animal {

    public function aboie() {
        echo 'Chien wafwaf';
    }

    public function mange() {
        echo 'Chien kiffe les os';
    }

}

class Chat extends Animal {

    private $coussinets;

    public function miauler() {
        echo 'Miaaauuuuuwww';
    }

    public function mange() {
        echo 'Je ne mange que de la qualité';
    }

    public function nettoie() {
        $this->coussinets = 4;
    }

}

class Veto {

    public function soigne(Animal $tata) {
        echo 'Je soigne un animal avec un groupe sanguin ' . $tata->groupeSanguin;
    }

}

?>

