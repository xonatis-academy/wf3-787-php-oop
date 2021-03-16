<?php

abstract class BaseManager {

    public abstract function convertirLigneBddEnObjet(array $ligneDeBdd);
    public abstract function recupererTousLesObjets();
    public abstract function insererDansBdd($objet);
    public abstract function recupererUnSeulObjetAvecId(int $id);

    public function creerConnection(): PDO {
        $tunnel = new PDO('mysql:host=localhost;dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
        $tunnel->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $tunnel->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $tunnel;
    }

    public function transformerResultatSqlEnTableau(PDOStatement $resultat): array {
        $tableau = [];
        while ($ligne = $resultat->fetch())
        {
            $objet = $this->convertirLigneBddEnObjet($ligne);
            array_push($tableau, $objet);
        }
        return $tableau;
    }

    public function transformerResultatSqlEnObjet(PDOStatement $resultat): object {
        $ligne = $resultat->fetch();
        $objet = $this->convertirLigneBddEnObjet($ligne);
        return $objet;
    }    
}

?>