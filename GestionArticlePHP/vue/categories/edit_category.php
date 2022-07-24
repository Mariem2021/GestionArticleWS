<?php ?>

<!DOCTYPE html>
<html lang="fr">



<body>

    <?php
    require_once 'vue/includes/header.php';
    require_once 'vue/includes/navigation.php';
    ?>



    <section class="container mt-5">
        <h1>Mise à jour de Categorie <i class="fa fa-edit text-warning"></i></h1>

        <form class="mt-3" action="index.php?target=category&action=edit&categoryId=<?= $category->getId() ?>" method="POST">
            <div class="mb-3">
                <label for="category" class="form-label">Libelle de  la categorie</label>
                <input type="text" value="<?= $category->getLibelle() ?>" class="form-control" name="libelle" id="category">

            </div>
            <?php if (!empty($error)) : ?>
                <div class="error">
                    <p class=" text-danger"><?= $error ?></p>
                </div>
            <?php endif ?>
            <div class="text-right">
                <button type="submit" class="btn btn-success ">Modifier Categorie <i class="fa fa-edit"></i></button>
            </div>
        </form>

        <a href="index.php" class="btn btn-dark mt-4">Retour <i class="fa fa-home"></i></a>
    </section>

    <!-- Section Footer -->

    <?php
    require_once 'vue/includes/footer.php';
    ?>

    <!-- End of Section Footer -->

</body>

</html>