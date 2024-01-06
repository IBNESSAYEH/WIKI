<?php

namespace Core;


class Controller
{
    private $filename;
    public function view($filename, $data = [])
    {
        $this->filename =  __DIR__ . "/../views/" . $filename . ".php";
        if(file_exists($this->filename)){
            require $this->filename;
        }else{
           require __DIR__ . "/../views/errors/_404.php";
        }
    }
}