<?php ?>

<!DOCTYPE html>
<html lang="fr">



<body>

    <?php
    require_once 'vue/includes/header.php';
    require_once 'vue/includes/navigation.php';
    ?>



    <section class="container mt-5">
        <h1>Ajout de Categorie <i class="fa fa-plus text-warning"></i></h1>

        <form class="mt-3" action="index.php?target=category&action=add" method="POST">
            <div class="mb-3">
                <label for="category" class="form-label">Libelle de  la categorie</label>
                <input type="text" class="form-control" name="libelle" id="category">

            </div>
            <?php if (!empty($erreur)) : ?>
                <div class="error">
                    <p class=" text-danger"><?= $erreur ?></p>
                </div>
            <?php endif ?>
            <div class="text-right">
                <button type="submit" class="btn btn-success ">Ajouter Categorie <i class="fa fa-plus"></i></button>
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