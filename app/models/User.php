<?php 

namespace App\models;

use App\helpers\UserHelper ;
class User extends UserHelper
{
    
    private $id;
    private $nom;
    private $email;
    private $isAdmin;	
    private $password;

    public function getId()
    {
        return $this->id;
    }

 
    public function setId($id)
    {
        $this->id = $id;
    }

  
    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    }

    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        $this->password = $password;
    }

    
}