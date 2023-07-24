<?php


namespace vendor\myframe;


class Views
{
    public $wid = true;
    public function render($url, $data = null)
    {
        if (!is_null($data)){
            extract($data);
        }
        if ($this->wid){
            include "views/layout/main.php";
        }

        include "views/$url.php";

        if ($this->wid){
            include 'views/layout/footer.php';
        }
    }




}