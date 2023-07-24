<?php


namespace vendor\myframe;


class Request
{
    public $page = 1;
    public $sort = 'desc';
    public $column_name = 'id';

    public function __construct()
    {
        if (isset($_GET['page'])){
            $this->page = $_GET['page'];
            if (!empty($_GET['sort'])){
                $this->sort = $_GET['sort'];
            }
            if (!empty($_GET['column_name'])){
                $this->column_name = $_GET['column_name'];
            }

        }
    }

}