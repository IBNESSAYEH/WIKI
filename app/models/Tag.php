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

}