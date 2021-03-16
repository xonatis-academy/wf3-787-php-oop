<?php

include __DIR__.'/bootstrap.php';
$manager = new ProductManager();
$validator = new ProductValidator();
$controller = new ProductController();
$controller->add($manager, $validator);

?>