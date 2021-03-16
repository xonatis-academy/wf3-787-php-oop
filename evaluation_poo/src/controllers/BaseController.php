<?php

abstract class BaseController {

    protected function faireLaListeDesObjet(BaseManager $manager): array {
        $tableau = $manager->recupererTousLesObjets();
        return $tableau;
    }

    protected function recupererUnObjet(BaseManager $manager): object {
        if (!isset($_GET['id']))
        {
            die();
        }

        $objet = $manager->recupererUnSeulObjetAvecId($_GET['id']);
        return $objet;
    }

    protected function ajouterUnObjet(BaseManager $manager, BaseValidator $validator) {
        $messageErreur = null;
        if (isset($_POST['btn-valider']))
        {
            $messageErreur = $validator->verifierPayload();
            if ($messageErreur === null)
            {
                $objet = $validator->convertirPayloadEnObjet();
                $manager->insererDansBdd($objet);
            }
        }
        return $messageErreur;
    }

}

?>