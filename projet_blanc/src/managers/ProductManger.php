<?php

class ProductManager extends BaseManager {

    public function insererDansBdd($product)
    {
        $tunnel = $this->creerConnection();
        $resultat = $tunnel->prepare("INSERT INTO products(title, price, description, category_id) VALUES(?, ?, ?, ?)");
        $resultat->execute([
            $product->title,
            $product->price,
            $product->description,
            $product->category_id
        ]);

        return null;
    }

    public function convertirLigneBddEnObjet(array $ligneDeBdd)
    {
        $product = new Product();
        $product->id = $ligneDeBdd['id'];
        $product->title = $ligneDeBdd['title'];
        $product->price = $ligneDeBdd['price'];
        $product->description = $ligneDeBdd['description'];
        $product->category_id = $ligneDeBdd['category_id'];
        return $product;
    }

    public function recupererTousLesObjets(): array
    {
        $tunnel = $this->creerConnection();
        $resultat = $tunnel->query('SELECT * FROM products');
        $tableau = $this->transformerResultatSqlEnTableau($resultat);
        return $tableau;
    }

    public function recupererUnSeulObjetAvecId(int $id)
    {
        $tunnel = $this->creerConnection();
        $statement = $tunnel->prepare('SELECT * FROM products WHERE id = ?');
        $statement->execute([$id]);
        $produit = $this->transformerResultatSqlEnObjet($statement);
        return $produit;
    }

}

?>