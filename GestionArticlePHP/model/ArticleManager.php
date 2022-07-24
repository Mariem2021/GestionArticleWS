<?php

require_once './vue/includes/DatabaseManager.php';
require_once 'Article.php';


class ArticleManager
{
    protected $db;

    public function __construct()
    {
        $this->db = (new DatabaseManager)->createInstance();
    }

    /**
     * Method allows to get all articles from database
     */
    public function getAllArticles()
    {
        $q = $this->db->query('SELECT * FROM Article');
        return $q->fetchAll(PDO::FETCH_CLASS, 'Article');
    }

    /**
     * Method used for getting details of a single article
     */
    public function getSingleArticle($id)
    {
        $q = $this->db->prepare('SELECT * FROM Article WHERE id = :id');
        $q->execute([
            'id' => $id
        ]);

        return $q->fetchObject('Article');
    }

    /**
     * Method used to get all articles related to a specific catagory
     */
    public function getArticlesByCategory($id)
    {
        $q = $this->db->prepare('SELECT * FROM Article WHERE categorie = :id');
        $q->execute([
            'id' => $id
        ]);

        return $q->fetchAll(PDO::FETCH_CLASS, 'Article');
    }

    /**
     * Method used to get the category  of a article based on its category Id
     */
    public function getArticleCategory($categoryId)
    {
        $q = $this->db->prepare('SELECT libelle FROM Categorie where id = :id');
        $q->execute([
            'id' => $categoryId
        ]);

        return $q->fetchObject('Categorie')->getLibelle();
    }

    /**
     * Method used to add a new article
     */
    public function addArticle($article)
    {

        $q = $this->db->prepare('INSERT INTO ARTICLE(titre,contenu,categorie) VALUES(:title,:content,:category) ');
        $q->execute([
            'title' => $article->getTitre(),
            'content' => $article->getContenu(),
            'category' => $article->getCategorie(),
        ]);
    }

    /**
     * Method used to delete an article
     */
    public function deleteArticle($id){
        $q = $this->db->prepare('DELETE FROM Article WHERE id = :id');
        $q->execute([
            'id' => $id
        ]);

    }

    /**
     * Method used to update an existed article
    */
    public function updateArticle(Article $article){
        $q = $this->db->prepare('UPDATE Article SET titre=:title, contenu=:content, categorie=:category, dateModification=:dateModification WHERE id=:id');
        $q->execute([
            'title' => $article->getTitre(),
            'content' => $article->getContenu(),
            'category' => $article->getCategorie(),
            'dateModification' => (new \DateTime())->format('Y-m-d H:i:s'),
            'id' => $article->getId()
        ]);

    }
}
