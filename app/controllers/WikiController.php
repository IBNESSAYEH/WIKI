<?php

namespace App\controllers;

use App\models\Wiki;
use Core\Controller;
class WikiController extends Controller
{

    private $wiki;
    public function create(){
       var_dump($_POST);
    }
    public function update(){
        $this->wiki = new Wiki();
        if(!isset($_POST["id"])){
            $this->view('bed_request.php');
        }
        $idWiki = intval(htmlspecialchars($_POST["id"])) ;
        $this->wiki->setId($idWiki);
        $this->wiki->UpdateWiki();
    }
}