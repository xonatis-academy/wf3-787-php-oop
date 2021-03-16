<?php

include __DIR__.'/bootstrap.php';
$manager = new ProduitManager();
$controller = new ProduitController();
$controller->get($manager);

?>