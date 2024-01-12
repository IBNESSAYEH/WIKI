<?php

namespace App\controllers;

use App\models\Wiki;
use App\models\Categorie;
use App\models\Tag;
use App\models\WikiTag;
use App\models\User;
use Core\Controller;
class WikiController extends Controller
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
    public function create(){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $this->wiki->setTitre($_POST['titre']) ;
        $this->wiki->setContenu($_POST['contenu']) ;
        $this->wiki->setIdCategorie($_POST['categorie']) ;
        $this->wiki->setIdUser($_SESSION['id_user']) ;
        $id_wiki = $this->wiki->createWiki();
       foreach($_POST['tag'] as $tag){
        $this->wiki_tag->createWikiTag($id_wiki, $tag);
        header("Location: {$_SERVER['HTTP_REFERER']}");
       }
    }

    return false;
    }




    public function accept(){
       
        if(!isset($_POST["id"])){
          $this->view('bed_request.php');
        }
        $idWiki = intval(htmlspecialchars($_POST["id"])) ;
        $this->wiki->setId($idWiki);
        $this->wiki->UpdateWiki();
        header("Location: {$_SERVER['HTTP_REFERER']}");
exit;
    }
    public function delete($id){
        $this->wiki_tag->deleteWikiTag($id);
       $this->wiki->deleteWiki($id);
       header("Location: {$_SERVER['HTTP_REFERER']}");
    }
    public function edit($id){
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->wiki->setTitre($_POST['titre']);
            $this->wiki->setContenu($_POST['contenu']);
            $this->wiki->setIdCategorie($_POST['categorie']);
            $this->wiki_tag->deleteWikiTag($id);
            foreach($_POST['tag'] as $tag){
                $this->wiki_tag->createWikiTag($id, $tag);
                header("Location: {$_SERVER['HTTP_REFERER']}");
               }
            
            $this->wiki->editWiki($id); 
          
    
            header("Location: {$_SERVER['HTTP_REFERER']}");
        }
    }
    
}