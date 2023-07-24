<?php


namespace controllers;


use models\Room;
use models\Subject;
use models\Teacher;
use vendor\myframe\Controller;

class SubjectController extends Controller
{
    public function all()
    {
        session_start();
        if (!empty($_SESSION['user_id'])){
            $subject = new Subject();
            $models = $subject->getList();
            $pageCount = $subject->getPageCount();

            $this->render('/subject/all' , [
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
            $model = new Subject();
            if (!empty($_POST)){
                $name = $_POST['name'];
                $in_week = $_POST['in_week'];
                $even_or_odd = $_POST['even_or_odd'];
                $start_date = $_POST['start_date'];
                $end_date = $_POST['end_date'];
                $price = $_POST['price'];
                $room_id= $_POST['room_id'];
                $teacher_id = $_POST['teacher_id'];

                if (!empty($name) && !empty($in_week) && !empty($even_or_odd) && !empty($start_date) && !empty($end_date) && !empty($price) && !empty($room_id) && !empty($teacher_id)){
                    if ($model->add($name,$in_week,$even_or_odd,$start_date,$end_date,$price,$room_id,$teacher_id)){
                        header('Location:/subject/all');
                    }
                }
            }

            $rooms = new Room();
            $teacher = new Teacher();
            $teachers = $teacher->getList();
            $room_id = $rooms->getList();
            $this->render('/subject/create' , [
                'room_id' => $room_id,
                'teachers' => $teachers,
            ]);
        }else{
            $this->redirect('user/login');
        }

    }

    public function update($id)
    {
        session_start();
        if (!empty($_SESSION['user_id'])){
            $model = new Subject();
            if (!empty($_POST)){
                $name = $_POST['name'];
                $in_week = $_POST['in_week'];
                $even_or_odd = $_POST['even_or_odd'];
                $start_date = $_POST['start_date'];
                $end_date = $_POST['end_date'];
                $price = $_POST['price'];
                $room_id= $_POST['room_id'];
                $teacher_id = $_POST['teacher_id'];

                if (!empty($name) && !empty($in_week) && !empty($even_or_odd) && !empty($start_date) && !empty($end_date) && !empty($price) && !empty($room_id) && !empty($teacher_id)){
                    if ($model->update($name,$in_week,$even_or_odd,$start_date,$end_date,$price,$room_id,$teacher_id , $id)){
                        header('Location:/subject/all');
                    }
                }
            }
            $item = $model->getById($id);
            $rom = new Room();
            $room_id = $rom->getList();
            $teacher = new Teacher();
            $teachers = $teacher->getList();
            $this->render('/subject/update' , [
                'item' => $item,
                'room_id' => $room_id,
                'teachers' => $teachers,
            ]);
        }else{
            $this->redirect('user/login');
        }

    }

    public function delete($id){
        $model = new Subject();
        $model->delete($id);
        if ($model->delete($id)){
            header('Location:/subject/all');
        }
    }
    //push
    public function delete($id)
    {
        
        $student = new Student();
        $student->delete($id);
        header("Location: /index.php/student/list");
        exit();
    }
    

    public function afterUpdate(){
        if ($this->update()){
            echo "hammasi ok!";
        }else{
            echo "after update funksiya ishlamadi";
        }
    }

}