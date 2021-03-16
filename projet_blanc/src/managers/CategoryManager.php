<?php

class CategoryManager extends BaseManager {

    public function insererDansBdd($category)
    {
        $tunnel = $this->creerConnection();
        $resultat = $tunnel->prepare("INSERT INTO categories(name) VALUES(?)");
        $resultat->execute([
            $category->name
        ]);

        return null;
    }

    public function convertirLigneBddEnObjet(array $ligneDeBdd)
    {
        $category = new Category();
        $category->id = $ligneDeBdd['id'];
        $category->name = $ligneDeBdd['name'];
        return $category;
    }

    public function recupererTousLesObjets(): array
    {
        $tunnel = $this->creerConnection();
        $resultat = $tunnel->query('SELECT * FROM categories');
        $tableau = $this->transformerResultatSqlEnTableau($resultat);
        return $tableau;
    }

    public function recupererUnSeulObjetAvecId(int $id)
    {
        $tunnel = $this->creerConnection();
        $statement = $tunnel->prepare('SELECT * FROM categories WHERE id = ?');
        $statement->execute([$id]);
        $category = $this->transformerResultatSqlEnObjet($statement);
        return $category;
    }

}

?>