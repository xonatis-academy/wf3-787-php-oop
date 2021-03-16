<?php

include __DIR__.'/bootstrap.php';
$manager = new CategoryManager();
$validator = new CategoryValidator();
$controller = new CategoryController();
$controller->add($manager, $validator);

?>