<?php

namespace controllers;

use models\User;
use vendor\myframe\Controller;
use vendor\myframe\Views;

class SiteController extends Controller
{
    public function index(){
        session_start();
        if (!empty($_SESSION['user_id'])){
            $user = new User();
            $model = $user->getById($_SESSION['user_id']);
            $this->render('site/index' , [
                'model' => $model,
            ]);
        }else{
            $this->render('user/login');
        }

    }

    public function contact()
    {
        echo "Bu contact actioni";
    }

    public function update($id){
        $this->view->render('site/update');
    }
}