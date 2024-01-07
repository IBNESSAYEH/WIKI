<?php 

namespace App\helpers;


class WikiHelper
{
    

private $id;
private $titre;
private $contenu;
private $id_categorie;	
private $id_user;
private $date_creation;


    public function getDateCreation()
    {
        return $this->date_creation;
    }

   
    public function setDateCreation($date_creation)
    {
        $this->date_creation = $date_creation;
    }
    public function getId()
    {
        return $this->id;
    }

   
    public function setId($id)
    {
        $this->id = $id;
    }


    public function getTitre()
    {
        return $this->titre;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }


    public function getContenu()
    {
        return $this->contenu;
    }


    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }


    public function getIdCategorie()
    {
        return $this->id_categorie;
    }


    public function setIdCategorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;
    }

    public function getIdUser()
    {
        return $this->id_user;
    }


    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }




}