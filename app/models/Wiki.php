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

    public function getAllWikis(){
        try{

            $query = $this->connection->getConnection()->prepare("SELECT * FROM wiki");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return !empty($result) ? $result : false;
        }catch(\PDOException $e) {
            echo "Error: " . $e->getMessage();
       
        }

    }

}