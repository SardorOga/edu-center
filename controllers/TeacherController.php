<?php


namespace controllers;



use models\Teacher;
use vendor\myframe\Controller;

class TeacherController extends Controller
{
    public function all(){

        session_start();
        if (!empty($_SESSION['user_id'])){
            $model = new  Teacher();
            $models = $model->getList();
            $pageCount = $model->getPageCount();
            $this->render('teacher/all' , [
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
            $model = new Teacher();
            if (!empty($_POST)){

                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $gender = $_POST['gender'];
                $email = $_POST['email'];
                $experience = $_POST['experience'];
                $specialty = $_POST['specialty'];
                $phone = $_POST['phone'];

                if (!empty($first_name) && !empty($last_name) && !empty($gender) && !empty($email) && !empty($experience) && !empty($specialty) && !empty($phone)){
                    if ($model->create($first_name,$last_name,$gender,$email,$experience,$specialty,$phone)){
                        header('Location:/teacher/all');
                    }
                }
            }
            $this->render('teacher/create');
        }else{
            $this->redirect('user/login');
        }

    }

    public function update($id)
    {
        session_start();
        if (!empty($_SESSION['user_id'])){
            $model = new Teacher();
            $teacher = $model->getById($id);
            if (!empty($_POST)){

                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $gender = $_POST['gender'];
                $email = $_POST['email'];
                $experience = $_POST['experience'];
                $specialty = $_POST['specialty'];
                $phone = $_POST['phone'];

                if (!empty($first_name) && !empty($last_name) && !empty($gender) && !empty($email) && !empty($experience) && !empty($specialty) && !empty($phone)){
                    if ($model->update($first_name,$last_name,$gender,$email,$experience,$specialty,$phone,$id)){
                        header('Location:/teacher/all');
                    }
                }
            }
            $this->render('teacher/update' , [
                'model' => $teacher,
            ]);
        }else{
            $this->redirect('user/login');
        }


    }

    public function delete($id){
        $model = new Teacher();
        $model->delete($id);
        if ($model->delete($id)){
            header('Location:/teacher/all');
        }
    }

    public function sortName()
    {
        echo "vhasilugaiugf";
        return "sort";
    }


}