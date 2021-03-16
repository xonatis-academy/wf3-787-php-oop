<?php

class CategoryController extends BaseController {

    public function add(BaseManager $manager, BaseValidator $validator) {
        $messageErreur = $this->ajouterUnObjet($manager, $validator);
        include DIR_VIEWS . 'category/add.html.php';
    }
}

?>