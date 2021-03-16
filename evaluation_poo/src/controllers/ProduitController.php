<?php

class ProduitController extends BaseController {

    public function list(BaseManager $manager) {
        // Je "fais la liste des objets" avec le $manager 
        // et je mets le reésultat dans $tableau
        $tableau = $this->faireLaListeDesObjet($manager);      
        include DIR_VIEWS . 'produit/catalog.html.php';
    }

    public function get(BaseManager $manager) {
        // Je "récupère un objet" avec le $manager 
        // et je mets le résultat dans $objet
        $objet = $this->recupererUnObjet($manager);
        include DIR_VIEWS . 'produit/details.html.php';
    }

    public function add(BaseManager $manager, BaseValidator $validator) {
        // J "ajoute un objet" avec le $manager et le $validator 
        // et je mets le résultat dans $messageErreur
        $messageErreur = $this->ajouterUnObjet($manager, $validator);
        include DIR_VIEWS . 'produit/add.html.php';
    }

}

?>