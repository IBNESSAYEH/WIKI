<?php 

namespace App\controllers;

use Core\Controller;
use App\models\Wiki;
use App\models\Tag;
use App\models\Categorie;
use App\models\WikiTag;
use App\models\User;
class TagController extends Controller
{
    private $wiki;
    private $tags;
    private $categorie;
    private $wiki_tag;


    public function __construct(){
        $this->wiki = new Wiki();
        $this->categorie = new Tag();
        $this->tags = new Tag();
        $this->wiki_tag = new WikiTag();
    }


    public function deleteTag($id){
        $this->wiki_tag->deleteWikiTag($id);
        $this->tags->deleteTag($id);
        header("Location: {$_SERVER['HTTP_REFERER']}");
        
    }
    public function updateTag($id){ 
        $nom =  $_POST['nom']; 
        $this->tags->setId($id);
        $this->tags->setNom($nom);
        $this->tags->updateTag();
        
        header("Location: {$_SERVER['HTTP_REFERER']}");

    }
    public function addTag(){ 
        $nom =  $_POST['nom'];
       
        $this->tags->setNom($nom);
        $this->tags->createTag();
        
        header("Location: {$_SERVER['HTTP_REFERER']}");

    }

}