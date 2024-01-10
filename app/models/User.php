<?php 

namespace App\models;

use App\helpers\UserHelper ;
use Core\Database;
class User extends UserHelper
{
   
    private $connection;
    public function __construct(){
        $this->connection = new Database();
    }

    public function getAllUsers(){
        try{

            $query = $this->connection->getConnection()->prepare("SELECT * FROM users order by isAdmin desc");
            $query->execute();
            $result = $query->fetchAll(\PDO::FETCH_OBJ);
            return !empty($result) ? $result : false;
        }catch(\PDOException $e) {
            echo "Error: " . $e->getMessage();
       
        } 
    }

    

}