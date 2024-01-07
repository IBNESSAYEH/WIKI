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

}