<?php

/**
 * $this vaut la valeur de l'objet courant
 */

class Vendeur {

    public $nom;
    public $prenom;

    public function vend() {
        echo $this->prenom . ' vend quelque chose';
    }

}

$maxime_vendeur = new Vendeur();
$maxime_vendeur->nom = 'Dupont';
$maxime_vendeur->prenom = 'Maxime';
$maxime_vendeur->vend(); // Affiche : "Maxime vend quelque chose"

$nicolas_vendeur = new Vendeur();
$nicolas_vendeur->nom = 'Dupont';
$nicolas_vendeur->prenom = 'Nicolas';
$nicolas_vendeur->vend(); // Affiche : "Nicolas vend quelque chose"


?>