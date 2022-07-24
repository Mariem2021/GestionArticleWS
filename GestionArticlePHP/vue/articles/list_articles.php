<?php ?>

<!DOCTYPE html>
<html lang="en">

<body>
    <?php
    require_once  'vue/includes/header.php';
    require_once 'vue/includes/navigation.php'
    ?>
    <!-- Start Section Branding -->
    <section class="heading">
        <div class="text-center title">
            <h3 class="">Bienvenue au Blog-News</h3>

            <a href="#all-news" class="btn btn-dark">Voir les infos <i class="fa fa-eye"></i></a>
        </div>
    </section>
    <!-- End of section branding -->

    <!-- Start Section list news -->

    <section class="list-news mt-5 ml-4" id="all-news">
        <div style="display: flex;">
            <div class="title text-left mb-5">
                <h2 class="">Les dernieres infos...</h2>
            </div>

            <div class="float-right text-right " style="display: flex; margin-bottom:5% !important;">
                <?php if ($isEditor) : ?>
                    <div class="nav-item mr-3 mt-3 mb-3 ">
                        <a class="nav-link active text-white btn btn-warning" href="index.php?target=article&action=add">Ajouter Article <i class="fa fa-plus"></i></a>
                    </div>

                    <div class="nav-item mt-3 mb-3">
                        <a class="nav-link active text-white btn btn-info " href="index.php?target=category&action=add">Ajouter Categorie <i class="fa fa-plus"></i></a>
                    </div>
                <?php else : ?>
                    <div class="nav-item mr-3 mt-3 mb-3 ">
                        <a class="nav-link active text-white btn btn-success" href="index.php?target=login">Se connecter <i class="fa fa-user"></i></a>
                    </div>
                <?php endif ?>


            </div>

        </div>
        <div class="all-news">
            <div class="row">
                <div class="col-md-7 col-sm-12" id="articles">

                    <?php if (!empty($articles)) :  ?>
                        <!-- Start Aticles Display -->

                        <?php foreach ($articles as $article) : ?>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title text-info"><?= $article->getTitre()  ?> </h5>
                                </div>
                                <div class="card-body">

                                    <p class="card-text"><?= substr($article->getContenu(), 0, 200) . '...' ?></p>

                                    <a href="index.php?target=article&id=<?= $article->getId() ?>" class="btn btn-dark"> <i class="fa fa-eye"></i></a>
                                    <?php if ($isEditor) : ?>
                                        <a href="index.php?target=article&action=edit&articleId=<?= $article->getId() ?>" class="btn btn-info text-white"> <i class="fa fa-edit"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#Modal<?= $article->getId() ?>" class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                                    <?php endif ?>

                                </div>
                            </div>

                            <hr>


                            <!-- Modal of  Article Suppression  -->

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

                            <!-- End of Modal -->
                        <?php endforeach ?>

                    <?php else : ?>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title text-info"> Pas d'articles à afficher...</h5>
                            </div>
                            <div class="card-body">

                                <p class="card-text text-danger text-center">Veuillez ajouter des articles</p>


                            </div>
                        </div>
                    <?php endif ?>
                    <!-- End of Article Display -->
                </div>

                <!-- Start of Category Display -->

                <div class="col-md-5 sm-12" id="categories">
                    <div class="card categories" style="width: 80%;">
                        <div class="card-header bg-dark text-white text-center">
                            <h3 class="lead">Categories</h3>
                        </div>
                        <ul class="list-group list-group-flush">
                            <?php foreach ($categories as $category) : ?>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a class="link-category text-info" href="index.php?target=articles&category=<?= $category->getLibelle() ?>">
                                                <p><?= $category->getLibelle() ?> </p>
                                            </a>
                                        </div>
                                        <div class="col-md-6">

                                            <?php if ($isEditor) : ?>
                                                <a href="#" data-toggle="modal" data-target="#CategoryModalEdition<?= $category->getId() ?>" class="btn btn-secondary text-white"> <i class="fa fa-edit"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#CategoryModal<?= $category->getId() ?>" class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                                            <?php endif ?>



                                            <!-- Modal of Category Suppression -->

                                            <div class="modal fade" id="CategoryModal<?= $category->getId() ?>" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-danger">Suppresion d'une categorie</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="lead">Voulez-vous supprimer la catégorie : <span class="text-info"><?= $category->getLibelle() ?></span></p>
                                                            <p class="text-secondary"> <i class="fa fa-warning"></i> Veuillez noter que la suppression de cette catégorie entrainera la suppression de tous les articles qui ont comme categorie : <span class="text-danger"><?= $category->getLibelle() ?></span> </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-info" data-dismiss="modal">Non</button>
                                                            <a href="index.php?target=category&action=delete&categoryId=<?= $category->getId() ?>" type="button" class="btn btn-danger">Oui</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- End of Modal Supression-->


                                            <!-- Modal of Category Edition -->

                                            <div class="modal fade" id="CategoryModalEdition<?= $category->getId() ?>" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-danger">Mise à jour d'une categorie</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="lead">Voulez-vous mettre la catégorie : <span class="text-info"><?= $category->getLibelle() ?></span> à jour</p>
                                                            <p class="text-secondary"> <i class="fa fa-warning"></i> Veuillez noter que la mise à jour de cette catégorie entrainera la modification de la categorie de tous les articles qui ont comme categorie : <span class="text-danger"><?= $category->getLibelle() ?></span> </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-info" data-dismiss="modal">Non</button>
                                                            <a href="index.php?target=category&action=edit&categoryId=<?= $category->getId() ?>" type="button" class="btn btn-danger">Oui</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- End of Modal Edition -->
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach ?>

                        </ul>
                    </div>
                </div>
                <!-- End of Categoty Display -->
            </div>
        </div>





    </section>

    <!-- End of Section list news -->

    <!-- Start Footer -->

    <div class="bg-dark footer" style="position: relative !important;">

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        <div class="text-center text-white">
            <p id="text-footer">
                Copyright Blog-News 2021 By <a href="" target="__blank" class="text-warning">DGI</a>
            </p>
        </div>
    </div>
    <!-- End Of Footer -->

</body>

</html>