<?php

/**
 * Le ProduitValidator s'occupe de la conversion du payload
 * en objet Produit
 */
class ProduitValidator extends BaseValidator {

    public function verifierPayload(): ?string
    {
        if (!isset($_POST['product-title']) || $_POST['product-title'] === '')
        {
            return "Vous devez spécifier un nom de produit";
        }

        if (!isset($_POST['product-price']) || $_POST['product-price'] === '')
        {
            return "Vous devez spécifier un prix de produit";
        }

        if (!isset($_POST['product-description']) || $_POST['product-description'] === '')
        {
            return "Vous devez spécifier une description de produit";
        }

        if (!isset($_POST['product-category']) || $_POST['product-category'] === '')
        {
            return "Vous devez spécifier une categorie de produit";
        }

        if (!is_numeric($_POST['product-price']))
        {
            return "Le prix doit être numerique";
        }

        return null;
    }

    public function convertirPayloadEnObjet(): Product
    {
        $product = new Product();
        $product->title = $_POST['product-title'];
        $product->price = $_POST['product-price'];
        $product->description = $_POST['product-description'];
        $product->category_id = $_POST['product-category'];

        return $product;
    }

}
