<?php 

namespace App\models;

use App\helpers\TagHelper ;
use Core\Database;
use PDO;
class Tag extends TagHelper
{
    

    private $connection;
    public function __construct(){
        $this->connection = new Database();
    }

    public function getAllTags(){
        try{

            $query = $this->connection->getConnection()->prepare("SELECT * FROM Tag");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return !empty($result) ? $result : false;
        }catch(\PDOException $e) {
            echo "Error: " . $e->getMessage();
       
        }

    }

    public function createTag()
    {
        $query = $this->connection->getConnection()->prepare("INSERT INTO tag (nom) VALUES (:nom)");
        $query->bindValue(':nom', $this->getNom());
        $query->execute();
    }


    public function updateTag()
    {
        $query = $this->connection->getConnection()->prepare("UPDATE tag SET nom = :nom WHERE id = :id");
        $query->bindValue(':id', $this->getId());
        $query->bindValue(':nom', $this->getNom());
        $query->execute();
    }


    public function deleteTag($id)
    {
        $query = $this->connection->getConnection()->prepare("DELETE FROM tag WHERE id = :id");
        $query->bindValue(':id', $id);
        $query->execute();
    }

}