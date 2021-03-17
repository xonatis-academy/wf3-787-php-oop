<?php

class HomeController extends BaseController {

    public function listing(BaseManager $productManager, BaseManager $categoryManager, BaseManager $orderManager) {
        $tableauProducts = $this->faireLaListeDesObjet($productManager);  
        $tableauCategories = $this->faireLaListeDesObjet($categoryManager);
        $tableauOrders = $this->faireLaListeDesObjet($orderManager);   
        include DIR_VIEWS . 'home/index.html.php';
    }

}

?>