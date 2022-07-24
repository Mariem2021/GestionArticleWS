<?php
	
	require_once './vue/includes/DatabaseManager.php';
    require_once 'Category.php';
    require_once 'Article.php';
    require_once 'ArticleManager.php';



	class CategorieManager
	{
		protected $id;
		protected $db;
		protected $libelle;
        protected $articleManager;

		public function __construct()
		{
			$this->db = (new DatabaseManager)->createInstance();
            $this->articleManager = new ArticleManager();
		}

        /**
         * Method used to get All Category
         */
		public function getAllCategory()
		{
			$q = $this->db->query('SELECT * FROM Categorie');
			return $q->fetchAll(PDO::FETCH_CLASS, 'Categorie');
			
		}


        /**
         * Method used to get the Id of a given category based on its libelle
         */
        public function getIdCategory($libelle){
            $q = $this->db->prepare('SELECT id FROM Categorie WHERE libelle = :libelle');
            $q->execute([
                'libelle' => $libelle
            ]);
            return $q->fetchObject('Categorie')->getId();
        }

        /**
         * Method used to get an entire category
         */
        public function getSingleCategory($idCategory){
            $q = $this->db->prepare('SELECT * FROM Categorie WHERE id = :idCategory');
            $q->execute([
                'idCategory' => $idCategory
            ]);
            
            return $q->fetchObject('Categorie');
        }

        /**
         * Method used to add a new category
         */
        public function addCategory($libelle){
            $q = $this->db->prepare('SELECT libelle FROM Categorie WHERE libelle = :libelle');
            $q->execute([
                'libelle' => ucfirst($libelle)
            ]);
            $cat = $q->fetchObject('Categorie');

            if($cat){
                return false;
            }else{
                $q = $this->db->prepare('INSERT INTO Categorie(libelle) VALUES(:libelle)');
                $q->execute([
                    'libelle' => ucfirst($libelle)
                ]);
                return true;
            }

        }

        /**
         * Method used to delete a category and all related articles
         */
        public function deleteCategory($id){
            $q = $this->db->prepare('SELECT * FROM Article WHERE categorie = :categoryId');
            $q->execute([
                'categoryId' => $id
            ]);
            
            $relatedArticles = $q->fetchAll(PDO::FETCH_CLASS,'Article');

            foreach($relatedArticles as $article){
              $this->articleManager->deleteArticle($article->getId());
            }

            $q = $this->db->prepare('DELETE FROM Categorie WHERE id=:categoryId');
            $q->execute([
                'categoryId' => $id  
            ]);
        }

        public function isCategoryExist($libelle){
            $q = $this->db->prepare('SELECT * FROM Categorie WHERE libelle=:libelle');
            $q->execute([
                'libelle'=> ucfirst(strtolower($libelle))
            ]);
            $cat = $q->fetchObject('Categorie');

            if($cat)
                return true;
            else  
                return false;
        }
        /**
         * Method used to update a category
         */
        public function updateCategory(Categorie $category){
            $q = $this->db->prepare('UPDATE Categorie SET libelle=:libelle WHERE id = :categoryId');
            $q->execute([
                'libelle' => $category->getLibelle(),
                'categoryId' => $category->getId()
            ]);
        }
	}
