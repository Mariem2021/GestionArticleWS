<?php

    require_once 'controlleur/controlleur.php';


    $controller = new Controller();

    $isConnected = $controller->isLogged();

?>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">news site<img src="../stylesheets/images/icon.png" height="50px" width="50px" alt=""> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler"  aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarToggler">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Accueil <i class="fa fa-home"></i>

                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Tous les articles Articles</a>
                </li>

            </ul>

            <!-- <ul class="navbar-nav ml-auto">

                <?php if ($isConnected) : ?>
                    <li class="nav-item mr-3 mt-3 mb-3 ">
                        <a class="nav-link active text-white btn btn-warning" href="index.php?target=article&action=add">Ajouter Article <i class="fa fa-plus"></i></a>
                    </li>

                    <li class="nav-item mt-3 mb-3">
                        <a class="nav-link active text-white btn btn-info " href="index.php?target=category&action=add">Ajouter Categorie <i class="fa fa-plus"></i></a>
                    </li>
                <?php else  : ?>
                    <li class="nav-item mr-3 mt-3 mb-3 ">
                        <a class="nav-link active text-white btn btn-success" href="index.php?target=login">Se connecter <i class="fa fa-user"></i></a>
                    </li>
                <?php endif ?>  

                    

            </ul> -->

        </div>
    </div>
</nav>