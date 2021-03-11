<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include __DIR__.'/functions.php';
include __DIR__.'/Produit.php';

if (!isset($_GET['id']))
{
    die();
}

$produit = recupererUnSeulProduitAvecId($_GET['id']);

include __DIR__.'/details.html.php';

?>