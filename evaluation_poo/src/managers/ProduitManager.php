<?php

class ProduitManager extends BaseManager {

    public function insererDansBdd($produit)
    {
        $tunnel = $this->creerConnection();
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

    public function convertirLigneBddEnObjet(array $ligneDeBdd)
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

    public function recupererTousLesObjets()
    {
        $tunnel = $this->creerConnection();
        $resultat = $tunnel->query('SELECT * FROM logement');
        $tableau = $this->transformerResultatSqlEnTableau($resultat);
        return $tableau;
    }

    public function recupererUnSeulObjetAvecId(int $id)
    {
        $tunnel = $this->creerConnection();
        $statement = $tunnel->prepare('SELECT * FROM logement WHERE id_logement = ?');
        $statement->execute([$id]);
        $produit = $this->transformerResultatSqlEnObjet($statement);
        return $produit;
    }
}

?>