<?php

class ProduitController extends BaseController {

    public function list(BaseManager $manager) {
        $tableau = $this->faireLaListeDesObjet($manager);
        include DIR_VIEWS . 'produit/catalog.html.php';
    }

    public function get(BaseManager $manager) {
        $objet = $this->recupererUnObjet($manager);
        include DIR_VIEWS . 'produit/details.html.php';
    }

    public function add(BaseManager $manager, BaseValidator $validator) {
        $messageErreur = $this->ajouterUnObjet($manager, $validator);
        include DIR_VIEWS . 'produit/add.html.php';
    }

}

?>