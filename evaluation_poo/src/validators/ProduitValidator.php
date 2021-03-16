<?php

/**
 * Le ProduitValidator s'occupe de la conversion du payload
 * en objet Produit
 */
class ProduitValidator extends BaseValidator {

    public function verifierPayload(): ?string
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
            if (!in_array($_FILES['logement-photo-file']['type'], ['image/webp', 'image/png', 'image/jpg', 'image/jpeg']))
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

    public function convertirPayloadEnObjet(): Produit
    {
        $photo = $this->enregistrerFichierEnvoye();
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

}
