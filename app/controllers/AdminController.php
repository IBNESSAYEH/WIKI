<?php 

namespace App\controllers;

use Core\Controller;
use App\models\Wiki;
use App\models\Tag;
use App\models\Categorie;
use App\models\User;
class AdminController extends Controller
{
   private  $wikis;
   private  $tags;
   private  $categories;
   private  $users;
    public function index(){
        // get all wikies to pass it into home page
        $this->wikis = new Wiki();
        $wikis = $this->wikis->getAllWikis(0);
        // get all tags to pass it into home page
        $this->tags = new Tag();
        $tags = $this->tags->getAllTags();
        // get all categories to pass it into home page
        $this->categories = new Categorie();
        $categories = $this->categories->getAllCategories();
        // get all categories to pass it into admin page
        $this->users = new User();
        $users = $this->users->getAllUsers();
 
        $this->view('admin/dashboard', [
            "wikis" => $wikis,
            "tags" => $tags,
            "categories" => $categories,
            "users" => $users
            ]);
    }
}