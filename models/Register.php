<?php


namespace models;


use PDOException;
use vendor\myframe\Model;

class Register extends Model
{
    public function registration()
    {
        session_start();
        if (!empty($_POST)){

            $username1 = mb_strtolower($_POST['username']);
            $password1 = $_POST['password'];
            $confirm = $_POST['confirm'];
            $phone = $_POST['phone'];

            if (!empty($username1) && !empty($password1) && !empty($confirm) && !empty($phone)){

                $sql = "select *  from users where username = :username";
                $prepare = $this->db->prepare($sql);
                $prepare->bindValue(":username" , $username1);
                $row_count = $prepare->rowCount();
                $prepare->execute();
                    if ($row_count > 0){
                    $_SESSION['error'] = "$username1 nomi foydalanuvchi mavjud.Iltimos boshqa username kiriting";
                }else{

                    if (strlen($username1) >= 4){
                        if (strlen($password1) >= 8){
                            if ($password1 === $confirm){
                                $password1 = password_hash($password1 , PASSWORD_DEFAULT);
                                $query = "insert into users(username , password , confirm , phone) values(:username , :password , :confirm, :phone)";
                                $prepare = $this->db->prepare($query);
                                $prepare->bindValue(":username" , $username1);
                                $prepare->bindValue(":password" , $password1);
                                $prepare->bindValue(":confirm" , $confirm);
                                $prepare->bindValue(":phone" , $phone);
                                try {
                                    $prepare->execute();
                                    $_SESSION['success'] = "Siz muvaffaqiyatli ro'yhatdan o'tdingiz";
                                    header("Location:/user/login");
                                }catch (PDOException $i){
                                    $this->debug($i->getMessage());
                                }

                            }else{
                                $_SESSION['error'] = "passwordlar mos emas!";
                            }
                        }else{
                            $_SESSION['error'] = "password kamida 8 ta belgidan iborat bo'lishi kerak";
                        }
                    }else{
                        $_SESSION['error'] = "username kamida 4 ta harfdan iborat bo'lishi kerak";
                    }

                }

            }else{

                $_SESSION['error'] = "Login yoki password kiritilmadi";
            }
        }
    }

}