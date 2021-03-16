<?php

class ProductController extends BaseController {

    public function add(BaseManager $manager, BaseValidator $validator) {
        $messageErreur = $this->ajouterUnObjet($manager, $validator);
        include DIR_VIEWS . 'product/add.html.php';
    }
}

?>