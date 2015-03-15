<?php

class Marks_model extends CI_Model {

    function insert_marks($user_id,$test_id,$marks){
        $sql = "insert into marks(user_id,test_id,marks) values('$user_id','$test_id','$marks')";
        $out=$this->db->query($sql);
        return $out;
    }
    function fetch_test_history($user_id,$test_id){
        $this->db->select('*')->from('marks');
        $this->db->where('test_id', $test_id);
        $this->db->where('user_id', $user_id);
        $query=$this->db->get();
        return $query;
    }
}