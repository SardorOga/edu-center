<?php


namespace controllers;


use models\Fan;
use models\Subject;
use vendor\myframe\Controller;

class FanController extends Controller
{
    public function all()
    {
        session_start();
       if (!empty($_SESSION['user_id'])){
           $fan = new Fan();
           $models = $fan->getList();
           $pageCount = $fan->getPageCount();

           $this->render('fan/all' , [
               'models' => $models,
               'pageCount' => $pageCount,
           ]);
       }else{
           $this->redirect('user/login');
       }
    }

    public function create()
    {
        session_start();
        if (!empty($_SESSION['user_id'])){
            $fan = new Fan();
            if (!empty($_POST)){
                $name = $_POST['name'];
                $kurs_id = $_POST['kurs_id'];
                $status = $_POST['status'];
                if (!empty($name) && !empty($kurs_id) && !empty($status)){
                    if ($fan->create($name,$kurs_id , $status)){
                        header("Location:/fan/all");exit();
                    }
                }
            }
            $kurs = new Subject();
            $models = $kurs->getList();
            $this->render('fan/create' , [
                'models' => $models,
            ]);
        }else{
            $this->redirect('user/login');
        }

    }

    public function update($id)
    {
        session_start();
        if (!empty($_SESSION['user_id'])){
            $fan = new Fan();
            if(!empty($_POST)){
                $name = $_POST['name'];
                $kurs_id = $_POST['kurs_id'];
                $status = $_POST['status'];
                if (!empty($name) && !empty($kurs_id) && !empty($status)){
                    if ($fan->update($name , $kurs_id , $status , $id)){
                        $this->redirect('fan/all');
                    }
                }
            }
            $model = $fan->getById($id);
            $kurs = new Subject();
            $subjects = $kurs->getList();
            $this->render('fan/update' , [
                'fan' => $model,
                'subjects' => $subjects
            ]);
        }else{
            $this->redirect('user/login');
        }

    }

}