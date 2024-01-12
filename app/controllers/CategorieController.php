<?php 

namespace App\controllers;

use Core\Controller;
use App\models\Wiki;
use App\models\Tag;
use App\models\Categorie;
use App\models\WikiTag;
use App\models\User;
class CategorieController extends Controller
{
    private $wiki;
    private $tags;
    private $categorie;
    private $wiki_tag;


    public function __construct(){
        $this->wiki = new Wiki();
        $this->categorie = new Categorie();
        $this->tags = new Tag();
        $this->wiki_tag = new WikiTag();
    }


    public function deleteCategorie($id){

        $this->wiki->editCategorieId($id);
        $this->categorie->deleteCategory($id);
        header("Location: {$_SERVER['HTTP_REFERER']}");
        
    }
    public function editCategorie($id){ 
        // var_dump($_POST);die();
        $nom =  $_POST['nom'];
        $this->categorie->setId($id);
        $this->categorie->setNom($nom);
        $this->categorie->updateCategory();
        
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }
}