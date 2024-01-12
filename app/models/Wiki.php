<?php 

namespace App\models;


use App\helpers\WikiHelper ;
use Core\Database;
use PDO;
class Wiki extends WikiHelper
{
    private $connection;
    public function __construct(){
        $this->connection = new Database();
    }

    public function getAllWikis($isAccepted){
        try{

            $query = $this->connection->getConnection()->prepare("SELECT * FROM wiki where isAccepted = $isAccepted order by date_creation desc");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return !empty($result) ? $result : false;
        }catch(\PDOException $e) {
            echo "Error: " . $e->getMessage();
       
        }

    }
    public function UpdateWiki(){
        try{

            $query = $this->connection->getConnection()->prepare("UPDATE wiki SET isAccepted = :isAccepted WHERE id = :id");
            $query->bindValue(':id', $this->getId());
            $query->bindValue(':isAccepted', 1);
            $query->execute();
            
        }catch(\PDOException $e) {
            echo "Error: " . $e->getMessage();
       
        }

    }
    public function editWiki($id){
        try{

            $query = $this->connection->getConnection()->prepare("UPDATE wiki SET `titre`= :titre,`contenu`= :contenu,`id_categorie`= :id_categorie  WHERE id = :id");
            $query->bindValue(':titre', $this->getTitre());
            $query->bindValue(':contenu', $this->getContenu());
            $query->bindValue(':id_categorie', $this->getIdCategorie());
            
            $query->bindValue(':id', $id);
            
            $query->execute();
            
        }catch(\PDOException $e) {
            echo "Error: " . $e->getMessage();
       
        }

    }
    public function editCategorieId($id){
        try{

            $query = $this->connection->getConnection()->prepare("UPDATE wiki SET `id_categorie`= :id_categorie  WHERE id_categorie = :id");

            $query->bindValue(':id_categorie', null);
            
            $query->bindValue(':id', $id);
            
            $query->execute();
            
        }catch(\PDOException $e) {
            echo "Error: " . $e->getMessage();
       
        }

    }
    public function createWiki()
    {
        $query = $this->connection->getConnection()->prepare("INSERT INTO wiki(titre, contenu, id_categorie, id_user, isAccepted) VALUES(:titre, :contenu, :id_categorie, :id_user, :isAccepted)");
        $query->bindValue(':titre', $this->getTitre());
        $query->bindValue(':contenu', $this->getContenu());
        $query->bindValue(':id_categorie', $this->getIdCategorie());
        $query->bindValue(':id_user', $this->getIdUser());
        $query->bindValue(':isAccepted', 0);
        $query->execute();

        // retourne le id de cette wiki 
        $lastInsertId = $this->connection->getConnection()->lastInsertId();

        return $lastInsertId;
    }

    public function getWikiById($id)
    {
        $query = $this->connection->getConnection()->prepare("SELECT * FROM wiki WHERE id = :id");
        $query->bindValue(':id', $id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);

        return !empty($result) ? $result : false;
    }

    

    public function deleteWiki($id)
    {
        $query = $this->connection->getConnection()->prepare("DELETE FROM wiki WHERE id = :id");
        $query->bindValue(':id', $id);
        $query->execute();
    }


    public function getAllWikisInfo(){
        try {
            $query = $this->connection->getConnection()->prepare("SELECT
                wiki.id AS wiki_id,
                wiki.titre AS wiki_titre,
                wiki.contenu AS wiki_contenu,
                wiki.date_creation AS wiki_date,
                categorie.nom AS categorie_nom,
                GROUP_CONCAT(tag.nom) AS tag_nom,
                users.nom AS user_nom
            FROM
                wiki
                INNER JOIN categorie ON wiki.id_categorie = categorie.id
                LEFT JOIN wikiTag ON wiki.id = wikiTag.id_wiki
                LEFT JOIN tag ON wikiTag.id_tag = tag.id
                LEFT JOIN users ON wiki.id_user = users.id
            GROUP BY
                wiki.id;
            ");
    
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return !empty($result) ? $result : false;
        }catch(\PDOException $e) {
            echo "Error: " . $e->getMessage();
       
        }
    }
    
    
}