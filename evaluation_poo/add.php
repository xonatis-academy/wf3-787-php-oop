<?php

include __DIR__.'/bootstrap.php';
$manager = new ProduitManager();
$validator = new ProduitValidator();
$controller = new ProduitController();
$controller->add($manager, $validator);

?>