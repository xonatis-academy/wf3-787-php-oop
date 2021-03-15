<?php

class ProduitController {

    public function list() {

        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        include __DIR__.'/../models/Produit.php';
        include __DIR__.'/../functions.php';

        $tableau = recupererTousLesProduits();

        include __DIR__.'/../views/catalog.html.php';
    }

    public function get() {

        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        include __DIR__.'/../functions.php';
        include __DIR__.'/../models/Produit.php';

        if (!isset($_GET['id']))
        {
            die();
        }

        $produit = recupererUnSeulProduitAvecId($_GET['id']);

        include __DIR__.'/../views/details.html.php';
    }

    public function add() {

        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        include __DIR__.'/../models/Produit.php';
        include __DIR__.'/../functions.php';

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

        include __DIR__.'/../views/add.html.php';
    }

}

?>