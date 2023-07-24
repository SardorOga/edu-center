<?php


namespace models;


use PDOException;
use vendor\myframe\Model;

class Subject extends Model
{
    public function tableName()
    {
        return 'kurs';
    }

    public function add($name,$in_week,$even_or_odd,$start_date,$end_date,$price,$room_id,$teacher_id)
    {
        $sql = "insert into kurs( name, in_week , even_or_odd , start_date , end_date , price , room_id , teacher_id)
    values ('$name' , '$in_week' , '$even_or_odd' , '$start_date' , '$end_date' , '$price' , '$room_id' ,'$teacher_id')";
        $prepare = $this->db->prepare($sql);
        try {
            $prepare->execute();
            return true;
        }catch (PDOException $i){
            $this->debug($i->getMessage());
        }
    }

    public function update($name,$in_week,$even_or_odd,$start_date,$end_date,$price,$room_id,$teacher_id , $id)
    {
        $query = "update kurs set name = '$name' , in_week = '$in_week' , even_or_odd = '$even_or_odd' , start_date = '$start_date' , end_date = '$end_date' , price = '$price' , room_id = '$room_id' , teacher_id = '$teacher_id' where id = '$id'";
        $prepare = $this->db->prepare($query);
        try {
            $prepare->execute();
            return true;
        }catch (PDOException $i){
            $this->debug($i->getMessage());
        }
    }

}