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