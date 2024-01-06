<?php 

namespace App\models;

use App\helpers\TagHelper ;
class Tag extends TagHelper
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