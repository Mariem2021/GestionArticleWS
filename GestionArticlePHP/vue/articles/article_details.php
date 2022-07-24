<?php ?>

<!DOCTYPE html>
<html lang="fr">



<body>

    <?php
    require_once 'vue/includes/header.php';
    require_once 'vue/includes/navigation.php';
    ?>



    <section class="container mt-5">
        <h1><?= $article->getTitre() ?></h1>
        <h5 class="text-muted mt-2"> Categorie : <span class="text-info lead display-5"><?= $category ?></span></h5>
        <h6 class="text-muted">Crée le : <span class="lead text-info"><?= $article->getDateCreation() ?></span></h6>
        <?php if ($article->getDateModification()) : ?>
            <h6 class="text-muted">Modifié le : <span class="lead text-warning"><?= $article->getDateCreation() ?></span></h6>
        <?php endif ?>
        <a href="index.php?target=article&action=edit&articleId=<?= $article->getId() ?>" class="text-white btn btn-success">Modifier <i class="fa fa-edit"></i></a>
        <a data-toggle="modal" data-target="#Modal<?= $article->getId() ?>" class="text-white btn btn-danger ml-2">Supprimer <i class="fa fa-trash"></i></a>

        <!-- Modal of Suppression -->

        <div class="modal fade" id="Modal<?= $article->getId() ?>" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger">Suppresion d'un article</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="lead">Voulez-vous supprimer l'article : <span class="text-info"><?= $article->getTitre() ?></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Non</button>
                        <a href="index.php?target=article&action=delete&articleId=<?= $article->getId() ?>" type="button" class="btn btn-danger">Oui</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- End of Modal Supression -->

        <p class="text-justify mt-4"><?= $article->getContenu()  ?></p>

        <a href="./index.php" class="btn btn-dark mt-4">Retour <i class="fa fa-home"></i></a>
    </section>

    <!-- Section Footer -->

    <?php
    require_once 'vue/includes/footer.php';
    ?>

    <!-- End of Section Footer -->

</body>

</html>