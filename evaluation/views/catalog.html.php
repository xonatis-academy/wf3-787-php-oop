<?php
include __DIR__ . '/header.html.php';
?>

<h1 class="display-4 text-center">Liste des produits</h1>
<a href="add.php" class="btn btn-primary">Ajouter un produit</a>
<table class="table table-striped w-100 mx-auto">
    <tr>
        <th>Nom</th>
        <th>Prix</th>
        <th>Image</th>
        <th>Type</th>
        <th>Description</th>
        <th>Action</th>
    </tr>

    <?php
    for ($i = 0; $i < count($tableau); ++$i) {
    ?>

        <tr>
            <td class="w-25"><?php echo $tableau[$i]->titre ?></td>
            <td><?php echo $tableau[$i]->prix ?> euros</td>
            <td>
                <img class="w-100" src="<?php echo $tableau[$i]->photo ?>" />
            </td>
            <td><?php echo $tableau[$i]->type ?></td>
            <td><?php
                $taille = strlen($tableau[$i]->description);
                if ($taille > 25) {
                    echo substr($tableau[$i]->description, 0, 25) . '...';
                } else {
                    echo $tableau[$i]->description;
                }

                ?></td>
            <td>
                <a href="details.php?id=<?php echo $tableau[$i]->id ?>" class="btn btn-secondary">Details</a>
            </td>
        </tr>

    <?php
    }
    ?>

</table>

<?php
include __DIR__ . '/footer.html.php';
?>