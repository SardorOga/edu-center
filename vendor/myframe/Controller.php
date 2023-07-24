<?php


namespace vendor\myframe;


class Controller
{
    public $view;
    public $userId;
    public function __construct()
    {
        $this->view = new Views();
    }

    public function render($url, $data = null)
    {
        $this->view->render($url, $data);
    }

    public function layouts($bool){
        $this->view->wid = $bool;
    }

    public function redirect($url){
        header("Location:/$url");exit();
    }

    public function debug($arr)
    {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }


}