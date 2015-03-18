<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class teacher_model extends CI_Model
{
    function insert_update($id,$name,$sex,$photo,$designation,$age)
    {
        $sql= "insert into teachers(user_id,name,sex,designation,age) values('$id','$name','$sex','$designation','$age')";
        $query=$this->db->query($sql);
        return $query;
    }
    
}    
