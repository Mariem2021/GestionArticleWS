<?php

require_once 'controlleur/controlleur.php';

$controller = new Controller();

if (!isset($_GET['target']) or empty($_GET['target'])) {
    return $controller->home();
}

$target = $_GET['target'];

switch ($target) {

    case 'article':
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            return $controller->displaySingleArticle($_GET['id']);
        }

        if (!empty($_GET['action'])) {

            $action = $_GET['action'];

            if ($action == 'add') {
                return $controller->addArticle();
            }

            if ($action == 'delete') {
                return $controller->deleteArticle($_GET['articleId']);
            }

            if ($action == 'edit') {
                return $controller->updateArticle($_GET['articleId']);
            }
        }

        return $controller->home();

        break;


    case 'articles':
        if (isset($_GET['category']) && !empty($_GET['category'])) {
            return $controller->home($_GET['category']);
        }

        return $controller->home();

        break;

    case 'category':
        if (!empty($_GET['action'])) {
            $action = $_GET['action'];

            switch ($action) {
                case 'add':
                    return $controller->addCategory();
                    break;

                case 'delete':
                    return $controller->deleteCategory($_GET['categoryId']);
                    break;

                case 'edit':
                    return $controller->updateCategory($_GET['categoryId']);
            }
        }

        break;

    case 'login':
        return $controller->login();
        break;
}
