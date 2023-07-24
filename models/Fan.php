<?php


namespace models;


use PDO;
use PDOException;
use vendor\myframe\Model;

class Fan extends Model
{
    public function tableName()
    {
        return 'fanlar';
    }

    public function create($name,$kurs_id , $status)
    {
        $sql = "insert into fanlar(name , kurs_id , status) VALUES ('$name' , '$kurs_id' , '$status')";
        $prepare = $this->db->prepare($sql);
//        $prepare->bindValue(':name' , $name);
//        $prepare->bindValue(':kurs_id' , $kurs_id , PDO::PARAM_INT);
//        $prepare->bindValue(':status' , $status , PDO::PARAM_INT);
        try {
            $prepare->execute();
            return true;
        }catch (\PDOException $i){
            $this->debug($i->getMessage());
        }

    }

    public function update($name , $kurs_id , $status , $id){
        $sql = "update fanlar set name = '$name' , kurs_id = '$kurs_id' , status = '$status' where id = $id";
        $prepare = $this->db->prepare($sql);
        try {
            $prepare->execute();
            return true;
        }catch (PDOException $i){
            $this->debug($i->getMessage());
        }
    }

}