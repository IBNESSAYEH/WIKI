<?php 

namespace App\helpers;


class CategorieHelper
{
    

private $id;
private $nom;

  
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



}