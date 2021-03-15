<?php
include __DIR__ . '/header.html.php';
?>
<h1 class="display-4 text-center"><?php echo $produit->titre; ?></h1>
<div class="row">
    <div class="col">
        <p>
            <strong>Nom du produit :</strong>
            <?php echo $produit->titre; ?>
        </p>
        <p>
            <strong>Description du produit :</strong>
            <?php echo $produit->description; ?>
        </p>
        <p>
            <strong>Prix du produit :</strong>
            <?php echo $produit->prix; ?> euros
        </p>
        <a href="index.php" class="btn btn-secondary">Retour a l'affichage</a>
    </div>
    <div class="col">
        <img class="w-100" src="<?php echo $produit->photo ?>" />
    </div>
</div>

<?php
include __DIR__ . '/footer.html.php';
?>