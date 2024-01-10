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
    
}