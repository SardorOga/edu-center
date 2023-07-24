<?php


namespace models;


use PDO;
use PDOException;
use vendor\myframe\Model;

class Student extends Model
{
    public function tableName()
    {
        return 'student';
    }

    public function add($first_name,$last_name,$date_birth,$gender,$adress,$email,$phone){
        $sql = "insert into student(first_name,last_name,date_birth,gender,adress,email,phone) 
        VALUES ('$first_name' , '$last_name' , '$date_birth' , '$gender' , '$adress' , '$email' , '$phone')";
        $prepare = $this->db->prepare($sql);
//        $prepare->bindValue(':first_name' , $first_name , PDO::PARAM_STR);
//        $prepare->bindValue(':last_name' , $last_name , PDO::PARAM_STR);
//        $prepare->bindValue(':date_birth' , $date_birth , PDO::PARAM_STR);
//        $prepare->bindValue(':gender' , $gender , PDO::PARAM_INT);
//        $prepare->bindValue(':adress' , $adress , PDO::PARAM_STR);
//        $prepare->bindValue(':email' , $email , PDO::PARAM_STR);
//        $prepare->bindValue(':phone' , $email , PDO::PARAM_STR);

        try {
            $prepare->execute();
            return true;
        }catch (PDOException $i){
            $this->debug($i->getMessage()) . "<br>";
            $this->debug($i->getLine());
            $this->debug($i->getFile());
        }
    }

    public function update($first_name,$last_name,$date_birth,$gender,$adress,$email,$phone , $id){

        $sql = "update student set first_name = '$first_name',last_name = '$last_name' , date_birth = '$date_birth' , gender = '$gender' , adress = '$adress' , email = '$email' , phone = '$phone' where id = $id";
        $prepare = $this->db->prepare($sql);
        try {
            $prepare->execute();
            return true;
        }catch (PDOException $i){
            $this->debug($i->getMessage()) . "<br>";
            $this->debug($i->getLine());
            $this->debug($i->getFile());
        }
    }

}