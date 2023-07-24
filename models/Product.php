<?php
namespace models;

use PDO;
use PDOException;
use vendor\myframe\ConnectDB;
use vendor\myframe\Model;

class Product extends Model
{
    public function tableName()
    {
        return "product";
    }

    public function update($name,$category_id,$brand_id,$id)
    {
        $sql = "update product set name = :name , brand_id = :brand , category_id = :category where  id = :id";
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(':name' , $name , PDO::PARAM_STR);
        $prepare->bindValue(':brand' , $brand_id , PDO::PARAM_INT);
        $prepare->bindValue(':category' , $category_id , PDO::PARAM_INT);
        $prepare->bindValue(':id' , $id , PDO::PARAM_INT);
        try {
            $prepare->execute();
            return true;
        }catch (PDOException $info){
            $this->debug($info->getMessage());
        }
    }

    public function save($name,$category_id , $brand_id)
    {
        $sql = "insert into product( name , brand_id , category_id) VALUES ('$name' , '$brand_id' , '$category_id')";
        $prepare = $this->db->prepare($sql);
//        $prepare->bindValue(':name' , $name , PDO::PARAM_STR);
//        $prepare->bindValue(':brand' , $brand_id , PDO::PARAM_INT);
//        $prepare->bindValue(':category' , $category_id , PDO::PARAM_INT);
        try {
            $prepare->execute();
            return true;
        }catch (PDOException $i){
            $this->debug($i->getMessage());
            $this->debug($i->getLine());
        }
    }

}