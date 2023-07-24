<?php


namespace controllers;


use models\Product;
use PDO;
use PDOException;
use vendor\myframe\ConnectDB;
use vendor\myframe\Controller;
use vendor\myframe\Views;

class ProductController extends Controller
{

    function getCoursesBySearch($column,$search,$page)
    {
        include "./config/config.php";
        $offset = ($page - 1) * PAGE_LIMIT;
        $search = '%'.$search.'%';
        $sql = "select * from courses c 
                inner join teachers t on t.teacher_id = c.teacher_id 
                where ".$column." like '".$search."' limit ".$offset.",".PAGE_LIMIT;
        /** @var PDO $con */
        $stmt = $con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


//SELECT * FROM  (SELECT * FROM students LIMIT 0,5) AS students WHERE name LIKE `1` OR name LIKE `%1%`


    /** Course table */

    function getList(float|int|string $id)
    {
        include "./config/config.php";
        $sql = 'SELECT * FROM courses WHERE course_id = :id';
        /** @var PDO $con */
        $stmt = $con->prepare($sql);
        $stmt->execute([':id'=>$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

//function getCourses()
//{
//    include "./config/config.php";
//    $sql = 'select * from courses c inner join teachers t on t.teacher_id = c.teacher_id';
//    /** @var PDO $con */
//    $stmt = $con->prepare($sql);
//    $stmt->execute();
//    return $stmt->fetchAll(PDO::FETCH_ASSOC);
//}
    /** get data from courses table with limit or without */
    function getCourses($page = 1,$withoutLimit =  false)
    {
        $sql = 'select * from courses c inner join teachers t on t.teacher_id = c.teacher_id';
        if(!$withoutLimit){
            $sql = 'select * from courses c inner join teachers t on t.teacher_id = c.teacher_id  LIMIT :offset, :limit';
        }
        return retrieveAllData($page,$sql);
    }

    /** get row's count of course */
    function getCoursePageCount()
    {
        $sql = 'select * from courses';
        return getPageCount($sql);
    }
    public function create()
    {
        session_start();
        if (!empty( $_SESSION['user_id'])){
            if (!empty($_POST)){
                $product = new Product();
                $result = $product->save($_POST['name'] , $_POST['category_id'] , $_POST['brand_id']);
                if ($result){
                    header('Location:/index.php/product/all');
                }
            }
            $this->render('product/create');
        }else{

            $this->redirect('user/login');
        }

    }

    public function all()
    {
        session_start();
        if (!empty( $_SESSION['user_id'])){
            $product = new Product();
            $models = $product->getList();
            $pageCount = $product->getPageCount();
            $this->view->render('product/all' , [
                'models' => $models,
                'pageCount' => $pageCount,
            ]);
        }else{
            $this->redirect('user/login');
        }

    }

    public function getLists()
    {

        if (!empty( $_SESSION['user_id'])){
            $product = new Product();
            $models = $product->getList();
            $pageCount = $product->getPageCount();
            $this->view->render('product/all' , [
                'models' => $models,
                'pageCount' => $pageCount,
            ]);
        }else{
            $this->redirect('user/login');
            print_r($this);
        }

    }

    public function update($id)
    {
        session_start();
        if (!empty( $_SESSION['user_id'])){
            $product = new Product();
            $model = $product->getById($id);
            if (!empty($_POST)){
                $result = $product->update($_POST['name'] , $_POST['category_id'] , $_POST['brand_id'] , $id);
                if ($result){
                    header('Location:/index.php/product/all');
                }
            }

            $this->view->render('product/update' , [
                'model' => $model,
            ]);
        }else{
            $this->redirect('user/login');
        }

    }

    public function delete($id){
        $product = new Product();
        $product->delete($id);
        if ($product->delete($id)){
            header('Location:/product/all');
        }
    }


}