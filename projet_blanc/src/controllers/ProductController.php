<?php

class ProductController extends BaseController {

    public function add(BaseManager $productManager, BaseValidator $validator, BaseManager $categoryManager) {
        $messageErreur = $this->ajouterUnObjet($productManager, $validator);
        $tableauCategories = $this->faireLaListeDesObjet($categoryManager);
        include DIR_VIEWS . 'product/add.html.php';
    }
}

?>