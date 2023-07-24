<?php

namespace vendor\myframe;

class Application
{
    private $id = null;
    public $defaultController = 'SiteController';
    public $defatultAction = 'index';
    public function run()
    {
        $arr = $_SERVER['REQUEST_URI'];
        $newArr = explode('/' ,trim($arr , '/'));

        if ($arr == '' || $arr === '/' || $arr === '/index.php'){
            $className = "controllers\\".$this->defaultController;
            $action = $this->defatultAction;
        }else{
            $index = 0;
            if ($newArr[0] !== 'index.php'){
                $index = 1;
            }

            $className = ucfirst($newArr[1 - $index])."Controller";
            $className = "controllers\\".$className;
            if (strpos($newArr[2 - $index] , '?')){
                $gets = explode('?' , $newArr[2 - $index]);
                $action = $gets[0];
            }else{
                $action = $newArr[2 - $index];
            }

            if (isset($newArr[3 - $index])){
                $this->id = $newArr[3 - $index];
            }
        }


        $site = new $className();
        if (is_null($this->id)){
            $site->{$action}();
        }else{
            $site->{$action}($this->id);
        }

    }

}