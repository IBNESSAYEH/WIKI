<?php 

namespace Core;

use App\controllers\HomeController;
use App\controllers\_404;
class Router
{
    private $controller;
    private $method;
    private $params;
    private $uri;

  

    public function render(){
        $this->prepareURL();
        $this->getController();
        $this->getMethod();
        $this->getParams();

        $this->checkClassExists();

    }

    private function checkClassExists(){
   

        if(class_exists($this->controller)){
            $this->controller = new $this->controller();
            $this->checkMethodExists();
          
        }else{
            $this->controller = new _404;
        }

    }
    private function checkMethodExists(){
   

        if(method_exists($this->controller,$this->method)){
            call_user_func_array([$this->controller,$this->method],$this->params);
        }else{
            $this->controller = new _404;
        }

    }

    private function prepareURL(){
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->uri = trim($this->uri, "/");
        $this->uri = strtolower($this->uri);
        $this->uri = explode("/", $this->uri);
        
    }

    private function getController(){
        $this->prepareURL();
        if(!empty($this->uri[0])){

            $this->controller = "App\\controllers\\" . ucfirst($this->uri[0]) . "Controller";
            
            
        }else {
            $this->controller = "App\\controllers\\HomeController";
          
        }
    }
    private function getMethod(){
        $this->prepareURL();
        if(!empty($this->uri[1])){

            $this->method = $this->uri[1];
        }else {
            $this->method = 'index';
        }
    }

    private function getParams(){
        $this->prepareURL();
        

        $this->params = count($this->uri) > 2 ? array_slice($this->uri, 2) : [];
        
    }

}





