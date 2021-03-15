<?php

define('DOSSIER_UPLOADS', 'uploads');

class ProduitValidator {

    /**
     * verifierPayloadPourCreerProduit
     * @param rien
     * @return message : message d'erreur s'il manque quelque chose pour créer un prduit dans le payload, 
     * sinon s'il ne manque rien, ca retoure null
     */
    // ProduitValidator
    public function verifierPayloadPourCreerProduit()
    {
        if (!isset($_POST['logement-titre']) || $_POST['logement-titre'] === '')
        {
            return "Vous devez spécifier un nom de logement";
        }

        if (!isset($_POST['logement-prix']) || $_POST['logement-prix'] === '')
        {
            return "Vous devez spécifier un prix de logement";
        }

        if (!isset($_POST['logement-adresse']) || $_POST['logement-adresse'] === '')
        {
            return "Vous devez spécifier une adresse de logement";
        }

        if (!isset($_POST['logement-ville']) || $_POST['logement-ville'] === '')
        {
            return "Vous devez spécifier une ville de logement";
        }

        if (!isset($_POST['logement-cp']) || $_POST['logement-cp'] === '')
        {
            return "Vous devez spécifier un code postal de logement";
        }

        if (!is_numeric($_POST['logement-prix']))
        {
            return "Le prix doit être un entier";
        }

        if (!is_numeric($_POST['logement-surface']))
        {
            return "La surface doit être un entier";
        }

        if (!isset($_POST['logement-type']) || $_POST['logement-type'] === '')
        {
            return "Vous devez spécifier un prix de logement";
        }

        if (isset($_FILES['logement-photo-file']) && $_FILES['logement-photo-file']['name'] !== '')
        {
            if (!in_array($_FILES['logement-photo-file']['type'], ['image/webp', 'image/png', 'image/jpg']))
            {
                return "Le type de fichier " . $_FILES['logement-photo-file']['type'] . " n'est pris en charge";
            }

            if ($_FILES['logement-photo-file']['size'] > 10000000)
            {
                return "Le fichier est trop gros: il fait " . $_FILES['logement-photo-file']['size']. ' octets';
            }
        }

        return null;
    }

    /**
     * convertirPayloadEnProduit
     * @param rien
     * @return produit : un produit qui comporte nom, prix et image qui viennent du payload
     */
    // ProduitValidator
    public function convertirPayloadEnProduit()
    {
        $photo = enregistrerFichierEnvoye();
        $produit = new Produit();
        $produit->titre = $_POST['logement-titre'];
        $produit->adresse = $_POST['logement-adresse'];
        $produit->ville = $_POST['logement-ville'];
        $produit->cp = $_POST['logement-cp'];
        $produit->surface = $_POST['logement-surface'];
        $produit->prix = $_POST['logement-prix'];
        $produit->photo = $photo;
        $produit->type = $_POST['logement-type'];
        $produit->description = $_POST['logement-description'];

        return $produit;
    }

    /**
     * determinerCheminFichierEnregistre
     * @param rien
     * @return chemin : chemin d'un ficher dans le dossier, composé de l'heure courante et de l'extension du fichier envoyé
     */
    // ??????
    public function determinerCheminFichierEnregistre()
    {
        $timestamp = strval(time());
        $extension = pathinfo(basename($_FILES["logement-photo-file"]["name"]), PATHINFO_EXTENSION);
        $chemin = DOSSIER_UPLOADS . '/' . 'logement_' . $timestamp . '.' . $extension;
        return $chemin;
    }

    /**
     * enregistrerFichierEnvoye
     * @param rien
     * @return chemin : chemin d'un ficher dans le dossier, composé de l'heure courante et de l'extension du fichier envoyé
     */
    // ???????
    public function enregistrerFichierEnvoye()
    {
        $chemin = determinerCheminFichierEnregistre();

        // si le dossier n'existe pas
        // ben je crée le dossier
        if (!file_exists(DOSSIER_UPLOADS))
        {
            mkdir(DOSSIER_UPLOADS);
        }

        move_uploaded_file($_FILES["logement-photo-file"]["tmp_name"], $chemin);
        return $chemin;
    }

}
