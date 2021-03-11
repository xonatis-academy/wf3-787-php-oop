<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include __DIR__.'/Produit.php';
include __DIR__.'/functions.php';

$messageErreur = null;

if (isset($_POST['btn-valider']))
{
    $messageErreur = verifierPayloadPourCreerProduit();
    if ($messageErreur === null)
    {
        $produit = convertirPayloadEnProduit();
        insererDansBdd($produit);
    }
}

include __DIR__.'/index.html.php';

?>