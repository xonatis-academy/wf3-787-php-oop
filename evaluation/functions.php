<?php

define('DOSSIER_UPLOADS', 'uploads');

/**
 * verifierPayloadPourCreerProduit
 * @param rien
 * @return message : message d'erreur s'il manque quelque chose pour créer un prduit dans le payload, 
 * sinon s'il ne manque rien, ca retoure null
 */
function verifierPayloadPourCreerProduit()
{
    if (!isset($_POST['logement-titre']) || $_POST['logement-titre'] === '')
    {
        return "Vous devez spécifier un nom de logement";
    }

    if (!isset($_POST['logement-prix']) || $_POST['logement-prix'] === '')
    {
        return "Vous devez spécifier un prix de logement";
    }

    if (!isset($_POST['logement-adresse']) || $_POST['logement-adresse'] === '')
    {
        return "Vous devez spécifier une adresse de logement";
    }

    if (!isset($_POST['logement-ville']) || $_POST['logement-ville'] === '')
    {
        return "Vous devez spécifier une ville de logement";
    }

    if (!isset($_POST['logement-cp']) || $_POST['logement-cp'] === '')
    {
        return "Vous devez spécifier un code postal de logement";
    }

    if (!is_int($_POST['logement-prix']))
    {
        return "Le prix doit être un entier";
    }

    if (!is_int($_POST['logement-surface']))
    {
        return "La surface doit être un entier";
    }

    if (!isset($_POST['logement-type']) || $_POST['logement-type'] === '')
    {
        return "Vous devez spécifier un prix de logement";
    }

    if (isset($_FILES['logement-photo-file']) && $_FILES['logement-photo-file']['name'] !== '')
    {
        if (!in_array($_FILES['logement-photo-file']['type'], ['image/webp', 'image/png', 'image/jpg']))
        {
            return "Le type de fichier " . $_FILES['logement-photo-file']['type'] . " n'est pris en charge";
        }

        if ($_FILES['logement-photo-file']['size'] > 10000000)
        {
            return "Le fichier est trop gros: il fait " . $_FILES['logement-photo-file']['size']. ' octets';
        }
    }

    return null;
}

/**
 * determinerCheminFichierEnregistre
 * @param rien
 * @return chemin : chemin d'un ficher dans le dossier, composé de l'heure courante et de l'extension du fichier envoyé
 */
function determinerCheminFichierEnregistre()
{
    $timestamp = strval(time());
    $extension = pathinfo(basename($_FILES["logement-photo-file"]["name"]), PATHINFO_EXTENSION);
    $chemin = DOSSIER_UPLOADS . '/' . 'logement_' . $timestamp . '.' . $extension;
    return $chemin;
}

/**
 * enregistrerFichierEnvoye
 * @param rien
 * @return chemin : chemin d'un ficher dans le dossier, composé de l'heure courante et de l'extension du fichier envoyé
 */
function enregistrerFichierEnvoye()
{
    $chemin = determinerCheminFichierEnregistre();

    // si le dossier n'existe pas
    // ben je crée le dossier
    if (!file_exists(DOSSIER_UPLOADS))
    {
        mkdir(DOSSIER_UPLOADS);
    }

    move_uploaded_file($_FILES["logement-photo-file"]["tmp_name"], $chemin);
    return $chemin;
}

/**
 * convertirPayloadEnProduit
 * @param rien
 * @return produit : un produit qui comporte nom, prix et image qui viennent du payload
 */
function convertirPayloadEnProduit()
{
    $photo = enregistrerFichierEnvoye();
    $produit = new Produit();
    $produit->titre = $_POST['logement-titre'];
    $produit->adresse = $_POST['logement-adresse'];
    $produit->ville = $_POST['logement-ville'];
    $produit->cp = $_POST['logement-cp'];
    $produit->surface = $_POST['logement-surface'];
    $produit->prix = $_POST['logement-prix'];
    $produit->photo = $photo;
    $produit->type = $_POST['logement-type'];
    $produit->description = $_POST['logement-description'];

    return $produit;
}

/**
 * insererDansBdd
 * @param produit : un produit à insérer dans la base de données
 * @return null
 */
function insererDansBdd($produit)
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



// =============================== AFFICHAGE ===============================

/**
 * convertirLigneBddEnProduit
 * @param ligneDeBdd : une ligne de la base de données
 * @return produit : un nouvel produit qui contient id, nom, prix, image, type 
 * et description de la ligne bdd correspondante
 */
function convertirLigneBddEnProduit($ligneDeBdd)
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
function recupererTousLesProduits()
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
function recupererUnSeulProduitAvecId($id)
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

?>