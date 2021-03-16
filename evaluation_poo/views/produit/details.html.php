<?php
include __DIR__ . '/../header.html.php';
?>
<h1 class="display-4 text-center"><?php echo $objet->titre; ?></h1>
<div class="row">
    <div class="col">
        <p>
            <strong>Nom du produit :</strong>
            <?php echo $objet->titre; ?>
        </p>
        <p>
            <strong>Description du produit :</strong>
            <?php echo $objet->description; ?>
        </p>
        <p>
            <strong>Prix du produit :</strong>
            <?php echo $objet->prix; ?> euros
        </p>
        <a href="catalog.php" class="btn btn-secondary">Retour a l'affichage</a>
    </div>
    <div class="col">
        <img class="w-100" src="<?php echo $objet->photo ?>" />
    </div>
</div>

<?php
include __DIR__ . '/../footer.html.php';
?>