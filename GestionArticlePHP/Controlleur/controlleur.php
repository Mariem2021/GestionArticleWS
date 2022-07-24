<?php

require_once './model/ArticleManager.php';
require_once './model/CategoryManager.php';
require_once './model/UserManager.php';


class Controller
{

    protected $articleManager;
    protected $categoryManager;
    protected $usermanager;
    protected $isConnected = false;

    public function __construct()
    {
        $this->articleManager = new ArticleManager();
        $this->categoryManager = new CategorieManager();
        $this->usermanager = new UserManager();
    }


    public function home($category = 'all')
    {
        $isEditor = false;

        if($this->isConnected){
            $isEditor = true;
        }
        if ($category == 'all') {
            $articles = $this->articleManager->getAllArticles();
            $articles = array_reverse($articles);
        } else {
            $categoryId = $this->categoryManager->getIdCategory($category);

            $articles = $this->articleManager->getArticlesByCategory($categoryId);
            $articles = array_reverse($articles);
        }


        $categories = $this->categoryManager->getAllCategory();

        require_once './vue/articles/list_articles.php';
    }

    
    public function displaySingleArticle($id)
    {

        $article = $this->articleManager->getSingleArticle($id);

        $category = $this->articleManager->getArticleCategory($article->getCategorie());

        require_once './vue/articles/article_details.php';
    }

   
    public function addArticle()
    {

        if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['category'])) {

            $article = new Article();

            $article->setTitre($_POST['title']);
            $article->setContenu($_POST['content']);
            $article->setCategorie($_POST['category']);

            $this->articleManager->addArticle($article);

            $this->home();
        } else {

            $categories = $this->categoryManager->getAllCategory();

            require_once './vue/articles/add_article.php';
        }
    }

    public function deleteArticle($id)
    {
        $this->articleManager->deleteArticle($id);

        $this->home();
    }

    public function updateArticle($id)
    {

        $article = $this->articleManager->getSingleArticle($id);

        if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['category'])) {


            $article->setTitre($_POST['title']);
            $article->setContenu($_POST['content']);
            $article->setCategorie($_POST['category']);

            $this->articleManager->updateArticle($article);

            $this->displaySingleArticle($article->getId());
        } else {

            $categories = $this->categoryManager->getAllCategory();

            require_once './vue/articles/edit_article.php';
        }
    }

    /**
   * Method used to add a new Category
     */  
    public function addCategory()
    {

        if (!empty($_POST['libelle'])) {

            $reponse =  $this->categoryManager->addCategory($_POST['libelle']);

            if ($reponse == false) {
                $erreur = 'Impossible d\'ajouter cette catégorie, elle existe déja !';
                require_once './vue/categories/add_category.php';
            }else{
                $this->home();
            }
        } else {
            require_once './vue/categories/add_category.php';
        }
    }

    public function deleteCategory($id){
        $this->categoryManager->deleteCategory($id);
        $this->home();
    }

    /**
     * Method used to update  a category
     */
    public function updateCategory($idCategory){

        $category = $this->categoryManager->getSingleCategory($idCategory);

        if (!empty($_POST['libelle'])) {

            $response =  $this->categoryManager->isCategoryExist($_POST['libelle']);

            if ($response == true) {
                $error = 'Impossible de mettre à jour cette catégorie, car elle existe déja !';
                require_once './vue/categories/edit_category.php';
            }else{
                $category->setLibelle($_POST['libelle']);
                $this->categoryManager->updateCategory($category);
                $this->home();
            }
        } else {
            require_once './vue/categories/edit_category.php';
        }
    }

    /**
     * Method used to handle user connexion
     */
    public function login()
    {
        $notConnected  = false;
        if (!empty($_POST['username']) && !empty($_POST['password']) ) {

            $result = $this->usermanager->login($_POST['username'],$_POST['password']);
            // var_dump(($result));

            if($result){
                $this->isConnected = true;
                $isUser = true;
                $this->home();
            }else{
                $notConnected = true;
                require_once './vue/authentification/login.php';
            }

           
        } else {
            require_once './vue/authentification/login.php';
        }
    }

    public function isLogged()
    {
        if($this->isConnected){
            return true;
        }
        return false;
    }
}
