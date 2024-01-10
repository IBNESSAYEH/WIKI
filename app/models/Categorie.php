<?php 

namespace App\models;

use App\helpers\CategorieHelper ;
use Core\Database;
use PDO;
class Categorie extends CategorieHelper
{
    
    private $connection;
    public function __construct(){
        $this->connection = new Database();
    }

    public function getAllCategories(){
        try{

            $query = $this->connection->getConnection()->prepare("SELECT * FROM categorie");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return !empty($result) ? $result : false;
        }catch(\PDOException $e) {
            echo "Error: " . $e->getMessage();
       
        }

    }

    public function createCategory()
    {
        $query = $this->connection->getConnection()->prepare("INSERT INTO categorie (nom) VALUES (:nom)");
        $query->bindValue(':nom', $this->getNom());
        $query->execute();
    }

   
    public function updateCategory()
    {
        $query = $this->connection->getConnection()->prepare("UPDATE categorie SET nom = :nom WHERE id = :id");
        $query->bindValue(':id', $this->getId());
        $query->bindValue(':nom', $this->getNom());
        $query->execute();
    }

  
    public function deleteCategory($id)
    {
        $query = $this->connection->getConnection()->prepare("DELETE FROM categorie WHERE id = :id");
        $query->bindValue(':id', $id);
        $query->execute();
    }

}