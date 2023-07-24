<?php


namespace vendor\myframe;


use PDO;
use PDOException;
use vendor\myframe\ConnectDB;

class Model
{
    public $db;
    public $page;
    public $sort;
    public $column_name;
    const LIMIT = 4;
    protected $tablename;
    public function __construct()
    {
        $request = new Request();
        $this->page = $request->page;
        $this->sort = $request->sort;
        $this->column_name = $request->column_name;
        $this->tablename = $this->tableName();
        $conn = new ConnectDB();
        $this->db = $conn->getConnection();
    }

    public function tableName()
    {
        return 'product';
    }

    public  function getList($withoutLimit = false){
        if ($this->sort == 'asc'){
            $offset = ($this->page - 1) * self::LIMIT;
            if ($withoutLimit) {
                $sql = "select * from {$this->tablename} order by {$this->column_name} asc";
                $state = $this->db->prepare($sql);
            } else {
                $sql = "select * from {$this->tablename} order by {$this->column_name} asc limit :offset, :limit ";
                $state = $this->db->prepare($sql);
                $state->bindValue(":limit", self::LIMIT, PDO::PARAM_INT);
                $state->bindValue(":offset", $offset, PDO::PARAM_INT);
            }
            try {

                $state->execute();
                return $state->fetchAll(PDO::FETCH_OBJ);

            }catch (PDOException $i){
                $this->debug($i->getMessage());
                $this->debug($i->getLine());
                $this->debug($i->getFile());
            }

        }else if($this->sort == 'desc'){

            $offset = ($this->page - 1) * self::LIMIT;
            if ($withoutLimit) {
                $sql = "select * from {$this->tablename} order by {$this->column_name} desc";
                $state = $this->db->prepare($sql);
            } else {
                $sql = "select * from {$this->tablename} order by {$this->column_name} desc limit :offset, :limit ";
                $state = $this->db->prepare($sql);
                $state->bindValue(":limit", self::LIMIT, PDO::PARAM_INT);
                $state->bindValue(":offset", $offset, PDO::PARAM_INT);
            }
            try {
                $state->execute();
                return $state->fetchAll(PDO::FETCH_OBJ);
            }catch (PDOException $i){
                $this->debug($i->getMessage());
                $this->debug($i->getLine());
            }

        }
    }

    public function getPageCount()
    {
        $sql = "select * from  {$this->tablename}";
        $state = $this->db->prepare($sql);
        $state->execute();
        $total_rows = $state->rowCount();
        return ceil($total_rows / self::LIMIT);
    }

    public function getById($id)
    {
        $sql = "select * from {$this->tablename} where id = $id";
        $prepare = $this->db->prepare($sql);
        try {
            $prepare->execute();
            return $prepare->fetch(PDO::FETCH_OBJ);
        }catch (PDOException $info){
            $this->debug($info->getMessage());
        }
    }

    public function delete($id){
        $sql = "delete  from {$this->tablename} where id = $id";
        $prepare = $this->db->prepare($sql);
        try {
            $prepare->execute();
            return true;
        }catch (PDOException $e){
            $this->delete($e->getMessage());
        }
    }

    public function debug($arr)
    {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }

}