<?php 
class student_model extends CI_Model
{
    function UpdateStudentInfo($id,$name,$age,$education,$gender)
    {
        $sql = "insert into students(user_id,name,sex,education,age) values('$id','$name','$gender','$education','$age')";
        $out=$this->db->query($sql);
        return $out;
    }
  /*  function check_user($email,$password)
    {
        $sql = "select * from users where email='$email' and password='$password'";
        $query = $this->db->query($sql);
        return $query;
    }*/
}    