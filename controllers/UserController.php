<?php


namespace controllers;
// Ro'zimuhammad


use models\Loginform;
use models\Register;
use vendor\myframe\Controller;

class UserController extends Controller
{
    public function register(){
        $this->layouts(false);
        $model = new Register();
        $model->registration();
        if ($model->registration()){
            $this->render('user/login');
        }else{
            $this->render('user/register');
        }


    }

    public function login(){
        $this->layouts(false);
        $user = new Loginform();
        if ($user->login()){
            $this->render('site/index');
        }else{
            $this->render('user/login');
        }
    }

    public function logout(){
        $model =  new Loginform();
        $model->logout();
    }
}