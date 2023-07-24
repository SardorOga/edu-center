<?php


namespace models;


use vendor\myframe\Model;

class Room extends Model
{
    public function getList()
    {
      $sql="select * from rooms";
      $stmt=$this->db->prepare($sql);
    }

}