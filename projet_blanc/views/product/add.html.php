<?php
    include __DIR__.'/../header.html.php';
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

<form method="POST" action="add-product.php" class="p-5">
    <div class="form-group">
        <label>Titre</label>
        <input type="text" name="product-title" class="form-control">
    </div>
    <div class="form-group">
        <label>Prix</label>
        <input type="number" name="product-price" class="form-control">
    </div>
    <div class="form-group">
        <label>Description</label>
        <input type="text" name="product-description" class="form-control">
    </div>
    <div class="form-group">
        <label>Categorie</label>
        <input type="number" name="product-category" class="form-control">
    </div>
    <button name="btn-valider" type="submit" class="btn btn-primary">Ajouter le produit</button>
    <a href="index.php" class="btn btn-secondary">Retour a l'affichage</a>
</form>

<?php
    include __DIR__.'/../footer.html.php';
?>