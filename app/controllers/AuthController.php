<?php 

namespace App\controllers;

use Core\Controller;
use App\models\User;
use App\models\Auth;
class AuthController extends Controller
{
  
    private $user;
   
    public function __construct(){
        $this->user = new Auth();
    }

    public function signup(){
      
        $this->view('Authentification/signup');
    }
    public function signin(){
      
        $this->view('Authentification/signin');
    }
    public function register(){
        $this->RegisterValidation();
        
        $this->user->register();
        
        header("location: http://localhost:8000/auth/signin");
        
    }
    public function login(){
        $this->LoginValidation();
       $exists = $this->user->login() ;
       if(!$exists){
        header("location: http://localhost:8000/auth/signin");
       }else{
           $_SESSION["isAdmin"]= $exists->isAdmin;
           $_SESSION["id_user"]= $exists->id;
        if($exists->isAdmin){
            header("location: http://localhost:8000/admin");
           }else{
            header("location: http://localhost:8000");
           }
       }
        
    }

    public function logout(){
        $this->user->logout();
        header("location: http://localhost:8000/auth/signup");
    }
    public function RegisterValidation()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nom = $this->validateNom();
            $email = $this->validateEmail();
            $password = $this->validatePassword();
            $this->user->setNom($nom);
            $this->user->setEmail($email);
            $this->user->setPassword($password);

            return true;
        }

        return false;
    }

    public function LoginValidation()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $this->validateEmail();
            $password = $this->validatePassword();
            
            $this->user->setEmail($email);
            $this->user->setPassword($password);

            return true;
        }

        return false;
    }

    private function validateNom()
    {
        if (isset($_POST["nom"]) && strlen($_POST["nom"]) > 2) {
            return htmlspecialchars($_POST["nom"]);
        }

        return false;
    }

    private function validateEmail()
    {
        if (isset($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            return htmlspecialchars($_POST["email"]);
        }

        return false;
    }

    private function validatePassword()
    {
        if (isset($_POST["password"]) && strlen($_POST["password"]) >= 8 && preg_match('/[A-Z]/', $_POST["password"]) && preg_match('/\d/', $_POST["password"]) && preg_match('/[^A-Za-z\d]/', $_POST["password"]) )
     {
        return htmlspecialchars($_POST["password"]);
    }

    return false;
    }
}