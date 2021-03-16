<?php

include __DIR__.'/bootstrap.php';
$manager = new OrderManager();
$validator = new OrderValidator();
$controller = new OrderController();
$controller->add($manager, $validator);

?>