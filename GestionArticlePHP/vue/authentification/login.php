<?php ?>

<!DOCTYPE html>
<html lang="fr">



<body>

    <?php
    //require_once 'includes/header.php';
    //require_once 'includes/navigation.php';
    ?>



    <section class="container mt-5">
        <h1>Connexion <i class="fa fa-user text-info"></i></h1>

        <form action="index.php?target=login" method="POST">
           
            <div class="mb-3">
                <label for="username" class="form-label">Nom d'utilisateur</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de Passe</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>

            <?php if($notConnected) : ?>
                <div class="alert alert-danger">
                    Login ou Mot de passe incorrects
                </div>
            <?php endif ?>
           
            <div class="text-left">
                <a href="../index.php" class="btn btn-dark mt-4">Retour <i class="fa fa-home"></i></a>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-success ">Se connecter <i class="fa fa-check"></i></button>
            </div>
        </form>
    </section>

    <!-- Section Footer -->

    <?php
    //require_once 'includes/footer.php';
    ?>

    <!-- End of Section Footer -->

</body>

</html>
