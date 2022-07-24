<?php

require_once './vue/includes/DatabaseManager.php';
require_once 'User.php';


class UserManager
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

    public function login($username,$mdp)
    {
        $q = $this->db->prepare('SELECT prenom,nom,username,mdp FROM users WHERE username= :username and mdp = :mdp');
        $q->execute([
            'username' => $username,
            'mdp' => md5($mdp)
        ]);

        return $q->fetchObject('User');
    }
}
