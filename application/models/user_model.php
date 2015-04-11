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
    function profile_complete($email)
    {
        $sql="update users set profile_complete=1 where email = '$email'" ;
        $query=$this->db->query($sql);
        return $query;
    }
    function check_userprofile($email)
    {
        $sql="select check_user_type from users where email='$email'";
        $query=$this->db->query($sql);
        return $query;
    }
}    