<?php

class OrderManager extends BaseManager {

    public function insererDansBdd($order)
    {
        $tunnel = $this->creerConnection();
        $resultat = $tunnel->prepare("INSERT INTO orders(address, status) VALUES(?, ?)");
        $resultat->execute([
            $order->address,
            $order->status
        ]);

        return null;
    }

    public function convertirLigneBddEnObjet(array $ligneDeBdd)
    {
        $order = new Order();
        $order->id = $ligneDeBdd['id'];
        $order->address = $ligneDeBdd['address'];
        $order->status = $ligneDeBdd['status'];
        return $order;
    }

    public function recupererTousLesObjets(): array
    {
        $tunnel = $this->creerConnection();
        $resultat = $tunnel->query('SELECT * FROM orders');
        $tableau = $this->transformerResultatSqlEnTableau($resultat);
        return $tableau;
    }

    public function recupererUnSeulObjetAvecId(int $id)
    {
        $tunnel = $this->creerConnection();
        $statement = $tunnel->prepare('SELECT * FROM orders WHERE id = ?');
        $statement->execute([$id]);
        $order = $this->transformerResultatSqlEnObjet($statement);
        return $order;
    }

}

?>