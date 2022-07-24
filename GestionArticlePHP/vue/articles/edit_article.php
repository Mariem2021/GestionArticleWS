<?php ?>

<!DOCTYPE html>
<html lang="fr">



<body>

    <?php
    require_once 'vue/includes/header.php';
    require_once 'vue/includes/navigation.php';
    ?>



    <section class="container mt-5">
        <h1>Mise à jour  Article <i class="fa fa-edit text-info"></i></h1>

        <form action="index.php?target=article&action=edit&articleId=<?= $article->getId() ?>" method="POST">
           
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" value="<?= $article->getTitre()  ?>" class="form-control" name="title" id="title">
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Categorie</label>
                <select name="category" id="category" class="form-control">
                    <?php foreach($categories as $category): ?>
                        <option 
                            value="<?= $category->getId() ?>" 
                            <?php if($category->getId() == $article->getCategorie()): ?> selected <?php endif ?> 
                        >
                        <?= $category->getLibelle() ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="content" class="form-label">Contenu</label>
                <textarea name="content" class="form-control" id="content" cols="30" rows="10">
                    <?= $article->getContenu() ?>
                </textarea>
            </div>
            <div class="text-left">
                <a href="./index.php" class="btn btn-dark mt-4">Retour <i class="fa fa-home"></i></a>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-success ">Modifier  Article <i class="fa fa-edit"></i></button>
            </div>
        </form>

       
    </section>

    <!-- Section Footer -->

    <?php
    require_once 'vue/includes/footer.php';
    ?>

    <!-- End of Section Footer -->

</body>

</html>
