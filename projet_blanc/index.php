<?php

include __DIR__.'/bootstrap.php';
$productManager = new ProductManager();
$categoryManager = new CategoryManager();
$orderManager = new OrderManager();

$controller = new HomeController();
$controller->listing($productManager, $categoryManager, $orderManager);

?>