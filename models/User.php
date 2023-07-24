<?php


namespace models;


use vendor\myframe\Model;

class User extends Model
{
    public function tableName()
    {
        return 'users';
    }
}