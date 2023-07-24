<?php


namespace models;


use PDOException;
use vendor\myframe\Model;

class Teacher extends Model
{
    public function tableName()
    {
        return 'teacher'; 
    }

    public function create($first_name,$last_name,$gender,$email,$experience,$specialty,$phone){
        $sql = "insert into teacher(last_name,first_name,gender,email,experience,specialty,phone) 
    values ('$last_name' , '$first_name' , '$gender', '$email' , '$experience' , '$specialty' , '$phone')";
        $prepare = $this->db->prepare($sql);
        try {
            $prepare->execute();
            return true;
        }catch (PDOException $i){
            $this->debug($i->getMessage());
        }
    }

    public function update($first_name,$last_name,$gender,$email,$experience,$specialty,$phone,$id)
    {
        $sql = "update teacher set last_name = '$last_name' , first_name = '$first_name' , gender = '$gender' , experience = '$experience',
    specialty = '$specialty' , phone = '$phone' , email = '$email' where id = '$id';
     ";
        $prepare = $this->db->prepare($sql);
        try {
            $prepare->execute();
            return true;
        }catch (PDOException $i){
            $this->debug($i->getMessage());
        }
    }

}