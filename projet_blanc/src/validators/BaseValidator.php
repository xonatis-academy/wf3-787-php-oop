<?php

abstract class BaseValidator {

    public abstract function verifierPayload(): ?string;
    public abstract function convertirPayloadEnObjet();

    public function determinerCheminFichierEnregistre(): string
    {
        $timestamp = strval(time());
        $extension = pathinfo(basename($_FILES["logement-photo-file"]["name"]), PATHINFO_EXTENSION);
        $chemin = DOSSIER_UPLOADS . '/' . 'logement_' . $timestamp . '.' . $extension;
        return $chemin;
    }

    public function enregistrerFichierEnvoye(): string
    {
        $chemin = $this->determinerCheminFichierEnregistre();

        if (!file_exists(DOSSIER_UPLOADS))
        {
            mkdir(DOSSIER_UPLOADS);
        }

        move_uploaded_file($_FILES["logement-photo-file"]["tmp_name"], $chemin);
        return $chemin;
    }
}

?>