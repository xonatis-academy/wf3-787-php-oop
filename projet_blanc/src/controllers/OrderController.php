<?php

class OrderController extends BaseController {

    public function add(BaseManager $manager, BaseValidator $validator) {
        $messageErreur = $this->ajouterUnObjet($manager, $validator);
        include DIR_VIEWS . 'order/add.html.php';
    }
}

?>