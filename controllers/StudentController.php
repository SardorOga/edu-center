<?php


namespace controllers;


use models\Student;
use vendor\myframe\Controller;
use vendor\myframe\Request;

class StudentController extends Controller
{
    public function all(){
        session_start();
        if (!empty( $_SESSION['user_id'])){
            $request = new Request();
            $page = $request->page;
            $sort = $request->sort;
            $student = new Student();
            $models = $student->getList();
            $pageCount = $student->getPageCount();
            $this->view->render('student/all' , [
                'models' => $models,
                'pageCount' => $pageCount,
                'page' => $page,
                'sort' => $sort,
            ]);
        }else{
            $this->redirect('user/login');
        }

    }

    public function create()
    {
        session_start();
        if (!empty( $_SESSION['user_id'])){
            if (!empty($_POST)){

                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $date_birth = date('Y-m-d' , strtotime($_POST['date_birth']));
                $gender = $_POST['gender'];
                $adress= $_POST['adress'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];

                if (isset($first_name) && isset($last_name) && isset($date_birth) && isset($gender) && isset($adress) && isset($adress) && isset($email) && isset($phone)){
                    $student = new Student();
                    if ($student->add($first_name,$last_name,$date_birth,$gender,$adress,$email,$phone)){
                        header('Location:/student/all');
                    }
                }
            }
            $this->render('student/create');
        }else{
            $this->redirect('user/login');
        }

    }

    public function update($id)
    {
        session_start();
        if (!empty( $_SESSION['user_id'])){
            $student = new Student();
            $model = $student->getById($id);
            if (!empty($_POST)){
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $date_birth = date('Y-m-d' , strtotime($_POST['date_birth']));
                $gender = $_POST['gender'];
                $adress= $_POST['adress'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                if (isset($first_name) && isset($last_name) && isset($date_birth) && isset($gender) && isset($adress) && isset($adress) && isset($email) && isset($phone)){
                    if ($student->update($first_name,$last_name,$date_birth,$gender,$adress,$email,$phone , $id)){

                        header('Location:/student/all');exit();
                    }
                }
            }
            if (!empty($model)){
                $this->view->render('student/update' , [
                    'model' => $model,
                ]);

            }else{
                echo "OKA QATTAN PAYDO BOP QOLDIZ";
                header("Refresh:3; url=/student/all");
            }
        }else{
            $this->redirect('user/login');
        }

    }

    public function delete($id){
        $student = new Student();
        $student->delete($id);
        if ($student->delete($id)){
            header('Location:/student/all');
        }
    }

}