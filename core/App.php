<?php 

namespace Core;

use Core\Router;
class App
{
    private $router;
    public function __construct(){
        $this->router = new Router;
        $this->router->render();  
    }
}