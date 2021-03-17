<?php
include __DIR__ . '/../header.html.php';
?>

<h1 class="display-4 text-center">Gestion de la boutique</h1>

<div class="row">
    <div class="col-md-4">

        <h2>Commandes</h2>

        <table class="table table-striped w-100 mx-auto">
            <tr>
                <th>Id</th>
                <th>Adresse</th>
                <th>Status</th>
            </tr>

            <?php
            for ($i = 0; $i < count($tableauOrders); ++$i) {
            ?>

                <tr>
                    <td><?php echo $tableauOrders[$i]->id ?></td>
                    <td><?php echo $tableauOrders[$i]->address ?></td>
                    <td><?php echo $tableauOrders[$i]->status ?></td>
                </tr>

            <?php
            }
            ?>

        </table>

    </div>

    <div class="col-md-4">

        <h2>Produits</h2>

        <table class="table table-striped w-100 mx-auto">
            <tr>
                <th>Id</th>
                <th>Titre</th>
                <th>Prix</th>
                <th>Description</th>
                <th>Categorie</th>
            </tr>

            <?php
            for ($i = 0; $i < count($tableauProducts); ++$i) {
            ?>

                <tr>
                    <td><?php echo $tableauProducts[$i]->id ?></td>
                    <td><?php echo $tableauProducts[$i]->title ?></td>
                    <td><?php echo $tableauProducts[$i]->price ?></td>
                    <td><?php echo $tableauProducts[$i]->description ?></td>
                    <td><?php echo $tableauProducts[$i]->category_id ?></td>
                </tr>

            <?php
            }
            ?>

        </table>

    </div>

    <div class="col-md-4">

        <h2>Categories</h2>

        <table class="table table-striped w-100 mx-auto">
            <tr>
                <th>Id</th>
                <th>Nom</th>
            </tr>

            <?php
            for ($i = 0; $i < count($tableauProducts); ++$i) {
            ?>

                <tr>
                    <td><?php echo $tableauProducts[$i]->id ?></td>
                    <td><?php echo $tableauProducts[$i]->name ?></td>
                </tr>

            <?php
            }
            ?>

        </table>

    </div>
</div>

<?php
include __DIR__ . '/../footer.html.php';
?>