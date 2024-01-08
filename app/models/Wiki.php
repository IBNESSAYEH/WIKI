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

}