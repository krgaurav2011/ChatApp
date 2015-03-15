<?php 
class user_model extends CI_Model
{
    function insert_user($email,$password,$type)
    {
        $sql = "insert into users(email,password,check_user_type) values('$email','$password','$type')";
        $out=$this->db->query($sql);
        return $out;
    }
    function check_user($email,$password)
    {
        $sql = "select * from users where email='$email' and password='$password'";
        $query = $this->db->query($sql);
        return $query;
    }
}    