<?php
    include __DIR__.'/header.html.php';
?>

<h1 class="display-4 text-center">Gestion des produits</h1>

<?php
if ($messageErreur !== null) 
{
?>

    <div class="alert alert-danger" role="alert">
        <?php echo $messageErreur; ?>
    </div>

<?php
}
?>

<form method="POST" action="add.php" enctype="multipart/form-data" class="p-5">
    <div class="form-group">
        <label>Titre</label>
        <input type="text" name="logement-titre" class="form-control">
    </div>
    <div class="form-group">
        <label>Adresse</label>
        <input type="text" name="logement-adresse" class="form-control">
    </div>
    <div class="form-group">
        <label>Ville</label>
        <input type="text" name="logement-ville" class="form-control">
    </div>
    <div class="form-group">
        <label>Code postal</label>
        <input type="text" name="logement-cp" class="form-control">
    </div>
    <div class="form-group">
        <label>Surface</label>
        <input type="text" name="logement-surface" class="form-control">
    </div>
    <div class="form-group">
        <label>Prix du produit</label>
        <input type="text" name="logement-prix" class="form-control">
    </div>
    <div class="form-group">
        <label>Photo du produit</label>
        <input type="file" name="logement-photo-file" class="form-control-file">
    </div>
    <select name="logement-type">
        <option value="location">Location</option>
        <option value="vente">Vente</option>
    </select>
    <div class="form-group">
        <label>Description du produit</label>
        <input type="text" name="logement-description" class="form-control">
    </div>
    <button name="btn-valider" type="submit" class="btn btn-primary">Ajouter le produit</button>
    <a href="catalog.php" class="btn btn-secondary">Retour a l'affichage</a>
</form>

<?php
    include __DIR__.'/footer.html.php';
?>