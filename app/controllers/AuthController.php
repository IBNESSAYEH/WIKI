<?php 

namespace App\controllers;

use Core\Controller;
use App\models\Wiki;
use App\models\Tag;
use App\models\Categorie;
use App\models\User;
class AuthController extends Controller
{
   private  $wikis;

    public function signup(){
      
 
        $this->view('Authentification/signup', []);
    }
    public function signin(){
      
 
        $this->view('Authentification/signin', []);
    }
}