<?php

include __DIR__.'/bootstrap.php';
$manager = new ProductManager();
$categoryManager = new CategoryManager();
$validator = new ProductValidator();
$controller = new ProductController();
$controller->add($manager, $validator, $categoryManager);

?>