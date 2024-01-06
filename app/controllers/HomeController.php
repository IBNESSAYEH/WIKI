<?php 

namespace App\controllers;

use Core\Controller;
class HomeController extends Controller
{
   
    public function index(){
        echo "hello index";
        $this->view('home');
    }
}