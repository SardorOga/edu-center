<?php


namespace models;


use PDO;
use vendor\myframe\Model;

class Loginform extends Model
{
    public $username;
    public $password;

    public function login(){
        session_start();
        if (!empty($_POST)){
            $username1 = mb_strtolower($_POST['username']);
            $password1 = $_POST['password'];

            if (!empty($username1) && !empty($password1)){
                $sql = "select *  from users where username = :username";
                $prepare = $this->db->prepare($sql);
                $prepare->bindValue(":username" , $username1);
                $row_count = $prepare->rowCount();
                $prepare->execute();
                $user = $prepare->fetch(PDO::FETCH_ASSOC);
                $password_hash = $user['password'];
                $count = $prepare->rowCount();
                if ($count > 0){
                    if (password_verify($password1 , $password_hash)){
                        $_SESSION['user_id'] = $user['id'];
                        header('location:/site/index');exit();
                    }else{
                        $_SESSION['error'] = "Parol notogri kiritilgan";
                    }

                }else{
                    $_SESSION['error'] = "Loginni xato kiritdingiz";
                }

            }else{

                $_SESSION['error'] = "Login yoki password kiritilmadi";
            }
        }
    }

    public function logout(){
        session_start();
        unset($_SESSION['user_id']);
        header('Location:/user/login');
    }

}