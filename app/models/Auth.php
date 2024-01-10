<?php 

namespace App\models;

use App\helpers\UserHelper;
use Core\Database;
class Auth extends UserHelper
{

    private $connection;
    private $user;
    public function __construct(){
        $this->connection = new Database();
        $this->user = new UserHelper();
    }

    public function register(){
        try{

            $query = $this->connection->getConnection()->prepare("INSERT INTO users (nom, email, password, isAdmin) values(:nom, :email, :password, :isAdmin) ");
            $query->bindValue(':nom', $this->getNom());
            $query->bindValue(':email', $this->getEmail());
            $query->bindValue(':password', $this->getPassword());
            $query->bindValue(':isAdmin', 2);
            $query->execute();
            
        }catch(\PDOException $e) {
            echo "Error: " . $e->getMessage();
       
        }
    }
    public function login(){
        try{
            $query = $this->connection->getConnection()->prepare("SELECT id, email, password, isAdmin FROM users WHERE email = :email and password = :password");  
            $query->bindValue(':email', $this->getEmail());
            $query->bindValue(':password', $this->getPassword());
            
            $query->execute();
            $result = $query->fetch(\PDO::FETCH_OBJ);
            return !empty($result) ? $result : false;
        }catch(\PDOException $e) {
            echo "Error: " . $e->getMessage();
       
        } 
    }


    public function logout(){
        session_destroy();
    }

}