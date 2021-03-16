<?php
    include __DIR__.'/../header.html.php';
?>

<h1 class="display-4 text-center">Gestion des categories</h1>

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

<form method="POST" action="add.php" class="p-5">
    <div class="form-group">
        <label>Nom de la catégorie</label>
        <input type="text" name="category-name" class="form-control">
    </div>
    <button name="btn-valider" type="submit" class="btn btn-primary">Ajouter la categorie</button>
    <a href="index.php" class="btn btn-secondary">Retour a l'affichage</a>
</form>

<?php
    include __DIR__.'/../footer.html.php';
?>