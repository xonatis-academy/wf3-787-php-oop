<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include __DIR__.'/models/Produit.php';
include __DIR__.'/functions.php';

$tableau = recupererTousLesProduits();

include __DIR__.'/views/index.html.php';

?>