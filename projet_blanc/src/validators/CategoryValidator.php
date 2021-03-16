<?php

/**
 * Le ProduitValidator s'occupe de la conversion du payload
 * en objet Produit
 */
class CategoryValidator extends BaseValidator {

    public function verifierPayload(): ?string
    {
        if (!isset($_POST['category-name']) || $_POST['category-name'] === '')
        {
            return "Vous devez spécifier un nom de categorie";
        }

        return null;
    }

    public function convertirPayloadEnObjet(): Category
    {
        $category = new Category();
        $category->name = $_POST['category-name'];

        return $category;
    }

}
