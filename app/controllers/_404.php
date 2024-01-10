<?php 

namespace App\controllers;

use Core\Controller;
class _404 extends Controller
{
    public function __construct(){
        $this->view('errors/bed_request');
    }
    
}