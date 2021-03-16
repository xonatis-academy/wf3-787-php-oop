<?php

/**
 * Le ProduitValidator s'occupe de la conversion du payload
 * en objet Produit
 */
class OrderValidator extends BaseValidator {

    public function verifierPayload(): ?string
    {
        if (!isset($_POST['order-address']) || $_POST['order-address'] === '')
        {
            return "Vous devez spécifier une adresse";
        }
        
        if (!isset($_POST['order-status']) || $_POST['order-status'] === '')
        {
            return "Vous devez spécifier un status";
        }

        return null;
    }

    public function convertirPayloadEnObjet(): Order
    {
        $order = new Order();
        $order->address = $_POST['order-address'];
        $order->status = $_POST['order-status'];

        return $order;
    }

}
