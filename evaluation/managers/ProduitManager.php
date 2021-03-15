<?php

class ProduitManager {

    /**
     * insererDansBdd
     * @param produit : un produit à insérer dans la base de données
     * @return null
     */
    // ProduitManager
    public function insererDansBdd($produit)
    {
        $tunnel = new PDO('mysql:host=localhost;dbname=eval', 'root', '');
        $tunnel->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $tunnel->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        $resultat = $tunnel->prepare("INSERT INTO logement(titre, adresse, ville, cp, surface, prix, photo, type, description) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $resultat->execute([
            $produit->titre, 
            $produit->adresse, 
            $produit->ville, 
            $produit->cp, 
            $produit->surface, 
            $produit->prix, 
            $produit->photo, 
            $produit->type, 
            $produit->description]);

        return null;
    }

    /**
     * convertirLigneBddEnProduit
     * @param ligneDeBdd : une ligne de la base de données
     * @return produit : un nouvel produit qui contient id, nom, prix, image, type 
     * et description de la ligne bdd correspondante
     */
    // ProduitManager
    public function convertirLigneBddEnProduit($ligneDeBdd)
    {
        $produit = new Produit();
        $produit->id = $ligneDeBdd['id_logement'];
        $produit->titre = $ligneDeBdd['titre'];
        $produit->adresse = $ligneDeBdd['adresse'];
        $produit->ville = $ligneDeBdd['ville'];
        $produit->cp = $ligneDeBdd['cp'];
        $produit->surface = $ligneDeBdd['surface'];
        $produit->prix = $ligneDeBdd['prix'];
        $produit->photo = $ligneDeBdd['photo'];
        $produit->type = $ligneDeBdd['type'];
        $produit->description = $ligneDeBdd['description'];
        return $produit;
    }

    /**
     * recupererTousLesProduits
     * @param rien
     * @return tableau : tableau de logements qui contient id, nom, prix, image, type et description
     * à partir de la table produits
     */
    // ProduitManager
    public function recupererTousLesProduits()
    {
        $tableau = [];
        $tunnel = new PDO('mysql:host=localhost;dbname=eval', 'root', '');
        $tunnel->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $tunnel->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        $resultat = $tunnel->query('SELECT * FROM logement');
        while ($ligne = $resultat->fetch())
        {
            $produit = convertirLigneBddEnProduit($ligne);
            array_push($tableau, $produit);
        }
        return $tableau;
    }

    /**
     * recupererUnSeulProduitAvecId
     * @param id : un identifiant d'un produit
     * @return produit : le produit correspondant à l'id en question en base de données
     */
    // ProduitManager
    public function recupererUnSeulProduitAvecId($id)
    {
        $tunnel = new PDO('mysql:host=localhost;dbname=eval', 'root', '');
        $tunnel->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $tunnel->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        $statement = $tunnel->prepare('SELECT * FROM logement WHERE id_logement = ?');
        $statement->execute([$id]);
        $ligne = $statement->fetch();

        $produit = convertirLigneBddEnProduit($ligne);
        return $produit;
    }
}

?>