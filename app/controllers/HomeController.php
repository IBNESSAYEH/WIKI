<?php 

namespace App\controllers;

use Core\Controller;
use App\models\Wiki;
use App\models\Tag;
use App\models\Categorie;
class HomeController extends Controller
{
   private  $wikis;
   private  $tags;
   private  $categories;


   
    public function index(){
        // get all wikies to pass it into home page
        $this->wikis = new Wiki();
        $wikis = $this->wikis->getAllWikis(1);
       
        // get all tags to pass it into home page
        $this->tags = new Tag();
        $tags = $this->tags->getAllTags();
        // get all categories to pass it into home page
        $this->categories = new Categorie();
        $categories = $this->categories->getAllCategories();
       
      
        $this->view('home', [
            "wikis" => $wikis,
            "tags" => $tags,
            "categories" => $categories
            ]);
    }
}